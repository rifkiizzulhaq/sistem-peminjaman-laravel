<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Keep the legacy table compatible with databases that require inline primary keys.
        DB::statement("
            CREATE TABLE `password_resets` (
                `email` varchar(255) NOT NULL,
                `token` varchar(255) NOT NULL,
                `created_at` timestamp NULL,
                PRIMARY KEY (`email`)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci'
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
