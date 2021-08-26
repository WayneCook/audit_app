<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\QuestionResponseType;

class QuestionResponseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $QuestionResponseType = new QuestionResponseType();
        $QuestionResponseType->templates_id = 1;
        $QuestionResponseType->save();
    }


    // $table->id();
    // $table->timestamps();
    // $table->string('type');
    // $table->boolean('is_scoreable')->default(1);
    // $table->boolean('is_multiple_choice')->default(1);
}
