<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * SuperAdminSeeder
 *
 * Seeds the default Super Admin user into the `users` table.
 *
 * CREDENTIALS (change after first login):
 *   Email    : superadmin@gmail.com
 *   Password : 123456
 *
 * HOW TO RUN:
 *   php artisan db:seed --class=SuperAdminSeeder
 *
 * Or via DatabaseSeeder (see DatabaseSeeder.php):
 *   php artisan db:seed
 *
 * NOTE: This seeder uses `updateOrInsert` so it is safe to run multiple
 * times — it will NOT create duplicate entries.
 */
class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        // ──────────────────────────────────────────────────────────────
        // Step 1: Ensure the Super Admin role exists (role_id = 1)
        // This is the highest-privilege role in the system.
        // ──────────────────────────────────────────────────────────────
        $roleExists = DB::table('roles')->where('id', 1)->exists();

        if (!$roleExists) {
            DB::table('roles')->insert([
                'id'          => 1,
                'role_name'   => 'Super Admin',
                // All permission IDs granted by default
                'permission_id' => '1,2,3,4,5,6,7,8,9,10,11,12,16,17,18,20,21,22,23,24,25',
                'status'      => 'active',
                'created_date' => Carbon::now(),
            ]);

            $this->command->info('Super Admin role created (id=1).');
        } else {
            $this->command->info('Super Admin role already exists — skipping role creation.');
        }

        // ──────────────────────────────────────────────────────────────
        // Step 2: Insert or update the Super Admin user record.
        //
        // user_role_id = 1  →  Super Admin (full access to all panels)
        // The password is hashed with bcrypt via Laravel's Hash facade.
        // IMPORTANT: Change this password immediately after first login!
        // ──────────────────────────────────────────────────────────────
        DB::table('users')->updateOrInsert(
            // Match condition — find by email
            ['email' => 'superadmin@gmail.com'],

            // Values to insert or update
            [
                'first_name'   => 'Super',
                'last_name'    => 'Admin',
                'user_name'    => 'superadmin',
                'user_id'      => 'superadmin',
                'email'        => 'superadmin@gmail.com',

                // Password is hashed; plain-text is "123456"
                // CHANGE THIS after first login via /settings/profiles
                'password'     => Hash::make('123456'),

                // Role 1 = Super Admin — grants full dashboard access
                'user_role_id' => 1,

                // Active status allows login immediately
                'status'       => 'active',

                'is_deleted'   => '0',
                'category_id'  => 1,
                'created_at'   => Carbon::now(),
                'updated_at'   => Carbon::now(),
            ]
        );

        // ──────────────────────────────────────────────────────────────
        // Step 3: Confirm seeding was successful
        // ──────────────────────────────────────────────────────────────
        $this->command->info('');
        $this->command->info('✅ Super Admin seeded successfully!');
        $this->command->info('   Email    : superadmin@gmail.com');
        $this->command->info('   Password : 123456  ← CHANGE THIS AFTER FIRST LOGIN');
        $this->command->info('   Role     : Super Admin (role_id = 1)');
        $this->command->info('');
    }
}
