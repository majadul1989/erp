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
                       <form id="customer_id" class="form-horizontal" action="{{url('/customerUpdate/')}}" id="contact_form" role="form" method="POST">
                       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                       <fieldset>
                       <!-- Success message -->

                       <!-- Text input-->
                       <div class="form-group{{ $errors->has('customer_name') ? ' has-error' : '' }}">
                               <label class="col-md-3 control-label">Name</label>
                           <div class="col-md-7 inputGroupContainer">
                               <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                       <input id="customer_name" type="text" class="form-control" name="customer_name" value="{{ old('customer_name') }}"  autofocus required>
                               </div>
                                   @if ($errors->has('customer_name')) <!-- show error --> 
                                       <span class="help-block red">
                                           <strong>{{ $errors->first('customer_name') }}</strong>
                                       </span>
                                   @endif
                           </div>
                       </div>


                       <!-- Text input-->
                       <div class="form-group {{ $errors->has('customer_mail') ? ' has-error' : '' }}">
                             <label class="col-md-3 control-label">E-Mail</label>  
                           <div class="col-md-7 inputGroupContainer">
                               <div class="input-group">
                                   <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                   <input id="customer_mail" name="customer_mail" placeholder="E-Mail Address" class="form-control" value="{{ old('customer_mail') }}" type="text" autofocus required>
                               </div>
                               @if ($errors->has('customer_mail')) <!-- show error --> 
                                   <span class="help-block red">
                                       <strong>{{ $errors->first('customer_mail') }}</strong>
                                   </span>
                               @endif
                           </div>
                       </div>


                       <!-- Text input-->
                              
                       <div class="form-group {{ $errors->has('customer_mobile') ? ' has-error' : '' }}">
                         <label class="col-md-3 control-label">Mobile NO.</label>  
                           <div class="col-md-7 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                         <input id="customer_mobile" name="customer_mobile" placeholder="01xxxxxxxxx" class="form-control" type="text" autofocus required value="{{ old('customer_mobile') }}">
                           </div>
                           @if ($errors->has('customer_mobile')) <!-- show error --> 
                               <span class="help-block red">
                                   <strong>{{ $errors->first('customer_mobile') }}</strong>
                               </span>
                           @endif
                         </div>
                       </div>

                      
                       <!-- Text area -->
                         
                       <div class="form-group {{ $errors->has('customer_address') ? ' has-error' : '' }}">
                         <label class="col-md-3 control-label">Address</label>
                           <div class="col-md-7 inputGroupContainer">
                           <div class="input-group">
                               <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                               <textarea class="form-control" id="customer_address" name="customer_address"  placeholder="Customer Address" autofocus required> {{ old('customer_address') }}</textarea>
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

               <!-- BOOTSTRAP MODEL -->