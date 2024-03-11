<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorDashboadController extends Controller
{
    //
    public function index()
    {
       // echo "ok"; die;
      return view('back/dashboard');
    }
}
