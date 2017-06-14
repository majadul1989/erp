@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.admin_sidebar')
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
<!-- BOOTSTRAP MODEL -->
 <div class="modal fade" id="favoritesModal" 
      tabindex="-1" role="dialog" 
      aria-labelledby="favoritesModalLabel">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" 
           data-dismiss="modal" 
           aria-label="Close">
           <span aria-hidden="true">&times;</span></button>
         <h4 class="modal-title" 
         id="favoritesModalLabel" class="branch_info">The Sun Also Rises</h4>
       </div>
       <div class="modal-body">

        <form class="form-horizontal" action="{{url('/insert')}}" id="contact_form" role="form" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <fieldset>
        <!-- Success message -->
       <h2>New Branch Descriptions</h2><hr>

        <!-- Text input-->
        <div class="form-group{{ $errors->has('branch_name') ? ' has-error' : '' }}">
                <label class="col-md-3 control-label">Branch Name</label>
            <div class="col-md-7 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <input id="branch_name" type="text" class="form-control" name="branch_name" value="{{ old('branch_name') }}"  autofocus required>
                </div>
                    @if ($errors->has('branch_name')) <!-- show error --> 
                        <span class="help-block red">
                            <strong>{{ $errors->first('branch_name') }}</strong>
                        </span>
                    @endif
            </div>
        </div>


        <!-- Text input-->
        <div class="form-group {{ $errors->has('branch_email') ? ' has-error' : '' }}">
              <label class="col-md-3 control-label">Branch E-Mail</label>  
            <div class="col-md-7 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input name="branch_email" placeholder="E-Mail Address" class="form-control" value="{{ old('branch_email') }}" type="text" autofocus required>
                </div>
                @if ($errors->has('branch_email')) <!-- show error --> 
                    <span class="help-block red">
                        <strong>{{ $errors->first('branch_email') }}</strong>
                    </span>
                @endif
            </div>
        </div>


        <!-- Text input-->
               
        <div class="form-group {{ $errors->has('branch_phone') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Branch Phone #</label>  
            <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
          <input name="branch_phone" placeholder="01xxxxxxxxx" class="form-control" type="text" autofocus required value="{{ old('branch_phone') }}">
            </div>
            @if ($errors->has('branch_phone')) <!-- show error --> 
                <span class="help-block red">
                    <strong>{{ $errors->first('branch_phone') }}</strong>
                </span>
            @endif
          </div>
        </div>

       
        <!-- Text area -->
          
        <div class="form-group {{ $errors->has('branch_address') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Address</label>
            <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                <textarea class="form-control" name="branch_address"  placeholder="Project Description" autofocus required> {{ old('branch_address') }}</textarea>
          </div>
          @if ($errors->has('branch_address')) <!-- show error --> 
              <span class="help-block red">
                  <strong>{{ $errors->first('branch_address') }}</strong>
              </span>
          @endif
          </div>
        </div> 

        <!-- Text input-->
         
        <div class="form-group {{ $errors->has('branch_city') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Branch City</label>  
            <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
          <input name="branch_city" value="{{ old('branch_city') }}" placeholder="branch_city" class="form-control"  type="text" autofocus required>
            </div>
            @if ($errors->has('branch_city')) <!-- show error --> 
                <span class="help-block red">
                    <strong>{{ $errors->first('branch_city') }}</strong>
                </span>
            @endif
          </div>
        </div>


        <!-- Text area -->
          
        <div class="form-group {{ $errors->has('branch_description') ? ' has-error' : '' }}">
          <label class="col-md-3 control-label">Project Description</label>
            <div class="col-md-7 inputGroupContainer">
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                    <textarea class="form-control" name="branch_description" placeholder="Project Description">{{ old('branch_description') }}</textarea>
          </div>
          @if ($errors->has('branch_description')) <!-- show error --> 
              <span class="help-block red">
                  <strong>{{ $errors->first('branch_description') }}</strong>
              </span>
          @endif
          </div>
        </div>
        <hr>
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-3">
            <button type="submit" class="btn btn-primary col-md-4" >Send <span class="glyphicon glyphicon-send"></span></button>
            <label class="col-md-1 control-label"></label>
            <button type="reset" class="btn btn-danger col-md-4" >Cancel  <span class="glyphicon glyphicon-remove"></span></button>
          </div>
          </div>
        </fieldset>

       </div> <!-- modal-body -->
       <div class="modal-footer">
         <span class="pull-right">
           <button data-dismiss="modal" type="submit" class="btn btn-primary">
             Update Info
           </button>
         </span>
         </form>
       </div>
     </div>
   </div>
 </div>

<!-- BOOTSTRAP MODEL -->

               </table>
<img style="display: none;" class="loadimg"src="{{ asset('/img/load.gif') }}">

<script type="text/javascript">
function edit(edit_id){
    $(".loadimg").show();
  var edit_id = 'edit_id='+edit_id;
  var url = "{{url('/edit')}}";
  $.ajax({
    type: "GET",
    url: url,
    data: edit_id,
    success:function(data){
    // alert(data);
    $("#branch_name").val(data.branch_name);
    $("#favoritesModalLabel").html('Information of <b><i>'+ data.branch_name+'</b></i>').show();

    $(".loadimg").fadeOut(0);
    }
  });
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


