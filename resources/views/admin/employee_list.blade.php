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
       <th>Branch Name</th>
       <th>Branch Phone</th>
       <th>Branch E-mail</th>
       <th>Branch Adress</th>
       <th>Created by</th>
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
    var pursech = data.pursech; // Get date from database
    // condition ? expr1 : expr2 
    if (pursech == 1) {
    // $('#pursech').attr( " " ," " );
    $('#pursech').attr( "checked" ,"checked" );
    }else{
    $('#pursech').attr('checked', false);
    } //pursech

    var sales = data.sales; // Get date from database
    if (sales == 1) {
    $('#sales').attr( "checked" ,"checked" );
    }else{
    $('#sales').attr('checked', false);
    } //sales

    var return2 = data.return; // Get date from database
    if (return2 == 1) {
    $('#return2').attr( "checked" ,"checked" );
    }else{
    $('#return2').attr('checked', false);
    }  //return2

    var sales_history = data.sales_history; // Get date from database
    if (sales_history == 1) {
    $('#sales_history').attr( "checked" ,"checked" );
    }else{
    $('#sales_history').attr('checked', false);
    } //sales_history

    var accounts = data.accounts; // Get date from database
    if (accounts == 1) {
    $('#accounts').attr( "checked" ,"checked" );
    }else{
    $('#accounts').attr('checked', false);
    } //accounts

    var employee = data.employee; // Get date from database
    if (employee == 1) {
    $('#employee').attr( "checked" ,"checked" );
    }else{
    $('#employee').attr('checked', false);
    } //employee

    var all_branch = data.all_branch; // Get date from database
    if (all_branch == 1) {
    $('#all_branch').attr( "checked" ,"checked" );
    }else{
    $('#all_branch').attr('checked', false);
    }  //all_branch

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


