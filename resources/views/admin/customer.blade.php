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
            <form class="form-horizontal" action="{{url('/CTR_insert')}}" id="contact_form" role="form" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
            <!-- Success message -->
           <h2>Customer Informations</h2><hr>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Customer Name</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="customer_name" type="text" placeholder="Name" class="form-control" name="customer_name" value="{{ old('customer_name') }}"  autofocus required>
                    </div>
                        @if ($errors->has('customer_name')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('customer_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group{{ $errors->has('customer_mobile') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Customer Mobile</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                            <input id="customer_mobile" type="text" placeholder="Mobile" class="form-control" name="customer_mobile" value="{{ old('customer_mobile') }}"  autofocus required>
                    </div>
                        @if ($errors->has('customer_mobile')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('customer_mobile') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text input-->
            <div class="form-group{{ $errors->has('customer_mail') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Customer Email</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input id="customer_mail" placeholder="E-mail" type="text" class="form-control" name="customer_mail" value="{{ old('customer_mail') }}"  autofocus required>
                    </div>
                        @if ($errors->has('customer_mail')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('customer_mail') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Text area -->
            <div class="form-group {{ $errors->has('customer_address') ? ' has-error' : '' }}">
              <label class="col-md-3 control-label">Customer Address</label>
                <div class="col-md-7 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                        <textarea class="form-control" name="customer_address" placeholder="Address">{{ old('customer_address') }}</textarea>
              </div>
              @if ($errors->has('customer_address')) <!-- show error --> 
                  <span class="help-block red">
                      <strong>{{ $errors->first('customer_address') }}</strong>
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


