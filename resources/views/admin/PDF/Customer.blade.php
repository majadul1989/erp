<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
<!-- font-Awesome -->
<link href="{{ asset('/css/fontAwasme/css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<style type="text/css">
.table tr:nth-child(even) {
    background-color: #eee;
    font-size: 11px;
    text-align: center;
}
.table tr:nth-child(odd) {
   background-color:#fff;
   font-size: 11px;
   text-align: center;
}

.table th {
	background-color:#5cb85c;
	text-align: center;
}

</style>

	<div class="container">



		<table class="table">
			<tr class="btn-success">
				<th style="width: 2%;" >No</th>
				<th>Name</th>
				<th>Contact No</th>
				<th>Email</th>
				<th>Area</th>
				<th>Address</th>
			</tr>
			@foreach ($items as $key => $item)
 			<tr class="tr">
 			<td style="width: 2%;">{{ ++$key }}</td>
			<td style="width: 15%;">{{ $item->customer_name }}</td>
			<td>{{ $item->customer_mobile }}</td>
			<td>{{ $item->customer_mail}}</td>
			<td>{{ $item->branch_name }}</td>
			<td style="width: 30%;">{{ $item->customer_address }}</td>
 			</tr>
			@endforeach
		</table>

	</div>