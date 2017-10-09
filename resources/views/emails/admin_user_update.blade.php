<h1>User Update</h1>

{{ $request['name'] }} has just {{ $request['action'] }}.

<?php 
  
  foreach($request['update'] as $child) {
   echo $child . "\n";
  }

?>