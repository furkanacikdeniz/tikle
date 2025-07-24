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
    Schema::create('team_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId('team_id')->constrained()->onDelete('cascade');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('role')->default('member'); // takımda üyenin rolü, varsayılan olarak 'member'
        $table->timestamps();
        $table->unique(['team_id', 'user_id']); // team_id ve user_id kombinasyonu benzersiz olmalı
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_user');
    }
};
