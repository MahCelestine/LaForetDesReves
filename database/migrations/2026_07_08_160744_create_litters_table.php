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
        Schema::create('litters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mom_id')->constrained('dogs');
            $table->foreignId('dad_id')->constrained('dogs');
            $table->date('birth_date');
            $table->integer('number_puppies')->nullable();
            $table->enum('breed', ['samoyède', 'staffordshire bull terrier','berger américain']);
            $table->enum('status', ['en cours', 'futur', 'passée'])->default('en cours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('litters');
    }
};
