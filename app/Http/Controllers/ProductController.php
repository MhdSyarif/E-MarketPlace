<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB; 
use App\Main;
use App\Product;
use App\Image;
use Auth;

class ProductController extends Controller
{
    public function __construct(Main $mainModel, Product $productModel)
    {
        $this->middleware('auth');
        $this->mainModel    = $mainModel;
        $this->productModel = $productModel;
    }

    public function store(Request $request)
    {
        foreach($request->input('PRODUCT') as $a=>$b){
            $arrProduct[$a]=$b;
        }
        $arrProduct['id_product']   = DB::table('mst_product')->max('id_product')+1;
        $arrProduct['user_action']  = Auth::user()->id;
        $arrProduct['id_company']   = Auth::user()->id;

        DB::table('mst_product')
                    ->insert($arrProduct);

        //Simpan ke Tabel Audit
        $this->mainModel->setAudit($arrProduct['id_product'],"Menambahkan Produk",json_encode($arrProduct),Auth::user()->id);           

        return back();
    }

    public function show($id)
    {   
        $product = $this->productModel->get_data($id);
        return view('product/edit',$product);
    }

    public function update(Request $request, $id)
    {
        $data    = $request->input('PRODUCT');
        $product = $this->productModel->get_update($data,$id);
        return redirect('/home');
    }

    public function upload(Request $request, $id)
    {

        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,JPEG,png,bmp|max:2024',
        ]);

     
        $file_type    = $request->file('file')->getClientOriginalExtension();
        $path         = base_path().'/public/uploads/';
        $year_folder  = $path.date("Y");
        $month_folder = $year_folder . '/' . date("m");
        $date_folder  = $year_folder . '/' . date("m") . '/' . date('d');
        $file_name    = $id.'_'.date('Ymd_his').'.'.$file_type;

        !file_exists($year_folder) && mkdir($year_folder, 0777);
        !file_exists($month_folder) && mkdir($month_folder, 0777);
        !file_exists($date_folder) && mkdir($date_folder, 0777);
        
        $path = $date_folder;
        $request->file('file')->move($path, $file_name);
        $newImage              = new Image();
        $newImage->id_file     = DB::table('tbl_product_file')->max('id_file')+1;
        $newImage->id_product  = $id; 
        $newImage->name_file   = 'uploads/'.date("Y").'/'.date('m').'/'.date('d').'/'.$file_name;
        $newImage->type_file   = $file_type;
        $newImage->user_action = Auth::user()->id;
        
        $newImage->save();

        return  response()->json("Sukses",200);

    }

    public function remove(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();

        return back();
    }
}