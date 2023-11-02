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
        Schema::create('open_hours', function (Blueprint $table) {
            $table->id();
            $table->string('sale_point_id', 255);
            $table->integer('day_from');
            $table->integer('day_to');
            $table->string('hours', 255);
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_houers');
    }
};
