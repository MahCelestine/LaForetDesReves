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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name_affix');
            $table->string('common_name');
            $table->enum('sex', ['male', 'female']);
            $table->string('identification_number')->unique();
            $table->boolean('LOF')->default(true);
            $table->string('cotation');
            $table->string('color');
            $table->date('birth_date');
            $table->enum('breed', ['samoyède', 'staffordshire bull terrier','berger américain']);
            $table->boolean('retirement')->default(false);
            $table->text('description');
            $table->text('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
