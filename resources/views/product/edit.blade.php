@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/dropzone/dropzone.css">
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div>
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#product" data-toggle="tab">Product</a></li>
                    <li><a href="#image" data-toggle="tab">Image</a></li>
                </ul>

                <div class="tab-content">
                    <div id="product" class="tab-pane fade in active">
                    <!-- <div class="modal-dialog" role="document"> -->
                    <!-- <div class="modal-content"> -->
                        <div class="modal-header">
                            <h4 class="modal-title" >Edit Product</h4>
                        </div>
                        @foreach ($product as $val)
                        <form class="form" action="{{ url('/product/update',$val->id_product) }}" method="POST">
                            {!! csrf_field() !!}
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="recipient-name" class="control-label">Name Product:</label>
                                        <input type="text" class="form-control" name="PRODUCT[name_product]" id="name_product" value="{{ $val->name_product }}" data-validation="length" data-validation-length="3-50" data-validation-error-msg="Nama Produk Tidak Boleh Kosong (3-50 chars)">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Categori:</label>
                                        <select class="form-control" name="PRODUCT[categori_product]" id="categori_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Kategori">
                                        @foreach($categories as $categori)
                                            @if( $val->categori_product == $categori->id_categori)
                                                <option value="{{ $categori->id_categori }}" selected>{{ $categori->information_categori}}</option>
                                            @else
                                                <option value="{{ $categori->id_categori }}">{{ $categori->information_categori}}</option>
                                            @endif
                                        @endforeach   
                                        </select>
                                    </div> 
                                    <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Code Product:</label>
                                        <input type="text" class="form-control" name="PRODUCT[code_product]" id="categori_product" value="{{ $val->code_product }}" data-validation="length" data-validation-length="3-10" data-validation-error-msg="Kode Produk Tidak Boleh Kosong (3-10 chars)">
                                    </div> 
                                    <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Price:</label>
                                        <input type="text" class="form-control" name="PRODUCT[price_product]" id="price_product" value="{{ $val->price_product }}" data-validation="decimal" data-validation-allowing="float" 
                                        data-validation-decimal-separator="." data-validation-error-msg="Harga Tidak Boleh Kosong (number)">
                                    </div>
                                     <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Reference Price:</label>
                                        <input type="text" class="form-control" name="PRODUCT[refprice_product]" id="refprice_product" value="{{ $val->refprice_product }}" data-validation="number" data-validation-allowing="float" 
                                        data-validation-decimal-separator="." data-validation-error-msg="Referensi Harga Tidak Boleh Kosong (number)">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="message-text" class="control-label">Description:</label>
                                        <textarea class="form-control" name="PRODUCT[description_product]" id="description_product" rows="5" data-validation="required" data-validation-error-msg="Deskripsi Tidak Boleh Kosong">{{ $val->description_product }}</textarea>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="recipient-name" class="control-label">Minimum Order:</label>
                                        <input type="text" class="form-control" name="PRODUCT[minimumorder_product]" id="minimumorder_product" value="{{ $val->minimumorder_product }}" data-validation="number" data-validation-error-msg="Minimum Order Tidak Boleh Kosong (number)">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="recipient-name" class="control-label">Stock:</label>
                                        <input type="text" class="form-control" name="PRODUCT[stock_product]" id="stock_product" value="{{ $val->stock_product }}" data-validation="number" data-validation-error-msg="Stock Tidak Boleh Kosong (number)">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="recipient-name" class="control-label">Stock Inventory:</label>
                                        <input type="text" class="form-control" name="PRODUCT[stock_product_inventory]" id="stock_product_inventory" value="{{ $val->stock_product_inventory }}" data-validation="number" data-validation-error-msg="Stock Tidak Boleh Kosong (number)">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Condition:</label>
                                        <select class="form-control" name="PRODUCT[condition_product]" id="insurance_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Kondisi Produk">
                                        @foreach($condition as $condition)
                                            @if( $val->condition_product == $condition->id_status)
                                                <option value="{{ $condition->id_status }}" selected>{{ $condition->information_status}}</option>
                                            @else
                                                <option value="{{ $condition->id_status }}">{{ $condition->information_status}}</option>
                                            @endif
                                        @endforeach 
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="recipient-name" class="control-label">Insurance:</label>
                                        <select class="form-control" name="PRODUCT[insurance_product]" id="insurance_product" data-validation="required" data-validation-error-msg="Silahkan Pilih Status Asuransi">
                                        @foreach($insurance as $insurance)
                                            @if( $val->insurance_product == $insurance->id_status)
                                                <option value="{{ $insurance->id_status }}" selected>{{ $insurance->information_status}}</option>
                                            @else
                                                <option value="{{ $insurance->id_status }}">{{ $insurance->information_status}}</option>
                                            @endif
                                        @endforeach  
                                        </select>
                                    </div>
                                </div>
                            
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url('/home') }}"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                        @endforeach
                    <!-- </div> -->
                    <!-- </div> -->
                    </div>                    
                    <div id="image" class="tab-pane fade">
                        <div class="modal-header">
                            <h4 class="modal-title" >Upload Image</h4>
                        </div>
                        
                        <form action="{{ url('/product/upload',$val->id_product)}}" class="dropzone" name="image" id="my-awesome-dropzone">{!! csrf_field() !!}
                        </form>
                        <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                            @if ($errors->has('file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                            @endif
                        </div>
                        @foreach($image as $image)
                        @if($image->name_file != '')
                        <div class="col-md-4 product simpleCart_shelfItem text-center">
                            <a href="single.html"><img src="/{{$image->name_file}}" alt="" /></a>
                            <div class="mask">
                                <a href="single.html">Quick View</a>
                            </div>
                            <a class="product_name" href="single.html">similique sunt</a>
                            <p><a class="item_add" href="#"><i></i> <span class="item_price">$359.6</span></a></p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/form-validator/jquery.form-validator.min.js"></script>
<script src="/dropzone/min/dropzone.min.js"></script>
<script type="text/javascript">
$.validate({
});
Dropzone.options.myAwesomeDropzone = {
    maxFilesize   :       1, //MB
    acceptedFiles : ".jpeg,.jpg,.png,.gif"
};
</script>
@endsection