@section('body_class', 'body__dashboard')

@extends('layouts.dash')

@section('content')
  <div id="hs-container"></div>
@endsection

@section('footer')
 <script type="text/javascript" src="https://s3.amazonaws.com/cdn.hellosign.com/public/js/hellosign-embedded.LATEST.min.js"></script>
 <script type="text/javascript">
   HelloSign.init("{{ getenv('HELLOSIGN_CLIENT_KEY') }}");
   HelloSign.open({
     // Set the sign_url passed from the controller.
     url: "{{ $sign_url }}",
     allowCancel: false,
     redirectUrl: 'http://staging.fluxcredit.com/dashboard',
     height: 800,
     // Set the debug mode based on the test mode toggle.
     debug: {{ (getenv('HELLOSIGN_TEST_MODE') == 1 ? "true" : "false") }},
     // Point at the div we added in the content section.
     container: document.getElementById("hs-container"),
     // Define a callback for processing events.
     messageListener: function(e) {
       if (e.event == 'signature_request_signed') {
         window.location.replace("http://staging.fluxcredit.com/dashboard");
       }
     }
   });
 </script>
@endsection