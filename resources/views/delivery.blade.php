@extends('master')
@section('content')
<section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Delivery queue</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 300px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>No</th>
              <th>Coffee Type</th>
              <th>Weight</th>
              <th>Item Code</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          @foreach ($delivery as $item)
          <tbody>
            <tr>
              <td>{{ $item->id }}</td>
              <td>{{ $item->coffee_type }}</td>
              <td>{{ $item->weight }}</td>
              <td>{{ $item->itemcode }}</td>
              <td>
                <form action="/delivery/{{ $item->id }}" class="text-center" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/delivery/{{ $item->id }}/edit" class="btn btn-warning">Edit</a>
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>
            </td>
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