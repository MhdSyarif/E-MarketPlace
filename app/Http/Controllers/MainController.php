<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class MainController extends Controller
{
    public function setAudit($id_product,$information="",$objek,$user)
    {
    	$arrayLog = array('id_audit' =>DB::table('tbl_audit')->max('id_audit')+1,
    						'id_product' =>$id_product,
    						'information'=>$information,
    						'objek'=>$objek,
    						'user_action'=>$user);
    	DB::table('tbl_audit')
    				->insert($arrayLog);
    }

    public function setUpload($mappingdok="")
    {
       $mappingdok = 'uploads/'.date("Y").'/'.date('m').'/'.date('d').'/';
    }
}
