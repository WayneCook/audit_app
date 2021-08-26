<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MultipleChoiceResponseGroup;

class MultipleChoiceResponseGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new MultipleChoiceResponseGroup();
        $group->template_id = 1;
        $group->save();

        $group = new MultipleChoiceResponseGroup();
        $group->template_id = 1;
        $group->save();

        $group = new MultipleChoiceResponseGroup();
        $group->save();

       
    }
}
