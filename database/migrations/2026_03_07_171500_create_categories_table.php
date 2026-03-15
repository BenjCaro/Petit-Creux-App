<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        DB::table('categories')->insert(
           [ ['name' => 'Apéritif', 'slug' => 'aperitif'],
            ['name' => 'Entrées', 'slug' => 'entrees'],
            ['name' => 'Plats', 'slug' => 'plats'],
            ['name' => 'Desserts', 'slug' => 'desserts'],
            ['name' => 'Snacks', 'slug' => 'snacks']]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
