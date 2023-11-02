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
        Schema::create('sale_points', function (Blueprint $table) {
            $table->id();
            $table->string('sale_point', 255);
            $table->string('type', 255);
            $table->string('name', 255);
            $table->string('address', 255)->nullable();
            $table->float('lat');
            $table->float('lon');
            $table->integer('services');
            $table->integer('pay_methods');
            $table->string('link', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_points');
    }
};
