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
        Schema::create('user_preferred_categories', function (Blueprint $table) {
            // Referencia a users(id)
            $table->foreignId('User_id')
                  ->constrained('users')
                  ->onDelete('cascade');

                  $table->foreignId('Category_id')
                  ->constrained('categories')
                  ->onDelete('cascade');
            
            $table->primary(['User_id', 'Category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_preferred_categories');
    }
};
