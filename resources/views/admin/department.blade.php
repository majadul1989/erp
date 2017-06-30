@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.admin_sidebar')
        <div class="col-md-10 main-class">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="col-md-12 padding">
            <form class="form-horizontal" action="{{url('/DPT_insert')}}" id="contact_form" role="form" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
            <!-- Success message -->
           <h2>Add New Department</h2><hr>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Add Department</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                            <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}"  autofocus required>
                    </div>
                        @if ($errors->has('department')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('department') }}</strong>
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
            </form>
            </div>
<table class="table">
    <tr>
        <th>Sl. No</th>
        <th>Name of Deapartments</th>
        <th>Number of Employees</th>
        <th>Actions</th>
    </tr>

@foreach ($departmentes as $key => $department)
    <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{$department->department}}</td>
        <td>120</td>
       <td>
       <a href="{{url('/DPT_edit').'/'.$department->id}}">Edit</a>
       || <a onclick="return confirm('Are you sure you want to delete?')" href="">Delete</a></td>
    </tr>

@endforeach
</table>

{!! $departmentes->links() !!}

</div><!-- /.main-class -->


@endsection

<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>


