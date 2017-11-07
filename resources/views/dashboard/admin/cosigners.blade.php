@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

  <div class="wrapper page_wrap dash_wrap">
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
            All Co-Signers
        </h3>
        <div class="example-box-wrapper">
          <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>DOB</th>
                <th>SSN</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>User</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>DOB</th>
                <th>SSN</th>
            </tr>
            </tfoot>

            <tbody>
              
              @foreach($cosigners as $cosigner)

                  <tr>
                    <td>{{ $cosigner->name }}</td>
                    <td>{{ $cosigner->user->name }}</td>
                    <td>{{ $cosigner->email }}</td>
                    <td>{{ $cosigner->phone }}</td>
                    <td>{{ $cosigner->address }}</td>
                    <td>{{ $cosigner->city }}</td>
                    <td>{{ $cosigner->state }}</td>
                    <td>{{ $cosigner->zip }}</td>
                    <td>{{ $cosigner->dob }}</td>
                    <td>{{ $cosigner->ssn }}</td>
                  </tr>
                  
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection