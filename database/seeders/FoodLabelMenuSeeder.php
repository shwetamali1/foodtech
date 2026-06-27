<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodLabelMenuSeeder extends Seeder
{
    public function run(): void
    {
        // ── 1. Insert web_menu rows (skip if already present) ────────────────

        $userMenuExists  = DB::table('web_menu')->where('url', 'label-validation/list')->exists();
        $adminMenuExists = DB::table('web_menu')->where('url', 'admin-food-labels/list')->exists();

        if (!$userMenuExists) {
            DB::table('web_menu')->insert([
                'title'          => 'Label Validation',
                'url'            => 'label-validation/list',
                'controller'     => 'FoodLabelValidation',
                'action'         => 'index,create,store,view,edit,update,delete,download',
                'parent_id'      => 0,
                'orders'         => 14,
                'nav_item'       => '/label-validation/list',
                'menu_icon'      => 'bi bi-patch-check-fill',
                'permission_tag' => 'label-validation',
                'is_submenu'     => 'No',
                'status'         => 1,
            ]);
            $this->command->info('  Inserted user menu: Label Validation');
        } else {
            $this->command->warn('  User menu already exists — skipped.');
        }

        if (!$adminMenuExists) {
            DB::table('web_menu')->insert([
                'title'          => 'Food Label Validations',
                'url'            => 'admin-food-labels/list',
                'controller'     => 'AdminFoodLabel',
                'action'         => 'index,view,update,delete,download',
                'parent_id'      => 0,
                'orders'         => 15,
                'nav_item'       => '/admin-food-labels/list',
                'menu_icon'      => 'bi bi-patch-check',
                'permission_tag' => 'admin-food-labels',
                'is_submenu'     => 'No',
                'status'         => 1,
            ]);
            $this->command->info('  Inserted admin menu: Food Label Validations');
        } else {
            $this->command->warn('  Admin menu already exists — skipped.');
        }

        // ── 2. Fetch the IDs (handles cases where they already existed) ──────

        $userMenuId  = DB::table('web_menu')->where('url', 'label-validation/list')->value('id');
        $adminMenuId = DB::table('web_menu')->where('url', 'admin-food-labels/list')->value('id');

        // ── 3. Update role permission_id columns ─────────────────────────────

        // role 8 = Users  → gets user menu only
        // role 1 = Super Admin, role 6 = Administration → get both menus
        $updates = [
            8 => [$userMenuId],
            1 => [$userMenuId, $adminMenuId],
            6 => [$userMenuId, $adminMenuId],
        ];

        foreach ($updates as $roleId => $newIds) {
            $role = DB::table('roles')->where('id', $roleId)->first();

            if (!$role) {
                $this->command->warn("  Role {$roleId} not found — skipped.");
                continue;
            }

            $existing = array_filter(
                array_map('trim', explode(',', $role->permission_id))
            );

            $merged = array_values(array_unique(array_merge(
                array_map('intval', $existing),
                array_map('intval', $newIds)
            )));

            DB::table('roles')
                ->where('id', $roleId)
                ->update(['permission_id' => implode(',', $merged)]);

            $this->command->info("  Role {$roleId} ({$role->role_name}) permission_id updated.");
        }

        $this->command->info('FoodLabelMenuSeeder complete.');
    }
}
