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
            $table->longText('taskDescription')->nullable() ;
            $table->date('taskDueDate')->nullable() ;
            $table->string('taskCategory')->nullable();
            $table->enum('taskPriority' , allowed:["basse","normale","haute" , "urgent"])->default('normale');
            $table->dateTime('taskReminder')->nullable() ;
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
