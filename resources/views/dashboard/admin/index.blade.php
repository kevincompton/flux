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
            </tr>
            </thead>

            <tfoot>
            <tr>
                <th>Name</th>
                <th>Email</th>
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
            </tr>
            </tfoot>

            <tbody>
              
              @foreach($users as $user)
                @if($user->admin == 0)

                  <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->city }}</td>
                    <td>{{ $user->state }}</td>
                    <td>{{ $user->zip }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->dob }}</td>
                    <td>{{ $user->ssn }}</td>
                    <td>{{ $user->plan }}</td>
                    <td>
                      @if($user->onboard_step < 4)
                        {{ $user->onboard_step + 1 }}
                      @else
                        completed
                      @endif
                    </td>
                    <td>
                      @if($user->budget)
                        <a href="#">View</a>
                      @else
                        Not Completed
                      @endif
                    </td>
                    <td>
                      @if($user->cosigner)
                        <a href="#">View</a>
                      @else
                        None
                      @endif
                    </td>
                    <td>
                      @if(count($user->creditors) > 0)
                        <a href="#">View</a>
                      @else
                        None
                      @endif
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