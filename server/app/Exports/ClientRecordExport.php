<?php

namespace App\Exports;

use App\Models\ClientRecord;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientRecordExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ClientRecord::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'isHealthcarePractitioner',
            'healthcare_sector',
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
            'created_at',
            'updated_at',

        ];
    }
}
