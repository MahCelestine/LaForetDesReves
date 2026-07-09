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
            $table->foreignId('mom_id')->constrained('chiens');
            $table->foreignId('dad_id')->constrained('chiens');
            $table->string('name');
            $table->enum('sex', ['male', 'female']);
            $table->bigInteger('identification_number')->unique();
            $table->integer('weight');
            $table->integer('price');
            $table->string('color');
            $table->date('birth_date');
            $table->date('adoption_date');
            $table->enum('breed', ['samoyède', 'staffordshire bull terrier','berger américain']);
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
