<style>
  body {
    font-size: 16px;
  }
  td {
    padding: 8px;
  }
</style>
<table style="font-family: Helvetica;">
  <tr>
    <td style="background:black;color:white;">
      <h1>SECURED VISA APPLICATION</h1>
    </td>
    <td>
      Emp. ______________________________<br>
      <br>
      Branch ____________________________
    </td>
  </tr>
  <tr>
    <td>
      <h3>SSBA CREDIT DEPARTMENT</h3>
    </td>
  </tr>
  <tr>
    <td style="background:black;color:white;">
      <h2>1 - Tell Us About Yourself</h2>
      <h4>Important: Please Print Clearly</h4>
    </td>
    <td></td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Your Name: {{ $user->name }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Date of Birth (Month/Day/Year): {{ $user->dob }} Social Security Number: {{ $user->ssn }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Driver's License Number & State Issued: {{ $app->dl_no }}, {{ $app->dl_state }} Number of Dependents (Including Yourself): {{ $app->dependencies }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Home Address (No P.O Boxes): {{ $user->address }} Home Phone #: {{ $user->phone }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">City: {{ $user->city }} State: {{ $user->state }} Zip: {{ $user->zip }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Length of Time at Current Address (Years): {{ $app->years_at_address }}, @if($app->owner_status){{ $app->owner_status }}@endif Monthly Payment: {{ $user->budget->mortgage }}</td> 
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Previous Home Address (if current is less than 3 years): {{ $app->prev_address }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">City: {{ $app->prev_city }} State: {{ $app->prev_state }} Zip: {{ $app->prev_zip }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">E-Mail Address (see note to the right of this): {{ $user->email }} By providing an E-Mail Address, I consent to recieve e-mail communications about my account, including statements, documents, periodic offers and updates.</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Employer (If self-employed give name & type of business): {{ $app->employer_name }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Business Telephone Number: {{ $app->employer_phone }} Years There: {{ $app->employer_years }} Position: {{ $app->position }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Business Address (No P.O. Boxes): {{ $app->employer_address }} City: {{ $app->employer_city }} State: {{ $app->employer_state }} Zip: {{ $app->employer_zip }}</td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2">Annual Income: ${{ $user->budget->income }} Other Income (Amount & Source)*: $0</td>
  </tr>

  @if($cosigner)
    <tr>
      <td style="background:black;color:white;">
        <h2>2 - About Your Co-Applicant</h2>
      </td>
      <td></td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Your Name: {{ $cosigner->name }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Date of Birth (Month/Day/Year): {{ $cosigner->dob }} Social Security Number: {{ $cosigner->ssn }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Driver's License Number & State Issued: {{ $app->cosigner_dl_no }}, {{ $app->cosigner_dl_state }} Number of Dependents (Including Yourself): {{ $app->cosigner_dependencies }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Home Address (No P.O Boxes): {{ $cosigner->address }} Home Phone #: {{ $cosigner->phone }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">City: {{ $cosigner->city }} State: {{ $cosigner->state }} Zip: {{ $cosigner->zip }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Length of Time at Current Address (Years): {{ $app->cosigner_years_at_address }}, {{ $app->cosigner_owner_status }} Monthly Payment: {{ $app->cosigner_mortgage }}</td> 
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Previous Home Address (if current is less than 3 years): {{ $app->cosigner_prev_address }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">City: {{ $app->cosigner_prev_city }} State: {{ $app->cosigner_prev_state }} Zip: {{ $app->cosigner_prev_zip }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">E-Mail Address (see note to the right of this): {{ $cosigner->email }} <p>By providing an E-Mail Address, I consent to recieve e-mail communications about my account, including statements, documents, periodic offers and updates.</p></td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Employer (If self-employed give name & type of business): {{ $app->cosigner_employer_name }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Business Telephone Number: {{ $app->cosigner_employer_phone }} Years There: {{ $app->cosigner_employer_years }} Position: {{ $app->cosigner_position }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Business Address (No P.O. Boxes): {{ $app->cosigner_employer_address }} City: {{ $app->cosigner_employer_city }} State: {{ $app->cosigner_employer_state }} Zip: {{ $app->cosigner_employer_zip }}</td>
    </tr>
    <tr>
      <td style="white-space: nowrap;" colspan="2">Annual Income: ${{ $app->cosigner_income }} Other Income (Amount & Source)*: $0</td>
    </tr>
  @endif

  <tr>
    <td style="white-space: nowrap;" colspan="2"><br></td>
  </tr>
  <tr>
    <td>Applicant Signature:</td>
    <td></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td></td>
  </tr>
  <tr>
    <td style="white-space: nowrap;" colspan="2"><br></td>
  </tr>
  <tr>
    <td>Co-Applicant Signature:</td>
    <td></td>
  </tr>
  <tr>
    <td>Date:</td>
    <td></td>
  </tr>

</table>

























