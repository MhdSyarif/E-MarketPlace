@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Company
                </div>

                <div class="panel-body">
                    Hello <b>{{ Auth::user()->name }}</b>. <br> You are logged in!
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