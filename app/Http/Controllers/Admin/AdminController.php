<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {

    }
    
    public function index()
    {
        
        $firestore = app('firebase.firestore');
   		$database = $firestore->database();
   		$docRefe = $database->collection('doctors');
   		$patientRefe = $database->collection('patient');
   		$doctors = $docRefe->documents();
   		$patients = $patientRefe->documents();

   		$doctor_count = 0;
   		foreach ($doctors as $key => $value) {
   			$doctor_count++;
   		}


   		$patient = $patientRefe->documents();
   		$patient_count=0;
   		foreach ($patients as $key => $value) {
   			$patient_count++;
   		}

   		
        return view('admin.index');
        
    }
}
