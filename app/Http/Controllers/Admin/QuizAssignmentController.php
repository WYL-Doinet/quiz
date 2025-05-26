<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ResultsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuizAssignmentController extends Controller
{
    public function exportResult(Request $request)
    {
        $assignmentId = $request->route('assignment_id');

        return Excel::download(new ResultsExport($assignmentId), "result-" . now()->format('Y/m/d') . "-" . $assignmentId . '.csv');
    }
}
