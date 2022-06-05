@extends('master')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Data Stock</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0" style="height: 300px;">
      <table class="table table-head-fixed text-nowrap">
        <thead>
          <tr>
            <th>No</th>
            <th>Coffee Type</th>
            <th>Origin Coffee</th>
            <th>Weight</th>
            <th>Item Code</th>
          </tr>
        </thead>
        @foreach ($data as $item)
        <tbody>
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->coffeetype }}</td>
            <td>{{ $item->origincoffee }}</td>
            <td>{{ $item->weight }}</td>
            <td>{{ $item->itemcode }}</td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

</section>
@endsection