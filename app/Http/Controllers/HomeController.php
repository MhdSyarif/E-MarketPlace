<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product = DB::table('mst_product as a')
                    ->SELECT('a.id_product','a.name_product','a.price_product','a.refprice_product','a.description_product','a.minimumorder_product','a.stock_product','a.stock_product_inventory','a.created_at','b.information_categori as categori','c.information_status as condition','d.information_status as insurance')
                    ->LEFTJOIN('mst_categori as b', 'b.id_categori', '=', 'a.categori_product')
                    ->LEFTJOIN('mst_status as c', 'c.id_status', '=', 'a.condition_product')
                    ->LEFTJOIN('mst_status as d', 'd.id_status', '=', 'a.insurance_product')
                    ->ORDERBY('a.created_at', 'DESC')
                    ->paginate(4);
        $rand_code  = 'P'.substr(date('Y-dis'),2,12);
        $categories = DB::table('mst_categori')
            ->get();
        $condition  = DB::table('mst_status')->where('code_status','CONDITION')
            ->get();
        $insurance  = DB::table('mst_status')->where('code_status','INSURANCE')
            ->get();
            
        if(Auth::user()->status_user  == "Y")
            return view('home', ['products'=>$product,'code_product'=>$rand_code,'categories' => $categories,'condition'=>$condition,'insurance'=>$insurance]);
        else
            return view('welcome_company');
        
    }
}