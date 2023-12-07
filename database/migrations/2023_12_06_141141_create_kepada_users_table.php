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
        Schema::create('kepada_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // foreign key from table diteruskans: 
            $table->foreignId('diteruskan_id')->constrained()
                ->cascadeOnDelete()
                ->casCadeOnUpdate();

            // foreign key form table users: 
            $table->foreignId('user_id')->constrained()
                ->cascadeOnDelete()
                ->casCadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepada_users');
    }
};
