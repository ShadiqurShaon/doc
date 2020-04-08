<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\sendEmail;
use Mail;

class AdminDoctorController extends Controller
{
    public function index()
    {
    	return "the view page of doctor admin";
    }

    public function docStatus($status_name)
    {
    	//this status_name should be approve or reject or pending
    	$firestore = app('firebase.firestore');
   		$db = $firestore->database();
   		$doctorRef = $db->collection('doctors');

   		if ($status_name=='Approve'){
   			$query = $doctorsRef->where('approve','=',true);
   			$approveDOctor = $query->documents();
   			return $approveDOctor;
   			//return all approve doctor
   		}
   		else if($status_name=='Reject'){
   			$query = $doctorsRef->where('approve','=',false);
   			$rejectDoctors = $query->documents();
   			return $rejectDoctors;
   			//return all rejected docotr

   		}
   		else if($status_name == 'pending'){
   			$pending_doctor = array();
   			$allDoctor = $doctorRef->documents();
	   		foreach ($allDoctor as $doctor) {
	   			if($doctor->exists()){
	   				$data = $doctor->data();
	   				if(!array_key_exists('approve',$data)){
	   					array_push($pending_doctor, $doctor->data());
	   				}
	   			}
	   		}


	   		return $pending_doctor;
	   		//return pending docotr
   		}

    }


    public function approveDoctor($id)
    {	

    	$firestore = app('firebase.firestore');
   		$db = $firestore->database();
   		$docRef = $db->collection('doctors')->document($id);
      $snapsot = $docRef->snapshot();

   		$docRef->set([
   			'approve'=>true
   		],['merge' => true]);

       $data = ['message' => 'This message is from hello doc','flag'=>true];
       $send_to = $snapsot['email'];


       Mail::to($send_to)->send(new sendEmail($data));


   		return "Update successfully";

    }

    public function rejectDoctor($id)
    {
    	$firestore = app('firebase.firestore');
    	$db = $firestore->database();
    	$docRef = $db->collection('doctors')->document($id);
    	$docRef->set([
   			'approve'=>false
   		],['merge' => true]);

    	return "update sucessfully";
    }
}
