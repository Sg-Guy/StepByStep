<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('taskTitle') ;
            $table->longText('taskDescription') ;
            $table->date('taskDueDate') ;
            $table->string('taskCategory');
            $table->string('taskPriority');
            $table->enum('taskReminder' , allowed:['nouvelle' ,'en cours' , 'suspendue' , 'terminee'])->default(value:'nouvelle') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
