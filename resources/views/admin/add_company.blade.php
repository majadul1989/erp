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
           <h2>Company Informations</h2><hr>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Company Name</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="company_name" type="text" placeholder="Name" class="form-control" name="company_name" value="{{ old('company_name') }}"  autofocus required>
                    </div>
                        @if ($errors->has('company_name')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group{{ $errors->has('company_mobile') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Company Mobile</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input id="company_mobile" type="text" placeholder="Mobile" class="form-control" name="company_mobile" value="{{ old('company_mobile') }}"  autofocus required>
                    </div>
                        @if ($errors->has('company_mobile')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('company_mobile') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group{{ $errors->has('company_mail') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Company Email</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="company_mail" placeholder="E-mail" type="text" class="form-control" name="company_mail" value="{{ old('company_mail') }}"  autofocus required>
                    </div>
                        @if ($errors->has('company_mail')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('company_mail') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text area -->
            <div class="form-group {{ $errors->has('company_address') ? ' has-error' : '' }}">
              <label class="col-md-3 control-label">Company Address</label>
                <div class="col-md-7 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <textarea class="form-control" name="company_address" placeholder="Address">{{ old('company_address') }}</textarea>
              </div>
              @if ($errors->has('company_address')) <!-- show error --> 
                  <span class="help-block red">
                      <strong>{{ $errors->first('company_address') }}</strong>
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
    </div><!-- /.main-class -->


@endsection

<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>


