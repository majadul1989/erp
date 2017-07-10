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
    @include('admin.edit.company')
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
      <a href="{{url('/companyExcel/xlsx')}}" class="btn btn-primary col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xlsx </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/companyExcel/xls')}}" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.xls </a>
      </div>
      <div class="col-sm-3"> 
      <a href="{{url('/companyExcel/csv')}}" class="btn btn-success col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download.csv </a>
      </div>
      <div class="col-sm-3 padding"> 
      <a href="{{ route('companyPdfView', ['download'=>'pdf']) }}" class="btn btn-danger col-sm-11"><span class="glyphicon glyphicon-download-alt"></span> Download.pdf </a>
      </div> 
  </div> <!-- col-md-3 -->
</form>
<div class="clear" id="example" style="clear: both;"></div>
<table class="table form-margin-top">
   <tr class="bnt btn-success ">
       <th>Sl. No.</th>
       <th>Company Name</th>
       <th>Company Phone</th>
       <th>Company E-mail</th>
       <th>Company Adress</th>
       <th>Created by</th>
       <th>Create Date</th>
       <th>Action</th>
   </tr>
    @foreach ($companies_list as $key => $company)
      <tr>
          <td>{{$loop->index+1}}</td>
          <td>{{$company->company_name}}</td>
          <td>{{$company->company_mobile}}</td>
          <td>{{$company->company_mail}}</td>
          <td>{{$company->company_address}}</td>
          <td>{{$company->name}}</td>
          <td>{{$company->company_created}}</td>
          <td>
          <a onclick="edit({{$company->company_id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
          || <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/company_delete/').'/'.$company->company_id}}">Delete</a></td>
      </tr>
    @endforeach

</table>
<img style="display: none;" class="loadimg" src="{{ asset('/img/load.gif') }}">

<script type="text/javascript">
window.urls=0;
function edit(edit_id){
    $(".loadimg").show();
  var edit_id = 'edit_id='+edit_id;
  var url = "{{url('/company_edit')}}";
  $.ajax({
    type: "GET",
    url: url,
    data: edit_id,
    success:function(data){
    $(".loadimg").fadeOut();
    if(window.urls==0){
       window.urls=$("#company_id").attr("action");
    }
    $("#company_id").attr("action",window.urls+"/"+data.company_id);
    $("#company_id").val(data.company_id);
    $("#company_name").val(data.company_name);
    $("#company_mail").val(data.company_mail);
    $("#company_mobile").val(data.company_mobile);
    $("#company_address").val(data.company_address);
    $("#branch_description").val(data.branch_description);
    $("#favoritesModalLabel").html('Information of <b><i>'+ data.company_name+'</b></i>').show();
    console.log();

   
    }
  });
}

//live search functions
function load(){
 var search = $('#search').val();
 var url = "{{url('/CMP_search')}}";
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
{!! $companies_list->links() !!}


</div>
</div>
@endsection


