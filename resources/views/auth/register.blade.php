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
       <fieldset>
       <!-- Success message -->
      <h2>Add New Employee Informations</h2><hr>
            <form class="form-horizontal" id="contact_form" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <!-- Input Field -->
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                  <label class="col-md-2 control-label">Name</label>
                    <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                      </div>
                        @if ($errors->has('name')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- Input Field -->
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-2 control-label">E-Mail Address</label>

                    <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                      </div>
                        @if ($errors->has('email'))
                            <span class="help-block red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- Input Field -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-2 control-label">Password</label>

                    <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" required>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <!-- Input Field -->
                <div class="form-group">
                    <label for="password-confirm" class="col-md-2 control-label">Confirm Password</label>

                    <div class="col-md-7">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                    </div>
                </div>
                <!-- Text area -->
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                  <label class="col-md-2 control-label">Address</label>
                    <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                          <textarea class="form-control" name="address"  placeholder="Employee Address" autofocus required> {{ old('address') }}</textarea>
                      </div>
                        @if ($errors->has('address')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

              <!-- Text input-->
              <div class="form-group {{ $errors->has('branch_id') ? ' has-error' : '' }}">
                <label class="col-md-2 control-label">Select Branch</label>  
                  <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <select name="branch_id" class="form-control selectpicker" data-live-search="true">
                        <option value=" " >Please select your Branch</option>
                        @foreach ($dates as $key => $data)
                        <option value="{{$data->branch_id}}">{{$data->branch_name}}</option>
                        @endforeach
                        </select>
                    </div>
                         @if ($errors->has('branch_id')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('branch_id') }}</strong>
                           </span>
                        @endif
                  </div>
                </div>
                <!-- Checkbox -->
                <div class="form-group">
                              <label class="col-md-2 control-label">Employee Permission</label>
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

                      <span class="permission">Add New Employee</span>
                      <input class="field" name="employee" type="checkbox" value="1" autofocus {{ old('checked') }}>
                
                       <span class="permission">All Branches</span>
                       <input class="field" name="all_branch" type="checkbox" value="1" autofocus {{ old('checked') }}>
                              </div>
                              </div>
                            </div>
                           <hr>

                {{-- Submit Botton --}}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-2">
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                    </div>
                </div>
            </form>
      </div>

<script type="text/javascript">
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
</script>
</div><!-- /.main-class -->
@endsection



