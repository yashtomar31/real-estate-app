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
            $table->string('name', 128);
            $table->enum('real_state_type', ['house', 'department', 'land', 'commercial_ground']);
            $table->string('street',128);
            $table->string('external_number', 12)->nullable();
            $table->string('internal_number', 12)->nullable();
            $table->string('neighborhood', 128);
            $table->string('city',64);
            $table->string('country', 2); // ISO 3166-Alpha2, two characters
            $table->integer('rooms');
            $table->decimal('bathrooms', 8, 2); // Can have decimals
            $table->string('comments', 128)->nullable();
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
