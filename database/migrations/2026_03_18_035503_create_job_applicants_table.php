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
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('job_post_id')->index('job_post_id');
            $table->string('first_name', 100);
            $table->string('middle_name', 100)->nullable();
            $table->string('last_name', 100);
            $table->string('email');
            $table->string('phone', 50)->nullable();
            $table->text('address')->nullable();
            $table->text('education')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('skills')->nullable();
            $table->string('resume_path')->nullable();
            $table->enum('status', ['pending', 'screening', 'interview', 'hired', 'rejected'])->nullable()->default('pending');
            $table->timestamp('applied_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applicants');
    }
};
