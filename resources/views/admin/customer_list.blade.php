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
    @include('admin.edit.branch_edit')
<form class="form-group form-margin-top">
  <div class="col-sm-4 padding">
    <input class="form-control" onkeyup="load()" id="search" name="search" type="text" placeholder="Search...">
    <div style="display: none;" id="search_ul">
      
    </div>
  </div>

  <div class="col-sm-1 padding">   
    <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
  </div>

  <div class="col-md-7">
      <div class="col-sm-3 "> 
      <a href="{{url('/customerExcel/xlsx')}}" class="btn btn-primary col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xlsx </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/customerExcel/xls')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xls </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/customerExcel/csv')}}" class="btn btn-success col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-3 padding"> 
      <a href="{{ route('customerPdfView', ['download'=>'pdf']) }}" class="btn btn-danger col-sm-11"><span class="glyphicon glyphicon-download-alt"></span> Download.pdf </a>
      </div> 
  </div> <!-- col-md-3 -->
</form>
<div class="clear" id="example" style="clear: both;"></div>
<table class="table form-margin-top">
   <tr class="bnt btn-success ">
       <th>Sl. No.</th>
       <th>Customer Name</th>
       <th>Customer Phone</th>
       <th>Customer E-mail</th>
       <th>Customer Adress</th>
       <th>Created by</th>
       <th>Create Date</th>
       <th>Action</th>
   </tr>
    @foreach ($customer_list as $key => $customers)
      <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$customers->customer_name}}</td>
          <td>{{$customers->customer_mobile}}</td>
          <td>{{$customers->customer_mail}}</td>
          <td>{{$customers->branch_name}}</td>
          <td>{{$customers->name}}</td>
          <td>{{$customers->created}}</td>
          <td>
          <a onclick="edit({{$customers->customer_id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
          || <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/delete/').'/'.$customers->customer_id}}">Delete</a></td>
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
 var url = "{{url('/CST_search')}}";
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
        $("#search_ul").html(search);
        // alert(search.branch_name);

      // alert(search.branch_name);
      console.log();
    }
  });
}

</script>
{!! $customer_list->links() !!}


</div>
</div>
@endsection


