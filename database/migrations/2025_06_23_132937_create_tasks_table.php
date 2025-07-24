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
        Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('status', ['todo', 'in_progress', 'done'])->default('todo');
        $table->enum('type', ['personal', 'team'])->default('personal');
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Görevi oluşturan
        $table->foreignId('team_id')->nullable()->constrained('teams')->onDelete('cascade'); // solo görevler için null
        $table->date('due_date')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
