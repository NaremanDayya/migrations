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
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('desctiption');
            $table->foreignId('user_id')
            ->nullable()
            ->constrained('users','id')
            ->nullOnDelete();
            $table->foreignId('classroom_id')
            ->constrained('classrooms','id')
            ->cascadeOnDelete();
            $table->timestamp('published_at');
            $table->text('comments');
            $table->text('private_comments');
            $table->binary('work');
            $table->text('task');
            $table->id('task_id');
            $table->timestamps();
        });
        //ممكن نعمل جدول تاسك منفصل فيه التالي:
        //task_id ,title,description,assignment_id  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assignments');
    }
};
