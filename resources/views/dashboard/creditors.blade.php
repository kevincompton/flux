@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
  <section class="form_creditors">
        

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
          <h3>Add A Creditor</h3>

          <form role="form" class="creditor-form creditor" method="POST" action="/creditor/new" enctype="multipart/form-data">
              {{ csrf_field() }}
              <label>Creditor Type</label>
              <input class="type-toggle creditor" type="radio" name="type" value="creditor" checked> Creditor<br>
              <input class="type-toggle consolidation" type="radio" name="type" value="consolidation"> Consolidation

              <div class="creditor-tab">
                <h2>Creditor Information</h2>
              </div>

              <div class="consolidation-tab" style="display: none;">
                <h2>Consolidation</h2>
                <p>You may include your rent/mortgage, car payment or other fixed monthly expenses for one convenient monthly payment with no additional fee.</p>
              </div>

              <input name="name" type="text" placeholder="Creditor Name">
              <input name="account" type="text" placeholder="Account #">
              <input class="input-phone" name="phone" type="text" placeholder="Creditor / Agency Phone">

              <small class="italic">*You are agreeing to cease all activity in relation to this account which allows Flux Credit to settle the account for less. If you are contacted by this creditor, please refer them to our office by providing our phone number.</small>

              <label for="file">Upload Files (you may choose multiple)</label>
              <small>*Feel free to upload your bills, collector notifications, credit report, etc.</small>
              <input type="file" id="file" name="file[]" multiple>

              <div class="actions">
                <button type="submit">Add Creditor</button>
              </div>
          </form>
        </fieldset>

      </section>
@endsection