<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRecord extends Model
{
    protected $fillable = [
        'isHealthcarePractitioner',
        'healthcare_setting',
        'region',
        'centerName',
        'gender',
        'age',
        'systolicBloodPressure',
        'diastolicBloodPressure',
        'smoker',
        'onHypertensiontreatment',
        'onStatin',
        'onAspirinTherapy',
        'historyOfDiabetes',
        'diabetesMellitusWithEndOrganDamage',
        'totalCholesterol',
        'LDL',
        'HDL',
        'chronicKidneyDisease',
        'familyHistory',
        'familialHypercholesterolemia',
        'metabolicSyndrome',
        'elevatedHighSensitivity',
        'historyOfPrematureMenopause',
        'historyOfPrematureMenopauseSpecification',
        'chronicInflammatoryCondition',
        'chronicInflammatoryConditionSpecification',
        'elevatedCoronaryArteryCalciumScore',
        'coronaryArteryCalciumScore',
        'result',
    ];

    use HasFactory;
}
