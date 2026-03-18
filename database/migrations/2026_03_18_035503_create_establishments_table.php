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
        Schema::create('establishments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('business_name');
            $table->string('trade_name')->nullable();
            $table->string('acronym', 50)->nullable();
            $table->enum('establishment_type', ['main', 'branch'])->nullable()->default('main');
            $table->string('tin', 50);
            $table->enum('employer_type', ['public', 'private']);
            $table->boolean('is_national_gov')->nullable()->default(false);
            $table->boolean('is_lgu')->nullable()->default(false);
            $table->boolean('is_gocc')->nullable()->default(false);
            $table->boolean('is_suc')->nullable()->default(false);
            $table->boolean('is_direct_hire')->nullable()->default(false);
            $table->boolean('is_local_recruit')->nullable()->default(false);
            $table->boolean('is_overseas_recruit')->nullable()->default(false);
            $table->boolean('is_do174')->nullable()->default(false);
            $table->enum('workforce_size', ['micro', 'small', 'medium', 'large']);
            $table->string('line_of_business')->nullable();
            $table->string('street')->nullable();
            $table->string('barangay', 100)->nullable();
            $table->string('municipality', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('owner_name');
            $table->string('contact_person');
            $table->string('contact_position', 100);
            $table->string('telephone', 50)->nullable();
            $table->string('mobile', 50);
            $table->string('fax', 50)->nullable();
            $table->string('email');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('establishments');
    }
};
