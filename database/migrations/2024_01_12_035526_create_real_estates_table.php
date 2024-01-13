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
        Schema::create('real_estates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('real_state_type');
            $table->string('street');
            $table->integer('external_number');
            $table->integer('internal_number')->nullable();
            $table->string('neighborhood');
            $table->string('city');
            $table->string('country');
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->text('comments')->nullable();
            $table->timestamps(); // created_at and updated_at
            $table->softDeletes(); // deleted_at for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estates');
    }
};
