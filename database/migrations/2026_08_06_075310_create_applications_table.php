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
         Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('company');
            $table->string('role');
            $table->date('applied_at');
            $table->enum('status', ['applied', 'interview', 'offer', 'rejected'])->default('applied');
            $table->string('current_ctc')->nullable();
            $table->string('expected_ctc')->nullable();
            $table->string('location')->nullable();
            $table->date('interview_on')->nullable();
            $table->unsignedSmallInteger('notice_period')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
