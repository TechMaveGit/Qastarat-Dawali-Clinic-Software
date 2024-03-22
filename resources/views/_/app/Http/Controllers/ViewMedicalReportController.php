<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewMedicalReportController extends Controller
{
    //
    public function index()
    {
        return view('back/view-medical-report');
    }
}
