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
            <form class="form-horizontal" action="{{url('/CMP_insert')}}" id="contact_form" role="form" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
            <!-- Success message -->
           <h2>Products Purchase</h2><hr>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('p_name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Company Name</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="p_name" type="text" placeholder="Name" class="form-control" name="p_name" value="{{ old('p_name') }}"  autofocus required>
                    </div>
                        @if ($errors->has('p_name')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('p_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text input-->
            
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
    </div><!-- /.main-class -->


@endsection

<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>


