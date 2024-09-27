<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\As_center;
use Illuminate\Database\Seeder;

class AsCenterSeeder extends Seeder
{
    public function run()
    {
        As_center::factory(10)->create(); 
    }
}
