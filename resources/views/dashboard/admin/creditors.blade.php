@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

  <div class="wrapper page_wrap dash_wrap">
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
            All Creditors
        </h3>
        <div class="example-box-wrapper">
          <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>User</th>
                <th>Account #</th>
                <th>Phone</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>User</th>
                <th>Account #</th>
                <th>Phone</th>
            </tr>
            </tfoot>

            <tbody>
              
              @foreach($creditors as $creditor)

                  <tr>
                    <td>{{ $creditor->name }}</td>
                    <td>{{ $creditor->user->name }}</td>
                    <td>{{ $user->account }}</td>
                    <td>{{ $user->phone }}</td>
                  </tr>
                  
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection