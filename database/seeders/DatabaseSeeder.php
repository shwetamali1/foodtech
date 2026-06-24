<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * DatabaseSeeder
 *
 * Main entry point for all seeders.
 * Run with: php artisan db:seed
 *
 * To run only the super admin seeder:
 *   php artisan db:seed --class=SuperAdminSeeder
 */
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed the Super Admin user (superadmin@gmail.com / 123456)
        $this->call(SuperAdminSeeder::class);
    }
}
