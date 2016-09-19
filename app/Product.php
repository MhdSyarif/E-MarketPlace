<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use DB;
use Auth;
=======
>>>>>>> 893353eb97fb80c9bd094c2c3250531fde66a3a2

class Product extends Model
{
    protected $primaryKey = "id_product";
    
    protected $table = "mst_product";
<<<<<<< HEAD

    public function __construct(Main $mainModel)
    {
        $this->mainModel    = $mainModel;
    }

    public function get_data($id)
    {
    	
        $product    = DB::table('mst_product')
						->WHERE('id_product',$id)
						->get();
		$image      = DB::table('mst_product as a')
                        ->LEFTJOIN('tbl_product_file as b', 'b.id_product', '=', 'a.id_product')
                        ->WHERE('a.id_product',$id)
                        ->get();
		$categories = DB::table('mst_categori')
						->get();
		$condition  = DB::table('mst_status')
						->where('code_status','CONDITION')
						->get();
		$insurance  = DB::table('mst_status')
						->where('code_status','INSURANCE')
						->get();
		
		$data = array_merge(['product'=>$product,'categories' => $categories,'condition'=>$condition,'insurance'=>$insurance,'image'=>$image]);
		
		return $data;
    }

    public function get_update($data,$id)
    {
    	DB::table('mst_product')
			->where('id_product',$id)
			->update($data);

		//Simpan ke Tabel Audit
		$this->mainModel->setAudit($id,"Merubah Produk",json_encode($data),Auth::user()->id);
    }
=======
>>>>>>> 893353eb97fb80c9bd094c2c3250531fde66a3a2
}
