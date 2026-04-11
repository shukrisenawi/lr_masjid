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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('avatar_path')->nullable();
            $table->string('head_of_family_name');
            $table->string('full_name');
            $table->string('nickname')->nullable();
            $table->enum('gender', ['Lelaki', 'Perempuan']);
            $table->date('date_of_birth')->nullable();
            $table->text('address')->nullable();
            $table->foreignId('village_id')->nullable()->constrained()->nullOnDelete();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
