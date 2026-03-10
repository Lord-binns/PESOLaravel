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
        Schema::create('job_archive', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('original_job_id')->nullable();
            $table->unsignedBigInteger('establishment_id');
            $table->string('position_title');
            $table->text('job_description')->nullable();
            $table->string('nature_of_work')->nullable();
            $table->string('place_of_work')->nullable();
            $table->string('salary')->nullable();
            $table->integer('vacancy_count')->default(1);
            $table->string('education_level')->nullable();
            $table->string('course')->nullable();
            $table->string('work_experience')->nullable();
            $table->string('license_eligibility')->nullable();
            $table->string('certification')->nullable();
            $table->string('language_spoken')->nullable();
            $table->text('other_qualifications')->nullable();
            $table->tinyInteger('accepts_pwd')->default(0);
            $table->tinyInteger('accepts_ofw')->default(0);
            $table->date('posting_date')->nullable();
            $table->date('valid_until')->nullable();
            $table->string('original_status')->default('archived');
            $table->string('archived_reason')->default('manual');
            $table->timestamp('archived_at')->useCurrent();
            $table->timestamps();
            
            $table->index('establishment_id');
            $table->index('archived_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_archive');
    }
};
