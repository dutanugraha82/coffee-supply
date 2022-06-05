@extends('master')
@section('content')
<div class="card card-dark mx-4">
    <div class="card-header">
      <h3 class="card-title">Input Order</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/delivery/{{ $order->id }}" method="POST">
        @csrf
        @method('put')
      <div class="card-body">
        <div class="form-group">
          <label>Origin Coffee</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Coffee Type" name="origin_coffee" id="origin_coffee" value="{{ $order->origin_coffee }}">
          @error('origin_coffee')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group">
          <label>Weight</label>
          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Weight" name="weight" id="weight" value="{{ $order->weight }}">
          @error('weight')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
        </div>
        <div class="form-group">
            <label>Coffee Type</label>
            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="coffee_type">
              <option selected>{{ $order->coffee_type }}</option>
              <option value="arabica">Arabica</option>
              <option value="robusta">Robusta</option>
            </select>
            @error('coffee_type')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          </div>
          <div class="form-group">
            <label>Ship Option</label>
            <select class="custom-select rounded-0" id="exampleSelectRounded0" name="shipoption">
              <option>{{ $order->shipoption }}</option>
              <option value="10">Priority</option>
              <option value="5">Regular</option>
            </select>
            @error('shipoption')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          </div>
          <div class="form-group">
            <label>Item Code</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Item Code" name="itemcode" value="{{ $order->itemcode }}">
            @error('itemcode')
                <div class="alert alert-danger">{{ $message }}</div>
         @enderror
          </div>
      <!-- /.card-body -->

      <div class="card-footer text-right">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
    
@endsection