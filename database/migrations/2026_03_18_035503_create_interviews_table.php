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
        Schema::create('interviews', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('applicant_id')->index('applicant_id');
            $table->date('scheduled_date');
            $table->time('scheduled_time');
            $table->string('location')->nullable();
            $table->enum('interview_type', ['phone', 'video', 'face_to_face'])->nullable()->default('face_to_face');
            $table->enum('status', ['scheduled', 'completed', 'cancelled', 'no_show'])->nullable()->default('scheduled');
            $table->text('notes')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviews');
    }
};
