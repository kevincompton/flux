@extends('layouts.client')

@section('content')
  <div class="wrapper page_wrap">

    <form id="payment_form" class="small" method="POST">
      {{ csrf_field() }}
      <h1>Make A Payment</h1>

      <label>Payment Type</label>
      <input type="radio" name="payment" value="settlement"> Settlement<br>
      <input type="radio" name="payment" value="other"> Other
      <label>Amount in Dollars</label>
      <input type="text" name="amount" id="amount" placeholder="Amount in Dollars">
      <label>Total Amount</label>
      <input type="text" name="total_amount" id="total_amount" value="0" disabled>
      <div class="actions">
        <button type="submit">Submit</button>
      </div>
    </form>

    <div id="green_modal"><button id="green_cancel">Cancel</button><iframe id="green_iframe"></iframe></div>

    <form id="green_form" action="https://greenbyphone.com/eCheck/eCheck.aspx">
      <input type='hidden' name='GreenButton_id' value='10284' />
      <input type='hidden' id='Amount' name='Amount' value='0.00' />
      <input type='hidden' name='ItemName' id='ItemName' value='Make A Payment' />
      <input type='hidden' name='TransactionID' id='TransactionID' value='' />
      <button id="green_submit" type="submit">Submit</button>
    </form>
  </div>
@endsection