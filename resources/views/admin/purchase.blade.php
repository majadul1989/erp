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
            <form class="form-horizontal" action="{{url('/ps_insert')}}" id="contact_form" role="form" method="POST">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <fieldset>
            <!-- Success message -->
           <h2>Products Purchase</h2><hr>

           <!-- Dropdown-->
           <div class="form-group {{ $errors->has('purchase_ps_id') ? ' has-error' : '' }}">
             <label class="col-md-3 control-label">Select Company</label>  
               <div class="col-md-7 inputGroupContainer">
                 <div class="input-group">
                   <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                     <select name="purchase_ps_id" class="form-control selectpicker" data-live-search="true">
                     <option value=" " >Please select your purchase company</option>
                     {{-- @foreach ($dates as $key => $data)
                     <option value="{{$data->branch_id}}">{{$data->branch_name}}</option>
                     @endforeach --}}
                     </select>
                 </div>
                      @if ($errors->has('purchase_ps_id')) <!-- show error --> 
                         <span class="help-block red">
                             <strong>{{ $errors->first('purchase_ps_id') }}</strong>
                        </span>
                     @endif
               </div>
             </div>

             <!-- Text input-->
             <div class="form-group{{ $errors->has('product_brand') ? ' has-error' : '' }}">
                     <label class="col-md-3 control-label">Name of Brand</label>
                 <div class="col-md-7 inputGroupContainer">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="glyphicon glyphicon-bold"></i></span>
                             <input id="product_brand" type="text" placeholder="Name of Product" class="form-control" name="product_brand" value="{{ old('product_brand') }}"  autofocus required>
                     </div>
                         @if ($errors->has('product_brand')) <!-- show error --> 
                             <span class="help-block red">
                                 <strong>{{ $errors->first('product_brand') }}</strong>
                             </span>
                         @endif
                 </div>
             </div>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Name of Product</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-folder-close"></i></span>
                            <input id="product_name" type="text" placeholder="Name of Product" class="form-control" name="product_name" value="{{ old('product_name') }}"  autofocus required>
                    </div>
                        @if ($errors->has('product_name')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('product_name') }}</strong>
                            </span>
                        @endif
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group{{ $errors->has('product_code') ? ' has-error' : '' }}">
                    <label class="col-md-3 control-label">Product Barcode</label>
                <div class="col-md-7 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                            <input id="product_code" type="text" placeholder="Product Barcode" class="form-control" name="product_code" value="{{ old('product_code') }}"  autofocus required>
                    </div>
                        @if ($errors->has('product_code')) <!-- show error --> 
                            <span class="help-block red">
                                <strong>{{ $errors->first('product_code') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            <!-- Dropdown-->
            <div class="form-group {{ $errors->has('product_type') ? ' has-error' : '' }}">
              <label class="col-md-3 control-label">Select Product Type</label>  
                <div class="col-md-5 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                      <select name="product_type" class="form-control selectpicker" data-live-search="true">
                      <option value=" " >Please select your purchase company</option>
                      <option value="per_kg" >Per kg</option>
                      <option value="per_pice" >Per Pice</option>
                      <option value="per_metter" >Per Mitter</option>
                      <option value="size" >Size</option>
                      </select>
                  </div>
                       @if ($errors->has('product_type')) <!-- show error --> 
                          <span class="help-block red">
                              <strong>{{ $errors->first('product_type') }}</strong>
                         </span>
                      @endif
                </div>
              <!-- Text input-->
              <div class="form-group{{ $errors->has('per_field') ? ' has-error' : '' }}">
                  <div class="col-md-2 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
                              <input id="per_field" type="text" placeholder="Product Barcode" class="form-control" name="per_field" value="{{ old('per_field') }}"  autofocus required>
                      </div>
                          @if ($errors->has('per_field')) <!-- show error --> 
                              <span class="help-block red">
                                  <strong>{{ $errors->first('per_field') }}</strong>
                              </span>
                          @endif
                  </div>
              </div>
              </div>

              <!-- Text input-->
              <div class="form-group{{ $errors->has('product_quantity') ? ' has-error' : '' }}">
                      <label class="col-md-3 control-label">Product Quantity</label>
                  <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-leaf"></i></span>
                              <input id="product_quantity" type="text" placeholder="Product Barcode" class="form-control" name="product_quantity" value="{{ old('product_quantity') }}"  autofocus required>
                      </div>
                          @if ($errors->has('product_quantity')) <!-- show error --> 
                              <span class="help-block red">
                                  <strong>{{ $errors->first('product_quantity') }}</strong>
                              </span>
                          @endif
                  </div>
              </div>
              <!-- Text input-->
              <div class="form-group{{ $errors->has('product_p_price') ? ' has-error' : '' }}">
                      <label class="col-md-3 control-label">Product Purchase Price</label>
                  <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                              <input id="product_p_price" type="text" placeholder="Product Barcode" class="form-control" name="product_p_price" value="{{ old('product_p_price') }}"  autofocus required>
                      </div>
                          @if ($errors->has('product_p_price')) <!-- show error --> 
                              <span class="help-block red">
                                  <strong>{{ $errors->first('product_p_price') }}</strong>
                              </span>
                          @endif
                  </div>
              </div>

              <!-- Text input-->
              <div class="form-group{{ $errors->has('product_sale_price') ? ' has-error' : '' }}">
                      <label class="col-md-3 control-label">Product Sale Price</label>
                  <div class="col-md-7 inputGroupContainer">
                      <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                              <input id="product_sale_price" type="text" placeholder="Product Barcode" class="form-control" name="product_sale_price" value="{{ old('product_sale_price') }}"  autofocus required>
                      </div>
                          @if ($errors->has('product_sale_price')) <!-- show error --> 
                              <span class="help-block red">
                                  <strong>{{ $errors->first('product_sale_price') }}</strong>
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
                <button type="reset" class="btn btn-danger col-md-4" >Refresh <span class="glyphicon glyphicon-refresh"></span></button>
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


