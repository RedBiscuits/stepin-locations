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
        Schema::create('client_records', function (Blueprint $table) {
            $table->id();
            $table->boolean('isHealthcarePractitioner');

            $table->enum('healthcare_setting', [
                'MOH',
                'Ministry of Defense Health Services',
                'Ministry of Interior Medical Services',
                'Ministry of National Guard Health Affairs',
                'University hospitals',
                'KFSH & RC',
                'private healthcare sector',
                'others',
            ]);
            $table->enum('region', [
                'Mecca Region',
                'Riyadh Region',
                'Eastern Region',
                'Aseer Region',
                'Jazan Region',
                'Medina Region',
                'Al-Qassim Region',
                'Tabuk Region',
                'Hail Region',
                'Najran Region',
                'Al-Jawf Region',
                'Al-Bahah Region',
                'Northern Borders Region',
            ]);
            $table->string('centerName');
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('age');
            $table->integer('systolicBloodPressure');
            $table->integer('diastolicBloodPressure');
            $table->enum('smoker', ['Current', 'Former', 'Never']);
            $table->boolean('onHypertensiontreatment');
            $table->boolean('onStatin');
            $table->boolean('onAspirinTherapy');
            $table->boolean('historyOfDiabetes');
            $table->boolean('diabetesMellitusWithEndOrganDamage');
            $table->integer('totalCholesterol');
            $table->integer('LDL');
            $table->integer('HDL');
            $table->enum('chronicKidneyDisease', ['Yes', 'No', 'Not available']);
            $table->enum('familyHistory', ['Yes', 'No', 'Not available']);
            $table->enum('familialHypercholesterolemia', ['Yes', 'No', 'Not available']);
            $table->enum('metabolicSyndrome', ['Yes', 'No', 'Not available']);
            $table->enum('elevatedHighSensitivity', ['Yes', 'No', 'Not available']);
            $table->enum('historyOfPrematureMenopause', ['Yes', 'No', 'Not available']);
            $table->string('historyOfPrematureMenopauseSpecification')->nullable();
            $table->enum('chronicInflammatoryCondition', ['Yes', 'No', 'Not available']);
            $table->string('chronicInflammatoryConditionSpecification')->nullable();
            $table->enum('elevatedCoronaryArteryCalciumScore', ['Yes', 'No', 'Not available']);
            $table->integer('coronaryArteryCalciumScore')->nullable();
            $table->double('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_records');
    }
};
