@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')

  <div class="wrapper page_wrap dash_wrap">
    <div class="panel">
      <div class="panel-body">
        <h3 class="title-hero">
            All Users
        </h3>
        <div class="example-box-wrapper">
          <table id="datatable-tabletools" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Onboard Date</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>SSN</th>
                <th>Plan</th>
                <th>Onboard Step</th>
                <th>Budget</th>
                <th>Co-Signer</th>
                <th>Creditors</th>
                <th>POA Status</th>
                <th></th>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Onboard Date</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Phone</th>
                <th>DOB</th>
                <th>SSN</th>
                <th>Plan</th>
                <th>Onboard Step</th>
                <th>Budget</th>
                <th>Co-Signer</th>
                <th>Creditors</th>
                <th>POA Status</th>
                <th></th>
            </tr>
            </tfoot>

            <tbody>
              
              @foreach($customers as $customer)
                @if($customer->admin == 0)

                  <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->created_at }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->state }}</td>
                    <td>{{ $customer->zip }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->dob }}</td>
                    <td>{{ $customer->ssn }}</td>
                    <td>{{ $customer->plan }}</td>
                    <td>
                      @if($customer->onboard_step < 4)
                        {{ $customer->onboard_step + 1 }}
                      @else
                        completed
                      @endif
                    </td>
                    <td>
                      @if($customer->budget)
                        <a href="/dashboard/admin/budget/{{ $customer->budget->id }}">View</a>
                      @else
                        Not Completed
                      @endif
                    </td>
                    <td>
                      @if($customer->cosigner)
                        <a href="#">View</a>
                      @else
                        None
                      @endif
                    </td>
                    <td>
                      @if(count($customer->creditors) > 0)
                        <a href="#">View</a>
                      @else
                        None
                      @endif
                    </td>
                    <td>
                      @if($user->poa_status == false)
                        Incomplete <a class="btn btn-default" href="#">Mark Completed</a>
                      @else
                        Completed <a class="btn btn-default" href="#">Mark Incomplete</a>
                      @endif
                    </td>
                    <td>
                      <a class="btn btn-danger" href="#">Delete</a>
                    </td>
                  </tr>

                @endif
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection