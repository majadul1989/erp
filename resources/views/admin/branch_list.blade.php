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
    @include('admin.branch_edit')
<form class="form-group form-margin-top">
  <div class="col-sm-4 padding">
    <input class="form-control" id="disabledInput" name="search" type="text" placeholder="Search...">
  </div>

  <div class="col-sm-1 padding">   
    <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
  </div>

  <div class="col-md-7">
      <div class="col-sm-3 padding"> 
      <a href="{{url('/downloadExcel/xlsx')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xlsx </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/downloadExcel/xls')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xls </a>
      </div>
      <div class="col-sm-3 padding"> 
      <a href="{{url('/downloadExcel/csv')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/print')}}" class="btn btn-primary col-sm-11"> <span class="glyphicon glyphicon glyphicon-print"></span> Print</a>
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
   <?php $sl = 1; ?>
    @foreach ($branch_list as $key => $branch)
      <tr>
          <td>{{$sl++}}</td>
          <td>{{$branch->branch_name}}</td>
          <td>{{$branch->branch_email}}</td>
          <td>{{$branch->branch_phone}}</td>
          <td>{{$branch->branch_address}}</td>
          <td>{{$branch->name}}</td>
          <td>{{$branch->branch_create_date}}</td>
          <td>
          <a onclick="edit({{$branch->branch_id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
          || <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/delete/').'/'.$branch->branch_id}}">Delete</a></td>
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

// Print functions here


</script>


</div>
</div>
@endsection


