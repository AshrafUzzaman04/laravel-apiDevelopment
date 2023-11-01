<?php

namespace Database\Seeders;

use App\Models\Classs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classs::factory()->count(20)->create();
    }
}
