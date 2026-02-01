<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
    $table->id();
    $table->string('marque');
    $table->string('modele');
    $table->string('couleur');
    $table->string('carrosserie');
    $table->string('energie');
    $table->integer('kilometrage');
    $table->year('annee');
    $table->string('image')->nullable();
    $table->string('immatriculation')->unique();
    $table->timestamps();
});
        
    }

    public function down(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
    $table->id();
    $table->string('marque');
    $table->string('modele');
    $table->timestamps();
});
        
    }
};