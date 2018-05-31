@extends('admin.admin-app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Page Panel
      <small>- Pages </small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">    
   <div class="row">


    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Page list</h3>
          @include('admin.partials.error_section')              
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="data_table_apply display" width="100%" data-page-length="10" class="table table-dark">
            <thead>
              <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($withdraws as $key => $value)
              <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $value->amount }}</td>
                <td>{{ $value->created_at }}</td>
                <td>{{ $value->status }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection