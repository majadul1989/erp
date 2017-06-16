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

                       <!-- Text input-->
                        
                       <div class="form-group {{ $errors->has('branch_city') ? ' has-error' : '' }}">
                         <label class="col-md-3 control-label">Branch City</label>  
                           <div class="col-md-7 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                         <input id="branch_city" name="branch_city" value="{{ old('branch_city') }}" placeholder="branch City" class="form-control"  type="text" autofocus required>
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
                                   <textarea class="form-control" id="branch_description" name="branch_description" placeholder="Project Description">{{ old('branch_description') }}</textarea>
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
                         <label class="col-md-6 control-label"></label>
                         <div class="col-md-6">
                           <button type="submit" class="btn btn-primary col-md-4" >Send <span class="glyphicon glyphicon-send"></span></button>
                           <label class="col-md-1 control-label"></label>
                           <button type="reset" class="btn btn-danger col-md-4" >Cancel  <span class="glyphicon glyphicon-remove"></span></button>
                         </div>
                         </div>
                       </fieldset>
                        </form>

                      </div> <!-- modal-body -->

                      </div>
                    </div>
                  </div>
                </div>

               <!-- BOOTSTRAP MODEL -->