<?php

namespace App\Http\Controllers;

use App\Models\ClientRecord;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ClientRecordController extends Controller
{
    private $healthCare = [
        "MOH",
        "Ministry of Defense Health Services",
        "Ministry of Interior Medical Services",
        "Ministry of National Guard Health Affairs",
        "University hospitals",
        "KFSH & RC",
        "private healthcare sector",
        "others"
    ];

    private $regions =  [
        "Mecca Region",
        "Riyadh Region",
        "Eastern Region",
        "Aseer Region",
        "Jazan Region",
        "Medina Region",
        "Al-Qassim Region",
        "Tabuk Region",
        "Hail Region",
        "Najran Region",
        "Al-Jawf Region",
        "Al-Bahah Region",
        "Northern Borders Region",
    ];

    public function store(Request $request)
    {

        $fields = Validator::make(
            $request->post(),
            [
                'isHealthcarePractitioner' => ['required', 'boolean'],
                'healthcare_setting' => ['required', Rule::in($this->healthCare)],
                'region' => ['required', Rule::in($this->regions)],
                'centerName' => ['required', 'string'],
                'gender' => ['required', Rule::in(['Male', 'Female'])],
                'age' => 'required|Integer|min:40|max:99',
                'systolicBloodPressure' => ['required', 'integer', 'min:90', 'max:200'],
                'diastolicBloodPressure' => ['required', 'integer', 'min:60', 'max:130'],
                'smoker' => ['required', Rule::in(['Current', 'Former', 'Never'])],
                'onHypertensiontreatment' => ['required', 'boolean'],
                'onStatin' => ['required', 'boolean'],
                'onAspirinTherapy' => ['required', 'boolean'],
                'historyOfDiabetes' => ['required', 'boolean'],
                'diabetesMellitusWithEndOrganDamage' => ['required', 'boolean'],
                'totalCholesterol' => ['required', 'integer', 'min:130', 'max:320'],
                'LDL' => ['required', 'integer', 'min:30', 'max:300'],
                'HDL' => ['required', 'integer', 'min:20', 'max:100'],
                'chronicKidneyDisease' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'familyHistory' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'familialHypercholesterolemia' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'metabolicSyndrome' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'elevatedHighSensitivity' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'historyOfPrematureMenopause' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'historyOfPrematureMenopauseSpecification' => [
                    'required_if:historyOfPrematureMenopause,Yes',
                ],
                'chronicInflammatoryCondition' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'chronicInflammatoryConditionSpecification' => [
                    'required_if:chronicInflammatoryCondition,Yes',
                ],
                'elevatedCoronaryArteryCalciumScore' => ['required', Rule::in(['Yes', 'No', 'Not available'])],
                'coronaryArteryCalciumScore' => ['nullable', 'integer', 'min:0', 'max:100'],
            ]
        );

        if ($fields->fails()) {

            $response = [
                'success' => false,
                'message' => "Validation Error",
                'data' => null,
                'errors' => $fields->errors(),
            ];

            return response($response, 403);
        }

        $dataToSave = [
            'isHealthcarePractitioner' => $fields->validated()['isHealthcarePractitioner'],
            'healthcare_setting' => $fields->validated()['healthcare_setting'],
            'region' => $fields->validated()['region'],
            'centerName' => $fields->validated()['centerName'],
            'gender' => $fields->validated()['gender'],
            'age' => $fields->validated()['age'],
            'systolicBloodPressure' => $fields->validated()['systolicBloodPressure'],
            'diastolicBloodPressure' => $fields->validated()['diastolicBloodPressure'],
            'smoker' => $fields->validated()['smoker'],
            'onHypertensiontreatment' => $fields->validated()['onHypertensiontreatment'],
            'onStatin' => $fields->validated()['onStatin'],
            'onAspirinTherapy' => $fields->validated()['onAspirinTherapy'],
            'historyOfDiabetes' => $fields->validated()['historyOfDiabetes'],
            'diabetesMellitusWithEndOrganDamage' => $fields->validated()['diabetesMellitusWithEndOrganDamage'],
            'totalCholesterol' => $fields->validated()['totalCholesterol'],
            'LDL' => $fields->validated()['LDL'],
            'HDL' => $fields->validated()['HDL'],
            'chronicKidneyDisease' => $fields->validated()['chronicKidneyDisease'],
            'familyHistory' => $fields->validated()['familyHistory'],
            'familialHypercholesterolemia' => $fields->validated()['familialHypercholesterolemia'],
            'metabolicSyndrome' => $fields->validated()['metabolicSyndrome'],
            'elevatedHighSensitivity' => $fields->validated()['elevatedHighSensitivity'],
            'historyOfPrematureMenopause' => $fields->validated()['historyOfPrematureMenopause'],
            'chronicInflammatoryCondition' => $fields->validated()['chronicInflammatoryCondition'],
            'elevatedCoronaryArteryCalciumScore' => $fields->validated()['elevatedCoronaryArteryCalciumScore'],
        ];

        if ($dataToSave["historyOfPrematureMenopause"] == "Yes") {
            $dataToSave['historyOfPrematureMenopauseSpecification'] = $fields->validated()['historyOfPrematureMenopauseSpecification'];
        }

        if ($dataToSave["chronicInflammatoryCondition"] == "Yes") {
            $dataToSave['chronicInflammatoryConditionSpecification'] = $fields->validated()['chronicInflammatoryConditionSpecification'];
        }

        if (isset($fields->validated()['coronaryArteryCalciumScore'])) {
            $dataToSave['coronaryArteryCalciumScore'] = $fields->validated()['coronaryArteryCalciumScore'];
        }



        $age = $fields->validated()['age'];
        $totalCholesterol = $fields->validated()['totalCholesterol'];
        $hdlC = $fields->validated()['HDL'];
        $smoker = $fields->validated()['smoker'] == "Current" ? 1 : 0;
        $diabetes = $fields->validated()['historyOfDiabetes'];
        $untreatedSystolicBP = $fields->validated()['systolicBloodPressure'];


        if ($fields->validated()['gender'] == "Male") {

            $untreatedWeight = $fields->validated()['onHypertensiontreatment'] == 0 ? 1.764 : 1.797;

            $individualSum = (12.344 * log($age)) + (11.853 * log($totalCholesterol)) + (-2.664 * (log($age) * log($totalCholesterol))) +
                (-7.990 * log($hdlC)) + (1.769 * (log($age) * log($hdlC))) + ($untreatedWeight * log($untreatedSystolicBP)) +
                (7.837 * $smoker) + (-1.795 * (log($age) * $smoker)) + (0.658 * $diabetes);

            $meanCoefficientValueSum = 61.18;

            // Calculate the exponent
            $exponent = $individualSum - $meanCoefficientValueSum;

            // Calculate the estimated 10-year risk
            $baselineSurvival = 0.9144;
        } else {

            $untreatedWeight = $fields->validated()['onHypertensiontreatment'] == 0 ? 1.957 : 2.019;

            $individualSum = (-29.799 * log($age)) + (4.884 * pow(log($age), 2)) + (13.54 * log($totalCholesterol)) +
                (-3.114 * (log($age) * log($totalCholesterol))) + (-13.578 * log($hdlC)) +
                (3.149 * (log($age) * log($hdlC))) + ($untreatedWeight * log($untreatedSystolicBP)) +
                (7.574 * $smoker) + (-1.665 * (log($age) * $smoker)) + (0.661 * $diabetes);

            // Calculate the mean (Coefficient × Value) sum
            $meanCoefficientValueSum = -29.18;

            // Calculate the exponent
            $exponent = $individualSum - $meanCoefficientValueSum;

            // Calculate the estimated 10-year risk
            $baselineSurvival = 0.9665;
        }

        $risk = 1 - pow($baselineSurvival, exp($exponent));

        $risk *= 100;
        $riskPercentage = round($risk, 1);

        $dataToSave['result'] = $riskPercentage;

        $clientRecord = ClientRecord::create($dataToSave);
        if ($riskPercentage < 5) {
            $category = "Low-Risk";
        } elseif ($riskPercentage < 7.5) {
            $category = "Borderline-Risk";
        } elseif ($riskPercentage < 20) {
            $category = "Intermediate-Risk";
        } else {
            $category = "High-Risk";
        }

        Notification::create([
            'client_record_id' => $clientRecord->id,
            'body' => "A new form was submitted on " . $clientRecord->created_at . " with ID: "
                . $clientRecord->id .
                " and risk score = "
                . $riskPercentage .
                "% \n Categorized as: "
                . $category
        ]);

        return response([
            "result" => $clientRecord->result
        ], 201);
    }

    public function index(Request $request)
    {
        $query = ClientRecord::query()->orderBy('created_at', 'desc');

        if ($request->has('query')) {
            $query->where(function ($q) use ($request) {
                $q->where('centerName', 'like', '%' . $request->query('query') . '%')
                    ->orWhere('healthcare_setting', 'like', '%' . $request->query('query') . '%');
            });
        }

        // Get total count of records
        $totalRecords = $query->count();

        // Apply pagination
        $page = $request->query('page', 1);
        $limit = $request->query('limit', 10);
        $offset = ($page - 1) * $limit;
        $query->offset($offset)->limit($limit);

        // Get paginated records
        $clientRecords = $query->get();

        return response()->json([
            'data' => $clientRecords,
            'total' => $totalRecords,
            'page' => $page,
            'limit' => $limit,
        ]);
    }

    public function delete(Request $request)
    {
        $fields = Validator::make(
            $request->post(),
            [
                'id' => 'required|string|exists:client_records',
            ]
        );

        if ($fields->fails()) {

            $response = [
                'success' => false,
                'message' => "Validation Error",
                'data' => null,
                'errors' => $fields->errors(),
            ];

            return response($response, 403);
        }

        $record = ClientRecord::find($fields->validated()['id']);
        $response = [
            'success' => true,
            'message' => "Record deleted successfully.",
            'data' => null,
            'errors' => null,
        ];
        $record->delete();
        return  response($response, 201);
    }
}
