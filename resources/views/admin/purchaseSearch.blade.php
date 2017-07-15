@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.admin_sidebar')
        <div class="col-md-10">
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @include('admin.edit.purchase_edit')
<form class="form-group form-margin-top" action="{{url('/purchaseSearch')}}">
  <div class="col-sm-2 padding">
    <select name="company_ps_id" class="form-control selectpicker" data-live-search="true">
      <option value="" >Please select your purchase company</option>
      @foreach ($select as $key => $p_data)
      <option value="{{$p_data->product_id}}">{{$p_data->product_brand}}</option>
      @endforeach
    </select>
  </div>
  <div class="col-sm-2 padding left-padding">
    <div class="form-group">
      <div class='input-group date' id='datetimepicker1'>
        <input type='text' name="date" id="date" class="form-control" />
        <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
    </div>
  </div>
  <div class="col-sm-2 padding left-padding">
    <div class="form-group">
      <div class='input-group date' id='datetimepicker2'>
        <input type='text' name="date2" id="date2" class="form-control" />
        <span class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
    </div>
  </div>
  <div class="col-sm-1 padding left-padding">   
    <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
  </div>
</form>

  <div class="col-md-4">
      <div class="col-sm-6"> 
      <a href="{{url('/downloadExcel/csv')}}" class="btn btn-success col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-6 padding"> 
      <a href="{{ route('pdfview', ['download'=>'pdf']) }}" class="btn btn-danger col-sm-11"><span class="glyphicon glyphicon-download-alt"></span> Download.pdf </a>
      </div> 
  </div> <!-- col-md-3 -->
<div class="clear" id="example" style="clear: both;"></div>
<table class="table form-margin-top">
   <tr class="bnt btn-success">
       <th>Sl. No.</th>
       <th>Brand</th>
       <th>Name</th>
       <th>Type</th>
       <th>Quantity</th>
       <th>P.Price</th>
       <th>S.Price</th>
       <th>Company</th>
       <th>Created by</th>
       <th>P.Date</th>
       <th>Actions</th>
   </tr>
   @foreach($purchase_search as $key => $purchase)
   <tr>
   <td>{{$loop->index+1}}</td>
   <td>{{$purchase->product_brand}}</td>
   <td>{{$purchase->product_name}}</td>
   <td>{{$purchase->product_type}} - {{$purchase->per_field}}</td>
   <td>{{$purchase->product_quantity}}</td>
   <td>{{$purchase->product_p_price}}</td>
   <td>{{$purchase->product_sale_price}}</td>
   <td>{{$purchase->company_name}}</td>
   <td>{{$purchase->name}}</td>
   <td>{{$purchase->product_date}}</td>
   <td>
       <a onclick="users({{$purchase->product_id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
       || <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/EmpDelete/').'/'.$purchase->product_id}}">Delete</a></td>
   </tr>
   @endforeach
</table>
<img style="display: none;" class="loadimg" src="{{ asset('/img/load.gif') }}">

<script type="text/javascript">
window.urls=0;
function edit(edit_id){
    $(".loadimg").show();
  var edit_id = 'edit_id='+edit_id;
  var url = "{{url('/edit')}}";
  $.ajax({
    type: "GET",
    url: url,
    data: edit_id,
    success:function(data){
    $(".loadimg").fadeOut();
    if(window.urls==0){
       window.urls=$("#branch_id").attr("action");
    }
    $("#branch_id").attr("action",window.urls+"/"+data.branch_id);
    $("#branch_id").val(data.branch_id);
    $("#branch_name").val(data.branch_name);
    $("#branch_email").val(data.branch_email);
    $("#branch_phone").val(data.branch_phone);
    $("#branch_address").val(data.branch_address);
    $("#branch_city").val(data.branch_city);
    $("#branch_description").val(data.branch_description);
    $("#favoritesModalLabel").html('Information of <b><i>'+ data.branch_name+'</b></i>').show();
    console.log();

   
    }
  });
}

//live search functions
function load(){
 var search = $('#search').val();
 var url = "{{url('/purchaseSearch')}}";
 var search_val = 'search='+search;
 $(".col-md-10").on("click", function(){
     $("#search_ul").slideUp();
 });
  // alert(search_val);
  $.ajax({
    type: "GET",
    url: url,
    data:search_val,
    success:function(search){
        $("#search_ul").slideDown()
        $("#search_ul").html('');
        // $("#search_ul").html(search.product_brand);
        alert(search.product_id);
        $(".search_value").on("click", function(){
        var abc = $("#search").val(search.product_brand);
        alert(abc);
        });
        // alert(search.branch_name);

      // alert(search.branch_name);
      console.log();
    }
  });
}
// Date functions
$(document).ready(function(){
        $('#datetimepicker1').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
        });
        $('#datetimepicker2').datepicker({
          format: 'yyyy-mm-dd',
          todayHighlight: true,
          autoclose: true,
        });
 });

</script>
{!! $purchase_search->links() !!}


</div>
</div>
@endsection


