<?php

namespace App\Http\Controllers;

use App\Models\ClientRecord;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function getStatistics()
    {
        $statistics = [];

        $columns = [
            'elevatedCoronaryArteryCalciumScore',
            'chronicInflammatoryCondition',
            'historyOfPrematureMenopause',
            'elevatedHighSensitivity',
            'metabolicSyndrome',
            'familialHypercholesterolemia',
            'familyHistory',
            'chronicKidneyDisease',
            'diabetesMellitusWithEndOrganDamage',
            'historyOfDiabetes',
            'onAspirinTherapy',
            'onStatin',
            'onHypertensiontreatment',
            'smoker',
            'gender',
            'healthcare_setting',
        ];
        foreach ($columns as $column) {
            $statistics[$column] = ClientRecord::query()
                ->select($column, DB::raw('count(*) as count'))
                ->groupBy($column)
                ->get()
                ->pluck('count', $column)
                ->toArray();
        }

        $risk = [
            'low' => ClientRecord::whereBetween('result', [0, 5])->count(),
            'intermediate' => ClientRecord::whereBetween('result', [5, 7.5])->count(),
            'high' => ClientRecord::whereBetween('result', [7.5, 20])->count(),
            'danger' => ClientRecord::where('result', '>=', 20)->count(),
        ];

        $adminCount = User::count();

        $formsCount = ClientRecord::count();

        $recordsPerMonth = DB::table('client_records')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize the array with 0 values for each month
        $recordsPerMonthArray = array_fill(0, 12, 0);
        $notifications = Notification::orderByDesc('created_at')->get();
        // Set the count for each month in the array
        foreach ($recordsPerMonth as $month => $count) {
            $recordsPerMonthArray[$month - 1] = $count;
        }

        $response = [
            'success' => true,
            'message' => 'Stats fetched.',
            'data' => [
                'adminCount' => $adminCount,
                'formsCount' => $formsCount,
                'statistics' => $statistics,
                'formsPerMonth' => $recordsPerMonthArray,
                'risk' => $risk,
                'notifications' => $notifications,
            ],
            'errors' => null,
        ];

        return response($response, 201);
    }
}
