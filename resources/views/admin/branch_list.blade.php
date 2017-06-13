@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.admin_sidebar')
    @include('admin.branch_edit')
        <div class="col-md-10">
               <form class="form-group form-margin-top">
                    <div class="col-sm-8 padding">
                        <input class="form-control" id="disabledInput" name="search" type="text" placeholder="Search...">
                    </div> 
                    <div class="col-sm-1 padding">   
                 <button type="submit" class="btn btn-default col-sm-12"><span class="glyphicon glyphicon-search"></span> Search</button>
                 </div>
                 <div class="col-md-3">
                 <div class="col-sm-6 padding"> 
                 <button type="submit" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download </button>
                 </div>
                 
                 <div class="col-sm-6"> 
                 <button type="submit" class="btn btn-primary col-sm-11"> <span class="glyphicon glyphicon glyphicon-print"></span> Print</button>
                 </div> 
                 </div> <!-- col-md-3 -->
               </form>
                <div class="clear" style="clear: both;"></div>
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
                          <td>{{$branch->created_at}}</td>
                          <td>
                          <a onclick="edit({{$branch->branch_id}})" data-toggle="modal" data-target="#favoritesModal" href="#">Edit</a>
                          || <a href="#">Delete</a></td>
                      </tr>
                    @endforeach
               </table>


<script type="text/javascript">
function edit(id){
  alert(id);
}
  $(function() {
      $('#favoritesModal').on("show.bs.modal", function (e) {
      });
  });
</script>






















</div>

</div>
</div>
@endsection