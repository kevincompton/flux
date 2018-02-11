@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
  <div class="panel">
          <div class="panel-body">
              <h3 class="title-hero">
                  Add a Creditor or Consolidation
              </h3>
            <div class="example-box-wrapper">
        

        @if(count($creditors) > 0)
          <h3>Your Creditors</h3>

          <table>
            <tbody>
             <tr>
               <th>Name</th>
               <th>Phone</th>
               <th>Account #</th>
             </tr> 
              @foreach($creditors as $creditor)
                  <tr>
                    <td>{{ $creditor->name }}</td>
                    <td>{{ $creditor->phone }}</td>
                    <td>{{ $creditor->account }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        @endif

        <fieldset>

          <form role="form" class="form-horizontal bordered-row" method="POST" action="/creditor/new" enctype="multipart/form-data">
              {{ csrf_field() }}

              <div class="form-group">
                <label for="name" class="col-md-4 control-label">Creditor Name</label>
                <div class="col-md-6">
                  <input class="form-control" name="name" type="text" placeholder="Creditor Name" required>
                </div>
              </div>

              <div class="form-group">
                <label for="account" class="col-md-4 control-label">Account #</label>
                <div class="col-md-6">
                  <input name="account" type="text" class="form-control" placeholder="Account #" required>
                </div>
              </div>

              <div class="form-group">
                <label for="phone" class="col-md-4 control-label">Creditor / Agency Phone</label>
                <div class="col-md-6">
                  <input id="phone" type="text" pattern=".{10,15}" name="phone" class="input-mask form-control" data-inputmask="&apos;mask&apos;:&apos;(999) 999-9999&apos;" required>
                </div>
              </div>

              <div class="form-group copy">
                <small class="italic">*You are agreeing to cease all activity in relation to this account which allows Flux Credit to settle the account for less. If you are contacted by this creditor, please refer them to our office by providing our phone number.</small>

                <label for="file">Upload Files (you may choose multiple)</label>
                <small>*Feel free to upload your bills, collector notifications, credit report, etc.</small>
                <input type="file" id="file" name="file[]" multiple>
              </div>

              <div class="form-group text-right">
                <button class="btn btn-lg btn-primary" type="submit">Add Creditor</button>
              </div>
          </form>
        </fieldset>

      </div>
    </div>
@endsection