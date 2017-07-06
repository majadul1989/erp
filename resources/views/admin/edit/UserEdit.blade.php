 <!-- BOOTSTRAP MODEL -->
                <div class="modal fade" id="favoritesModal" 
                     tabindex="-1" role="dialog" 
                     aria-labelledby="favoritesModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button"
                          aria-label="Close" class="close" 
                          data-dismiss="modal">
                          <span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" 
                        id="favoritesModalLabel" class="branch_info"></h2>
                      </div>
                      <div class="modal-body">
                    <!--  -->
                       <form id="branch_id" class="form-horizontal" action="{{url('/userUpdate/')}}" id="contact_form" role="form" method="POST">
                       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <fieldset>
                       <!-- Success message -->

                       <!-- Text input-->
                       <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                               <label class="col-md-3 control-label">Branch Name</label>
                           <div class="col-md-7 inputGroupContainer">
                               <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                       <input id="branch_name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus required>
                               </div>
                                   @if ($errors->has('name')) <!-- show error --> 
                                       <span class="help-block red">
                                           <strong>{{ $errors->first('name') }}</strong>
                                       </span>
                                   @endif
                           </div>
                       </div>


                       <!-- Text input-->
                       <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                             <label class="col-md-3 control-label">Branch E-Mail</label>  
                           <div class="col-md-7 inputGroupContainer">
                               <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                   <input id="branch_email" name="email" placeholder="E-Mail Address" class="form-control" value="{{ old('email') }}" type="text" autofocus required>
                               </div>
                               @if ($errors->has('email')) <!-- show error --> 
                                   <span class="help-block red">
                                       <strong>{{ $errors->first('email') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>


                       <!-- Text input-->
                              
                       <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                         <label class="col-md-3 control-label">Branch Phone #</label>  
                           <div class="col-md-7 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                         <input id="branch_phone" name="phone" placeholder="01xxxxxxxxx" class="form-control" type="text" autofocus required value="{{ old('phone') }}">
                           </div>
                           @if ($errors->has('phone')) <!-- show error --> 
                               <span class="help-block red">
                                   <strong>{{ $errors->first('phone') }}</strong>
                               </span>
                           @endif
                         </div>
                       </div>

                      
                       <!-- Text area -->
                         
                       <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                         <label class="col-md-3 control-label">Address</label>
                           <div class="col-md-7 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                               <textarea class="form-control" id="branch_address" name="address"  placeholder="Address" autofocus required> {{ old('address') }}</textarea>
                         </div>
                         @if ($errors->has('address')) <!-- show error --> 
                             <span class="help-block red">
                                 <strong>{{ $errors->first('address') }}</strong>
                             </span>
                         @endif
                         </div>
                       </div> 

                      <!-- Dropdown-->
                      <div class="form-group {{ $errors->has('branch_city_id') ? ' has-error' : '' }}">
                        <label class="col-md-3 control-label">Select Branch</label>  
                          <div class="col-md-7 inputGroupContainer">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                                <select name="branch_city_id" class="form-control">
                                <option id="valdfhue"></option>
                                @foreach ($data['show_user_for_edit'] as $key => $show_user)
                                <option id="valdfhue{{$key}}" value="{{$show_user->branch_id}}">{{$show_user->branch_name}}</option>
                                @endforeach
                                </select>
                            </div>
                                 @if ($errors->has('branch_city_id')) <!-- show error --> 
                                    <span class="help-block red">
                                        <strong>{{ $errors->first('branch_city_id') }}</strong>
                                   </span>
                                @endif
                          </div>
                        </div>
                        <!-- Text area -->
                          
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-7 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password"  placeholder="password">
                          </div>
                          @if ($errors->has('password')) <!-- show error --> 
                              <span class="help-block red">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                          </div>
                        </div> 
                    {{-- checkbox --}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Employee Permission</label>
                        <div class="col-md-7 inputGroupContainer">
                            <div class="input-group">
                        <span class="permission">Pursech</span>
                       <input class="field" id="pursech" name="pursech" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                               <span class="permission">Sales</span>
                        <input class="field" id="sales" name="sales" type="checkbox" value="1" autofocus>
                 
                        <span class="permission">Return</span>
                        <input class="field" id="return2" name="return" type="checkbox" value="1" autofocus {{ old('checked') }}>
                        <br>
                        <span class="permission">Sales History</span>
                        <input class="field" id="sales_history" name="sales_history" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                        <span class="permission">Accounts</span>
                        <input class="field" id="accounts" name="accounts" type="checkbox" value="1" autofocus {{ old('checked') }}>

                       <span class="permission">Admin</span>
                       <input class="field" id="employee" name="employee" type="checkbox" value="1" autofocus {{ old('checked') }}>
                      <br>
                        <span class="permission">Super Admin</span>
                        <input class="field" id="all_branch" name="all_branch" type="checkbox" value="1" autofocus {{ old('checked') }}>
                               </div>
                               </div>
                </div>
                       <hr>
                       <!-- Button -->
                       <div class="form-group">
                         <label class="col-md-6 control-label"></label>
                         <div class="col-md-6">
                           <button type="submit" class="btn btn-primary col-md-4" >Send <span class="glyphicon glyphicon-send"></span></button>
                           <label class="col-md-1 control-label"></label>
                           <button type="reset" class="btn btn-danger col-md-4" >Restart  <span class="glyphicon glyphicon-refresh"></span></button>
                         </div>
                         </div>
                       </fieldset>
                        </form>

                      </div> <!-- modal-body -->

                      </div>
                    </div>
                  </div>

               <!-- BOOTSTRAP MODEL -->