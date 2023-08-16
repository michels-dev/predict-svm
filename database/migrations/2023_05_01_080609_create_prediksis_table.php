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
        Schema::create('prediksis', function (Blueprint $table) {
            $table->id();
            $table->string('gender');
            $table->integer('age');
            $table->string('hypertension');
            $table->string('heart_disease');
            $table->string('ever_married');
            $table->string('avg_gluose_level');
            $table->string('bmi');
            $table->string('smoking_status');
            $table->string('stroke');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prediksis');
    }
};
