<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>

<center>

<h1>Billing report</h1>
Total accounts: {{$Bills['total']}} <br>
Paid: {{number_format(($Bills['actives']/$Bills['total'])*100,2)}}%<br>
Inactive: {{number_format(($Bills['inactives']/$Bills['total'])*100,2)}}%<br>
Banned: {{number_format(($Bills['bans']/$Bills['total'])*100,2)}}%<br>

</center>


<table width=100% border=1 collapse>
    <th>Username</th>
    <th>Billing status</th>

    @foreach($Customers as $customer)
    <tr>
        <td>{{$customer->c_id}}</td> <!-- Will use customer username from accounts table-->
        <td>{{$customer->status}}</td>
    </tr>
    @endforeach()
</table>