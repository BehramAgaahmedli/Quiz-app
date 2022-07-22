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
            $table->string('slug');
            $table->timestamp('finished_at')->nullable();
            $table->enum('status',['publish','draft','passive'])->default('draft');
            $table->integer('teacher_id');
            $table->decimal('price')->nullable();
            $table->decimal('final_price')->nullable();          
            $table->enum('subject1',['Azərbaycan_dili','Ədəbiyyat','Riyaziyyat','Tarix','Fizika','Biologiya','Kimya','Coğrafiya','İngilis_dili'])->nullable();
            $table->integer('random_number1')->nullable();
            $table->enum('subject2',['Azərbaycan_dili','Ədəbiyyat','Riyaziyyat','Tarix','Fizika','Biologiya','Kimya','Coğrafiya','İngilis_dili'])->nullable();
            $table->integer('random_number2')->nullable();  
            $table->enum('subject3',['Azərbaycan_dili','Ədəbiyyat','Riyaziyyat','Tarix','Fizika','Biologiya','Kimya','Coğrafiya','İngilis_dili'])->nullable();
            $table->integer('random_number3')->nullable();
            $table->integer('views')->default('0');
            $table->integer('ustimtahan_id');
            $table->integer('altimtahan_id');
            $table->integer('time')->nullable();
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
