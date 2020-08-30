<!-- Order excel view -->

<table>
  <tbody>
    <!-- Customer details -->
    <tr>
      <td>Name</td>
      <td>{{ $customer["name"]}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{ $customer["email"] }}</td>
    </tr>
    <tr>
      <td>Phone number</td>
      <td>{{ $customer["phone_number"] }}</td>
    </tr>
    <tr><td></td><td></td></tr>

    <!-- Prooduct details -->
    <tr>
      <td>Insurer</td>
      <td>{{ $order["insurer"]["name"] }} {{ $order["insurer"]["email"] }}</td>
    </tr>
    <tr>
      <td>Premium</td>
      <td>{{ $order["premium"] }}</td>
    </tr>
    <tr>
      <td>Sum insured</td>
      <td>{{ $order["sum_insured"] }}</td>
    </tr>
    <tr>
      <td>IPF</td>
      <td>{{ $order["has_ipf"] ? "Yes" : "No" }}</td>
    </tr>
    <tr><td></td><td></td></tr>

    <!-- Payment details -->
    <tr>
      <td>Phone number</td>
      <td>{{ $payment->phone_number }}</td>
    </tr>
    <tr>
      <td>Mpesa code</td>
      <td>{{ $payment->mpesa_code }}</td>
    </tr>
    <tr>
      <td>Amount</td>
      <td>{{ $payment->amount }}</td>
    </tr>
    <tr>
      <td>Time</td>
      <td>{{ Carbon\Carbon::parse($payment->created_at)->format('l jS F Y, h:i:s A')}}</td>
    </tr>
    <tr><td></td><td></td></tr>
    
    <!-- Optional benefits -->
    <thead>
      
      <tr>
        <th>Optional benefits</th>
        <th>Limit</th>
        <th>Payable</th>
      </tr>
      @foreach ($order["optional_benefits"] as $item)
        <tr>
          <td>{{ $item["name"] }}</td>
          <td></td>
          <td></td>
        </tr>
      @endforeach
    </thead>
  </tbody>
</table>