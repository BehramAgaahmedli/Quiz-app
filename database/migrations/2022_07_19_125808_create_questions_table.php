<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id');
            $table->longText('question');
            $table->longText('file')->nullable();          
            $table->longText('answer1');
            $table->longText('answer2');
            $table->longText('answer3');
            $table->longText('answer4');
            $table->longText('answer5');
            $table->enum('correct_answer',['answer1','answer2','answer3','answer4','answer5']);
            $table->enum('Subject',['1','2','3']);
            $table->timestamps();
            //$table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
