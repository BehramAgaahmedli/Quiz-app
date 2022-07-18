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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->enum('status',['publish','draft','passive'])->default('draft');
            $table->integer('teacher_id');
            $table->decimal('price');
            $table->decimal('final_price');
            $table->integer('views');
            $table->integer('ustimtahan_id');
            $table->integer('altimtahan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizzes');
    }
};
