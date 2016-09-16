<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Main extends Model
{
     public function __construct()
    {
    	
    }

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
}
