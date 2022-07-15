<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}

.w-5 {
    display : none;
}
</style>

<center>

<h1>Billing report</h1>
Total accounts: {{$Bills['total']}} <br>
Paid: {{number_format(($Bills['actives']/$Bills['total'])*100,2)}}%<br>
Inactive: {{number_format(($Bills['inactives']/$Bills['total'])*100,2)}}%<br>
Banned: {{number_format(($Bills['bans']/$Bills['total'])*100,2)}}%<br>
<br>
</center>


<table width=100% border=1 collapse>
    <th>Username</th>
    <th>Billing status</th>
    <th>Operation</th>

    @foreach($Accounts as $account)
    <tr>
        <td>{{$account->username}}</td> <!-- Will use customer username from accounts table-->
        <td>{{$account->status}}</td>
        <td><a href="{{route('Subadmin.Customer.Change',['id'=>$account->id])}}"><button>Change Status</button></a></td>
    </tr>
    @endforeach()

    
</table>

{{$Accounts->links()}}

