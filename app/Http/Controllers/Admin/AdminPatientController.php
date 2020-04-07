<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPatientController extends Controller
{
    public function patientStatus($status)
    {
    	$firestore = app('firebase.firestore');
    	$db = $firestore->database();
    	$patientRef =  
    }
}
