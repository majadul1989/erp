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
            <form class="form-horizontal" action="{{url('/insert')}}" id="contact_form" role="form" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
            <!-- Success message -->
           <h2>New Employee Descriptions</h2><hr>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('branch_name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Employee Name</label>
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
                  <label class="col-md-3 control-label">Employee E-Mail</label>  
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
              <label class="col-md-3 control-label">Employee Phone #</label>  
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
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <select name="state" class="form-control selectpicker" data-live-search="true">
                    <option value=" " >Please select your Branch</option>
                    <option>Alabama</option>
                    <option>Alabama2</option>
                    <option>Alabama3</option>
                    <option>Alabama4</option>
                    <option>Alabama5</option>
                    <option>Alabama6</option>
                    <option>Alabama7</option>
                    <option>Alabama8</option>
                    <option>Alabama9</option>
                    </select>
                </div>
                @if ($errors->has('branch_city')) <!-- show error --> 
                    <span class="help-block red">
                        <strong>{{ $errors->first('branch_city') }}</strong>
                    </span>
                @endif
              </div>
            </div>


            <!-- Text area -->
              
            <div class="form-group">
              <label class="col-md-3 control-label">Employee Permission</label>
                <div class="col-md-7 inputGroupContainer">
                <div class="input-group">
                <span class="permission">Pursech</span>
				<input class="field" name="pursech" type="checkbox" value="1" autofocus {{ old('checked') }}>

                <span class="permission">Sales</span>
				<input class="field" name="sales" type="checkbox" value="1" autofocus {{ old('checked') }}>

				<span class="permission">Return</span>
				<input class="field" name="return" type="checkbox" value="1" autofocus {{ old('checked') }}>

				<span class="permission">Sales History</span>
				<input class="field" name="sales_history" type="checkbox" value="1" autofocus {{ old('checked') }}>

				<span class="permission">Accounts</span>
				<input class="field" name="accounts" type="checkbox" value="1" autofocus {{ old('checked') }}>


				<span class="permission">All Branches</span>
				<input class="field" name="all_branch" type="checkbox" value="1" autofocus {{ old('checked') }}>
              </div>
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


