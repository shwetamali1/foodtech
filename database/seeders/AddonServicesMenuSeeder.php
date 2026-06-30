<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddonServicesMenuSeeder extends Seeder
{
    public function run(): void
    {
        $menuExists = DB::table('web_menu')->where('url', 'addon-services/list')->exists();

        if (!$menuExists) {
            DB::table('web_menu')->insert([
                'title'          => 'Add-on Services',
                'url'            => 'addon-services/list',
                'controller'     => 'AddonService',
                'action'         => 'index,add,add_submit,updateRecord,deleteRecord,billing,pay,store,thankyou,failed',
                'parent_id'      => 0,
                'orders'         => 16,
                'nav_item'       => '/addon-services/list',
                'menu_icon'      => 'bi bi-puzzle-fill',
                'permission_tag' => 'addon-services',
                'is_submenu'     => 'No',
                'status'         => 1,
            ]);
            $this->command->info('  Inserted menu: Add-on Services');
        } else {
            $this->command->warn('  Menu already exists — skipped.');
        }

        $menuId = DB::table('web_menu')->where('url', 'addon-services/list')->value('id');

        // Available to everyone: role 1 = Super Admin, 6 = Administration, 8 = Users
        foreach ([1, 6, 8] as $roleId) {
            $role = DB::table('roles')->where('id', $roleId)->first();

            if (!$role) {
                $this->command->warn("  Role {$roleId} not found — skipped.");
                continue;
            }

            $existing = array_filter(array_map('trim', explode(',', $role->permission_id)));
            $merged = array_values(array_unique(array_merge(
                array_map('intval', $existing),
                [(int) $menuId]
            )));

            DB::table('roles')->where('id', $roleId)->update(['permission_id' => implode(',', $merged)]);

            $this->command->info("  Role {$roleId} ({$role->role_name}) permission_id updated.");
        }

        $this->command->info('AddonServicesMenuSeeder complete.');
    }
}
