<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomResponseGroup;

class CustomResponseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new CustomResponseGroup();
        $group->template_id = 1;
        $group->save();

        $group = new CustomResponseGroup();
        $group->template_id = 1;
        $group->save();
    }
}
