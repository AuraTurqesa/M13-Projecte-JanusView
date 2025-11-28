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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('Category_name', 100)->unique();
            $table->timestamps();
        });
        
        DB::table('categories')->insert([
            ['Category_name' => 'Adult Mortality'],
            ['Category_name' => 'Common Table (View)'],
            ['Category_name' => 'Global Mortality'],
            ['Category_name' => 'Infant Mortality'],
            ['Category_name' => 'Life Expentancy'],
            ['Category_name' => 'Migration'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
