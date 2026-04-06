<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Aiven MySQL can require the primary key to exist in the CREATE TABLE statement.
        DB::statement("
            CREATE TABLE `password_reset_tokens` (
                `email` varchar(255) NOT NULL,
                `token` varchar(255) NOT NULL,
                `created_at` timestamp NULL,
                PRIMARY KEY (`email`)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE 'utf8mb4_unicode_ci'
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('password_reset_tokens');
    }
};
