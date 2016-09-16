@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Administrator
                </div>

                <div class="panel-body">
                    Hello <b>{{ Auth::user()->name }}</b>. <br> You are logged in!
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><button class="btn btn-primary" data-toggle="modal" data-target="#productModal">Add Product</button> | List Product </div>
                <div class="panel-body">
                  
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Name</th>
                                    <th>Picture</th>
                                    <th>Categori</th>
                                    <th>Price</th>
                                    <th>Reference Price</th>
                                    <th>Minimum Order</th>
                                    <th>Stock</th>
                                    <th>Stock Inventory</th>
                                    <th>Condition</th>
                                    <th>Insurance</th>
                                    <th>Date Input</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key=>$val)
                                <tr>
                                    <td>{{ ($products->currentpage()-1) * $products->perpage() + $key + 1 }}</td>
                                    <td><strong>{{ $val->name_product}}</strong></td>
                                    <td>No Image</td>
                                    <td>{{ $val->categori }}</td>
                                    <td>{{ $val->price_product }}</td>
                                    <td>{{ $val->refprice_product }}</td>
                                    <td>{{ $val->minimumorder_product }}</td>
                                    <td>{{ $val->stock_product }}</td>
                                    <td>{{ $val->stock_product_inventory }}</td>
                                    <td>{{ $val->condition }}</td>
                                    <td>{{ $val->insurance }}</td>
                                    <td>{{ $val->created_at }}</td>
                                    <td>
                                        <a href=""><button class="btn btn-success">Image</button></a>
                                        <a href="{{ url('/product/edit',$val->id_product) }}" ><button class="btn btn-primary">Edit</button></a>
                                        <button class="btn btn-danger">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                        {!! $products->render() !!}   
                        <div>Showing {{($products->currentpage()-1)*$products->perpage()+1}} to {{$products->currentpage()*$products->perpage()}} of  {{$products->total()}} entries
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">New Product</h4>
                            </div>
                            <form class="form" action="{{ url('/product/save') }}" method="POST">
                                {!! csrf_field() !!}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <label for="recipient-name" class="control-label">Name Product:</label>
                                            <input type="text" class="form-control" name="PRODUCT[name_product]" id="name_product" data-validation="length" data-validation-length="3-200" data-validation-error-msg="Nama Produk Tidak Boleh Kosong (3-200 chars)">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Categori:</label>
                                            <select class="form-control" name="PRODUCT[categori_product]" id="categori_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Kategori">
                                                <option value="">Pilih Kategori</option>
                                                @foreach($categories as $categori)
                                                <option value="{{ $categori->id_categori }}">{{ $categori->information_categori}}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Code Product:</label>
                                            <input type="text" class="form-control" name="PRODUCT[code_product]" id="categori_product" value="{{ $code_product }}" data-validation="length" data-validation-length="3-10" data-validation-error-msg="Kode Produk Tidak Boleh Kosong (3-10 chars)">
                                        </div> 
                                        <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Price:</label>
                                            <input type="text" class="form-control" name="PRODUCT[price_product]" id="price_product" data-validation="number" data-validation-allowing="decimal" 
                                            data-validation-decimal-separator="," data-validation-error-msg="Harga Tidak Boleh Kosong (number)">
                                        </div>
                                         <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Reference Price:</label>
                                            <input type="text" class="form-control" name="PRODUCT[refprice_product]" id="refprice_product" data-validation="number" data-validation-allowing="decimal" 
                                            data-validation-decimal-separator="," data-validation-error-msg="Referensi Harga Tidak Boleh Kosong (number)">
                                        </div>
                                        <div class="col-xs-12">
                                            <label for="message-text" class="control-label">Description:</label>
                                            <textarea class="form-control" name="PRODUCT[description_product]" id="description_product" rows="5" data-validation="required" data-validation-error-msg="Deskripsi Tidak Boleh Kosong"></textarea>
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="recipient-name" class="control-label">Minimum Order:</label>
                                            <input type="text" class="form-control" name="PRODUCT[minimumorder_product]" id="minimumorder_product" data-validation="number" data-validation-error-msg="Minimum Order Tidak Boleh Kosong (number)">
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="recipient-name" class="control-label">Stock:</label>
                                            <input type="text" class="form-control" name="PRODUCT[stock_product]" id="stock_product" data-validation="number" data-validation-error-msg="Stock Tidak Boleh Kosong (number)">
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="recipient-name" class="control-label">Stock Inventory:</label>
                                            <input type="text" class="form-control" name="PRODUCT[stock_product_inventory]" id="stock_product_inventory" data-validation="number" data-validation-error-msg="Stock Tidak Boleh Kosong (number)">
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Condition:</label>
                                            <select class="form-control" name="PRODUCT[condition_product]" id="insurance_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Kondisi Produk">
                                                <option value="">Pilih Kondisi</option>
                                                @foreach($condition as $val)
                                                <option  value="{{ $val->id_status }}">{{ $val->information_status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-6">
                                            <label for="recipient-name" class="control-label">Insurance:</label>
                                            <select class="form-control" name="PRODUCT[insurance_product]" id="insurance_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Status Asuransi">
                                                <option value="">Pilih Status</option>
                                                @foreach($insurance as $val)
                                                <option  value="{{ $val->id_status }}">{{ $val->information_status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/form-validator/jquery.form-validator.min.js"></script>
<script>
  $.validate({
  });
</script>
@endsection