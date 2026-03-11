<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // MySQL requires dropping and recreating the enum column
        // First, change the column to a larger VARCHAR temporarily
        DB::statement("ALTER TABLE job_posts MODIFY COLUMN status VARCHAR(50) DEFAULT 'pending'");
        
        // Now change it back to ENUM with the new value
        DB::statement("ALTER TABLE job_posts MODIFY COLUMN status ENUM('pending', 'active', 'closed', 'expired', 'archived', 'rejected') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original ENUM
        DB::statement("ALTER TABLE job_posts MODIFY COLUMN status ENUM('pending', 'active', 'closed', 'expired', 'archived') DEFAULT 'pending'");
    }
};
