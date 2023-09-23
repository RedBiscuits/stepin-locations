<?php

namespace App\Http\Controllers;

use App\Exports\ClientRecordExport;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller
{
    public function downloadExcel()
    {
        return Excel::download(new ClientRecordExport, 'form-submissions.xlsx');
    }
}
