<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('question')->nullable();
            $table->integer('template_section_id');
            $table->integer('order_column');
            $table->foreignId('response_type_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template_questions');
    }
}
