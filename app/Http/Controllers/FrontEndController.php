<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class FrontEndController extends Controller
{
    public function index()
    {
        $product = DB::table('mst_product as a')
        			 ->SELECT('a.id_product','a.name_product','a.price_product','b.name_file')
        			 ->LEFTJOIN('tbl_product_file as b', 'b.id_product', '=' , 'a.id_product')
        			 ->GROUPBY('a.name_product')
        			 ->ORDERBY('a.created_at', 'DESC')
        			 ->paginate('9');
        return view('web/index', ['products'=>$product]);
    }

    public function view($id="")
    {
		$product    = DB::table('mst_product')
						->WHERE('id_product',$id)
						->get();
		$image    	= DB::table('mst_product as a')
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

        return view('web/single', ['product'=>$product,'image'=> $image,'categories' => $categories,'condition'=>$condition,'insurance'=>$insurance]);
    }

}