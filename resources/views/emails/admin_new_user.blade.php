<h1>New User Registration</h1>
<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Zip</th>
  </tr>
  <tr>
    <td>{{ $request['name'] }}</td>
    <td>{{ $request['email'] }}</td>
    <td>{{ $request['phone'] }}</td>
    <td>{{ $request['address'] }}</td>
    <td>{{ $request['city'] }}</td>
    <td>{{ $request['state'] }}</td>
    <td>{{ $request['zip'] }}</td>
  </tr>
</table>