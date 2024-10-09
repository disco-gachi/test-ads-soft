<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Record;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::factory()
            ->count(10)
            ->sequence(
                ['access' => '1'],
                ['access' => '0'],
            )
            ->create();
    }
}
