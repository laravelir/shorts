<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laravelir_shorts', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('original_url');
            $table->string('short_url');
            $table->unsignedBigInteger('visits');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('laravelir_shorts');
    }
};
