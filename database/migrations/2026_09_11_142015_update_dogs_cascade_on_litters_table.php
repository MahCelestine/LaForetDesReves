<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->dropForeign(['dad_id']);
            $table->dropForeign(['mom_id']);

            $table->foreign('dad_id')->references('id')->on('dogs')->onDelete('cascade');
            $table->foreign('mom_id')->references('id')->on('dogs')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->dropForeign(['dad_id']);
            $table->dropForeign(['mom_id']);

            $table->foreign('dad_id')->references('id')->on('dogs');
            $table->foreign('mom_id')->references('id')->on('dogs');
        });
    }
};