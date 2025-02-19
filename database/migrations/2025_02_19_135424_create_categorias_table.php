<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('categorias')->insert([
            ['denominacion' => 'Tecnología', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Tiempo libre', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Politica', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Deportes', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Economia', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Sociedad', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Educacion', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Sucesos', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Cine', 'created_at' => now(), 'updated_at' => now()],
            ['denominacion' => 'Videojuegos', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
