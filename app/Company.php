<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $primaryKey = "id_company";
    
    protected $table = "mst_company";
}
