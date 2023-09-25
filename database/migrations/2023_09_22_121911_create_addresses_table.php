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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('uf', 3);
            $table->smallInteger('number');
            $table->string('zip_code', 8);
            $table->morphs('addressable');
            //$table->unsignedBigInteger('addressable_id');
            //$table->string('addressable_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
