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
        Schema::create('puppies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('litter_id')->constrained('litters')->onDelete('cascade');
            $table->foreignId('mom_id')->constrained('dogs');
            $table->foreignId('dad_id')->constrained('dogs');
            $table->string('name');
            $table->enum('sex', ['male', 'female']);
            $table->string('identification_number')->unique()->nullable();
            $table->integer('weight');
            $table->integer('price');
            $table->string('color');
            $table->date('birth_date');
            $table->date('adoption_date');
            $table->foreignId('breed_id')->constrained('breeds')->cascadeOnDelete();
            $table->text('description');
            $table->text('image_path');
            $table->enum('status', ['disponible', 'reservé', 'vendu'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puppies');
    }
};
