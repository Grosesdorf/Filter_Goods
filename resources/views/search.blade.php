@extends('layouts.app')

@section('content')
<div id="spinner">
  <i class="fa fa-spinner fa-spin"></i>
</div>
<div class="row">
  <div class="col-sm-4 col-md-4 col-sm-offset-4 col-md-offset-4">
    <form id="search-form" action="/search" method="post" class="form-horizontal">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="name" class="col-xs-2 control-label">Name</label>
        <div class="col-xs-8 col-xs-offset-2">
          <input type="text" class="form-control" id="name" name="name" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-xs-2 control-label">Bedrooms</label>
        <div class="col-xs-8 col-xs-offset-2">
          <input type="text" class="form-control" id="name" name="bedrooms" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-xs-2 control-label">Bathrooms</label>
        <div class="col-xs-8 col-xs-offset-2">
          <input type="text" class="form-control" id="name" name="bathrooms" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-xs-2 control-label">Storeys</label>
        <div class="col-xs-8 col-xs-offset-2">
          <input type="text" class="form-control" id="name" name="storeys" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="name" class="col-xs-2 control-label">Garages</label>
        <div class="col-xs-8 col-xs-offset-2">
          <input type="text" class="form-control" id="name" name="garages" placeholder="">
        </div>
      </div>
      <div class="form-group">
        <label for="amount" class="col-xs-2 control-label">Price range:</label>
        <div class="col-xs-4 col-xs-offset-2">
          <input type="text" id="amount_min" name="amount_min" class="form-control  text-center" value="{{ $data[0]['min_price'] }}" readonly>
        </div>
        <div class="col-xs-4">
          <input type="text" id="amount_max" name="amount_max" class="form-control  text-center" value="{{ $data[0]['max_price'] }}" readonly>
        </div>
      </div>
      <div class="form-group">
        <div class="col-xs-8 col-xs-offset-4">
          <div id="slider-range"></div> 
        </div>
      </div>
      <div class="form-group  text-center">
        <div class="col-xs-8 col-xs-offset-4">
          <button type="button" id="search-btn" class="btn btn-default">Search</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div id="results" class="table-responsive"></div>
@endsection
