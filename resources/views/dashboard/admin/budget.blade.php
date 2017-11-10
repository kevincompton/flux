@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

  <div class="wrapper page_wrap dash_wrap">
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
            {{ $client->name }}'s Budget
        </h3>
        <div class="example-box-wrapper">
          <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Income</th>
                <th>Debt</th>
                <th>Mortgage</th>
                <th>Car</th>
                <th>Other</th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Income</th>
                <th>Debt</th>
                <th>Mortgage</th>
                <th>Car</th>
                <th>Other</th>
            </tr>
            </tfoot>

            <tbody>
              
              <tr>
                  <td>${{ $budget->income }}</td>
                  <td>${{ $budget->debt }}</td>
                  <td>${{ $budget->mortgage }}</td>
                  <td>${{ $budget->car }}</td>
                  <td>${{ $budget->other }}</td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection