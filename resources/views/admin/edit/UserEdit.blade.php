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
                       <form id="branch_id" class="form-horizontal" action="{{url('/update/')}}" id="contact_form" role="form" method="POST">
                       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <fieldset>
                       <!-- Success message -->

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
                                   <input id="branch_email" name="branch_email" placeholder="E-Mail Address" class="form-control" value="{{ old('branch_email') }}" type="text" autofocus required>
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
                         <input id="branch_phone" name="branch_phone" placeholder="01xxxxxxxxx" class="form-control" type="text" autofocus required value="{{ old('branch_phone') }}">
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
                               <textarea class="form-control" id="branch_address" name="branch_address"  placeholder="Project Description" autofocus required> {{ old('branch_address') }}</textarea>
                         </div>
                         @if ($errors->has('branch_address')) <!-- show error --> 
                             <span class="help-block red">
                                 <strong>{{ $errors->first('branch_address') }}</strong>
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

                    {{-- checkbox --}}
                <div class="form-group">
                    <label class="col-md-3 control-label">Employee Permission</label>
                        <div class="col-md-7 inputGroupContainer">
                            <div class="input-group">
                        <span class="permission">Pursech</span>
                       <input class="field" id="pursech" name="pursech" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                               <span class="permission">Sales</span>
                        <input class="field" id="sales" name="sales" type="checkbox" value="1" autofocus
                 
                        <span class="permission">Return</span>
                        <input class="field" id="return2" name="return" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                        <span class="permission">Sales History</span>
                        <input class="field" id="sales_history" name="sales_history" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                        <span class="permission">Accounts</span>
                        <input class="field" id="accounts" name="accounts" type="checkbox" value="1" autofocus {{ old('checked') }}>

                       <span class="permission">Add New Employee</span>
                       <input class="field" id="employee" name="employee" type="checkbox" value="1" autofocus {{ old('checked') }}>
                 
                        <span class="permission">All Branches</span>
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
                           <button type="reset" class="btn btn-danger col-md-4" >Restart  <span class="glyphicon glyphicon-remove"></span></button>
                         </div>
                         </div>
                       </fieldset>
                        </form>

                      </div> <!-- modal-body -->

                      </div>
                    </div>
                  </div>

               <!-- BOOTSTRAP MODEL -->