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
        Schema::create('mops', function (Blueprint $table) {
            $table->id();
              $table->string('fullname', 255);
              $table->string('bankname', 255);
              $table->string('accountno', 255);
              $table->string('isactive', 255)->default(0);
              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mops');
    }
};
