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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('establishment_id')->index('establishment_id');
            $table->string('position_title');
            $table->text('job_description');
            $table->enum('nature_of_work', ['permanent', 'contractual', 'project', 'internship', 'parttime', 'workfromhome']);
            $table->string('place_of_work');
            $table->string('salary', 100);
            $table->integer('vacancy_count')->default(1);
            $table->string('education_level', 100)->nullable();
            $table->string('course')->nullable();
            $table->string('work_experience', 100)->nullable();
            $table->string('license_eligibility')->nullable();
            $table->string('certification')->nullable();
            $table->string('language_spoken')->nullable();
            $table->text('other_qualifications')->nullable();
            $table->boolean('accepts_pwd')->nullable()->default(false);
            $table->text('pwd_types')->nullable();
            $table->boolean('accepts_ofw')->nullable()->default(false);
            $table->date('posting_date');
            $table->date('valid_until');
            $table->enum('status', ['pending', 'active', 'closed', 'expired'])->nullable()->default('pending');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posts');
    }
};
