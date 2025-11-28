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
        Schema::create('data_record', function (Blueprint $table) {
            $table->unsignedInteger('Record_id')->primary();

            $table->foreignId('User_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('Cascade');

            $table->string('Country', 100);
            $table->year('Year');

            $table->foreignId('Category_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('Cascade');

            $table->string('Type_graphic', 50)->nullable();
            $table->unsignedInteger('Num_request')->nullable();
            
            $table->unique(['Country', 'Year', 'Category_id', 'User_id'], 'idx_unique_record');
            $table->timestamps();
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_records');
    }
};
