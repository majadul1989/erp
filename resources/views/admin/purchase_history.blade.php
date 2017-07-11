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
<form class="form-group form-margin-top">
  <div class="col-sm-4 padding">
    <input class="form-control" onkeyup="load()" ="" id="search" name="search" type="text" placeholder="Search...">
    <div style="display: none;" id="search_ul">
      
    </div>
  </div>

  <div class="col-sm-1 padding">   
    <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
  </div>

  <div class="col-md-7">
      <div class="col-sm-3 "> 
      <a href="{{url('/downloadExcel/xlsx')}}" class="btn btn-primary col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xlsx </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/downloadExcel/xls')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xls </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/downloadExcel/csv')}}" class="btn btn-success col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-3 padding"> 
      <a href="{{ route('pdfview', ['download'=>'pdf']) }}" class="btn btn-danger col-sm-11"><span class="glyphicon glyphicon-download-alt"></span> Download.pdf </a>
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
   <?php
    echo '<pre>';
    print_r($purchase_list); ?>
   

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
 var url = "{{url('/search')}}";
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
{!! $purchase_list->links() !!}


</div>
</div>
@endsection


