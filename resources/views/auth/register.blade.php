@extends('layouts.client')

@section('content')
<div class="wrapper page_wrap">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <h1>Refine the Past – Reinvent Your Future</h1>

                        <p>Your Fresh Start To Financial Freedom begins here! Please complete the form below to enroll in our program. Clients who successfully complete the Flux Credit program will become debt free, be awarded a Flux Visa Secured Credit Card with a limit of up to $1,500 and walk away with a savings account of up to $1,875!</p> 

                        <ul class="features">
                            <li>
                              <i class="fa fa-clock-o" aria-hidden="true"></i>
                              <h3><a href="#">24hr Service</a></h3>
                              <p>if you have any questions please contact us via phone, chat or email</p>
                            </li>
                            <li>
                              <i class="fa fa-lock" aria-hidden="true"></i>
                              <h3><a href="#">Security</a></h3>
                              <p>We never run your credit or require personal banking information</p>
                            </li>
                            <li>
                                <i class="fa fa-shield" aria-hidden="true"></i>
                                <h3><a href="#">Privacy</a></h3>
                                <p>We respect your privacy and will not sell or share your information</p>
                            </li>
                        </ul>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" placeholder="Name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Phone</label>
                            <input name="phone" type="text" placeholder="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Address</label>
                            <input name="address" type="text" placeholder="address" required>
                        </div>

                        <div class="form-group small">
                            <label for="password-confirm" class="col-md-4 control-label">City</label>
                            <input name="city" type="text" placeholder="city" required>
                        </div>

                        <div class="form-group small">
                            <label for="password-confirm" class="col-md-4 control-label">State</label>
                            <input name="state" type="text" placeholder="state" required>
                        </div>

                        <div class="form-group small">
                            <label for="password-confirm" class="col-md-4 control-label">Zip</label>
                            <input name="zip" type="text" placeholder="zip" required>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
