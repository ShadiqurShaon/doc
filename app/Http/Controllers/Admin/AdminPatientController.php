<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;\

class AdminPatientController extends Controller
{
    public function index()
    {
      return view('admin.adminPatient');
    }




    public function patientStatus($status_name)
    {
    	$firestore = app('firebase.firestore');
    	$db = $firestore->database();
    	$patientRef = $db->collection('users');


    	if ($status_name=='approve'){
   			$query = $patientRef->where('approve','=',true);
   			$approvePatient = $query->documents();
   			return $approvePatient;
   			//return all approve doctor
   		}
   		else if($status_name=='reject'){
   			$query = $patientRef->where('approve','=',false);
   			$rejectPatient = $query->documents();
   			return $rejectPatient;
   			//return all rejected docotr

   		}
   		else if($status_name == 'pending'){
   			$pending_patient = array();
   			$allpatient = $patientRef->documents();
	   		foreach ($allpatient as $patient) {
	   			if($patient->exists()){
	   				$data = $patient->data();
	   				if(!array_key_exists('approve',$data)){
	   					array_push($pending_patient, $patient->data());
	   				}
	   			}
	   		}


	   		return view('admin.pendingPatient')->with('pending_doctor',$pending_patient); 
	   		//return pending docotr
   		} 
    }


    public function approvePtient($id)
    {
    	$firestore = app('firebase.firestore');
   		$db = $firestore->database();
   		$patientRef = $db->collection('users')->document($id);
      	$snapsot = $patientRef->snapshot();

   		$patientRef->set([
   			'approve'=>true
   		],['merge' => true]);

       $data = ['message' => 'This message is from hello doc','flag'=>true];
       $send_to = $snapsot['email'];


       Mail::to($send_to)->send(new sendEmail($data));


   		return "Update successfully";
    }

    public function rejectPatient($id)
    {
    	$firestore = app('firebase.firestore');
    	$db = $firestore->database();
    	$patientRef = $db->collection('users')->document($id);
      $snapsot = $patientRef->snapshot();
    	$docRef->set([
   			'approve'=>false
   		],['merge' => true]);

      $data = ['message' => 'This message is from hello doc','flag'=>false];
      $send_to = $snapsot['email'];

      Mail::to($send_to)->send(new sendEmail($data));
    	return "update sucessfully";
    }


    public function approvePatientBylist(Request $request)
    {
    	$listofpatient = $request->input('patientlist');

      foreach ($listofpatient as $key => $value) {
        
        $this->approveDoctor($value->patientid);

      }

      return "All doctor update successfully";
    }

    public function rejectpatientBylist(Request $request)
    {
    	$listofpatient = $request->input('patientlist');
    	foreach ($listofpatient as $key => $value) {
        
        $this->rejectPatient($value->patientid);

      }

      return "All doctor update successfully";
    }

}
