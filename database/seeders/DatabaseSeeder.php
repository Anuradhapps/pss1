<?php

namespace Database\Seeders;

use App\Models\Pest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            // AsCenterSeeder::class,
            // districtSeeder::class,
            PestSeeder::class,
            AppDatabaseSeeder::class,
            AuditTrailsDatabaseSeeder::class,
            RolesDatabaseSeeder::class,
            SentEmailsDatabaseSeeder::class,
            UserDatabaseSeeder::class
            
        ]);

       
    }
}
