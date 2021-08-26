<?php

namespace Database\Seeders;
use App\Models\Test;

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Test();
        $group->description = 'is bathrooms clean';
        $group->category_id = 1;
        $group->save();
    }
}
