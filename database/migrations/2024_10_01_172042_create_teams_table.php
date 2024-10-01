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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');

            $table->string('name_surname');
            $table->string('photo')->nullable();
            $table->boolean('status')->default(0);
            $table->string('instagram_username')->unique()->nullable();
            $table->string('linkedin_username')->unique()->nullable();
            $table->string('x_username')->unique()->nullable();
            $table->integer('instagram_view_count')->default(0);
            $table->integer('linkedin_view_count')->default(0);
            $table->integer('x_view_count')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
