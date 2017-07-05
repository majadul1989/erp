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
    @include('admin.edit.UserEdit') {{-- Here Include popup function file --}}
<form class="form-group form-margin-top">
  <div class="col-sm-4 padding">
    <input class="form-control" onkeyup="load()" ="" id="userSearch" name="userSearch" type="text" placeholder="Search...">
    <div style="display: none;" id="search_ul">
      
    </div>
  </div>

  <div class="col-sm-1 padding">   
    <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
  </div>

  <div class="col-md-7">
      <div class="col-sm-3 "> 
      <a href="{{url('/userExcel/xlsx')}}" class="btn btn-primary col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xlsx </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/userExcel/xls')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xls </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/userExcel/csv')}}" class="btn btn-success col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-3 padding"> 
      <a href="{{ route('UserPdfView', ['download'=>'pdf']) }}" class="btn btn-danger col-sm-11"><span class="glyphicon glyphicon-download-alt"></span> Download.pdf </a>
      </div> 
  </div> <!-- col-md-3 -->
</form>
<div class="clear" id="example" style="clear: both;"></div>
<table class="table form-margin-top">
   <tr class="bnt btn-success ">
       <th>Sl. No.</th>
       <th>User Name</th>
       <th>User E-mail</th>
       <th>User Phone</th>
       <th>User Adress</th>
       <th>User Branch</th>
       <th>Create Date</th>
       <th>Action</th>
   </tr>
    @foreach ($data['show_users'] as $key => $show_user)
      <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$show_user->name}}</td>
          <td>{{$show_user->email}}</td>
          <td>{{$show_user->phone}}</td>
          <td>{{$show_user->address}}</td>
          <td>{{$show_user->branch_name}}</td>
          <td>{{$show_user->created_at}}</td>
          <td>
          <a onclick="users({{$show_user->id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
          || <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/EmpDelete/').'/'.$show_user->id}}">Delete</a></td>
      </tr>
    @endforeach

</table>
<img style="display: none;" class="loadimg" src="{{ asset('/img/load.gif') }}">

<script type="text/javascript">
window.urls=0;
function users(edit_id){
    $(".loadimg").show();
  var edit_id = 'edit_id='+edit_id;
  var url = "{{url('/UserEdit')}}";
  $.ajax({
    type: "GET",
    url: url,
    data: edit_id,
    success:function(data){
    $(".loadimg").fadeOut();
    if(window.urls==0){
       window.urls=$("#branch_id").attr("action");
    }
    $("#branch_id").attr("action",window.urls+"/"+data.id);
    $("#branch_id").val(data.id);
    $("#branch_name").val(data.name);
    $("#branch_email").val(data.email);
    $("#branch_phone").val(data.phone);
    $("#branch_address").val(data.address);
    $("#valdfhue").html(data.branch_name);
    $("#valdfhue").val(data.branch_id);
    // Get date from database
    var pursech = data.pursech; 
    //Check condition checked or not..
    pursech == 1 ? $('#pursech').attr( "checked" ,"checked" ):$('#pursech').attr('checked', false);
    // Get date from database
    var sales = data.sales;
    //Check condition checked or not..
    sales == 1 ? $('#sales').attr( "checked" ,"checked" ):$('#sales').attr('checked', false);
    // Get date from database
    var return2 = data.return;
    //Check condition checked or not..
    return2 == 1 ? $('#return2').attr( "checked" ,"checked" ):$('#return2').attr('checked', false);
    // Get date from database
    var sales_history = data.sales_history;
    //Check condition checked or not..
    sales_history == 1 ? $('#sales_history').attr( "checked" ,"checked" ):$('#sales_history').attr('checked', false);
    // Get date from database
    var accounts = data.accounts;
    //Check condition checked or not..
    accounts == 1 ? $('#accounts').attr( "checked" ,"checked" ):$('#accounts').attr('checked', false);
    // Get date from database
    var employee = data.employee;
    //Check condition checked or not..
    employee == 1 ? $('#employee').attr( "checked" ,"checked" ):$('#employee').attr('checked', false);
    // Get date from database
    var all_branch = data.all_branch;
    //Check condition checked or not..
    all_branch == 1 ? $('#all_branch').attr( "checked" ,"checked" ):$('#all_branch').attr('checked', false);
    $("#favoritesModalLabel").html('Information of <b><i>'+ data.name+'</b></i>').show();
    console.log(data);
    }
  });
}

//live search functions
function load(){
 var userSearch = $('#userSearch').val();
 var url = "{{url('/userSearch')}}";
 var search_val = 'userSearch='+userSearch;
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
{!! $data['show_users']->links() !!}


</div>
</div>
@endsection


