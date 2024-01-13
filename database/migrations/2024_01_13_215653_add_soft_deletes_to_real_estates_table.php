<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('real_estates', function (Blueprint $table) {
        if (!Schema::hasColumn('real_estates', 'deleted_at')) {
            $table->softDeletes(); // This adds the 'deleted_at' column only if it doesn't exist
        }
    });
}


    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::table('real_estates', function (Blueprint $table) {
        $table->dropSoftDeletes(); // This will drop the 'deleted_at' column
    });
}
};
