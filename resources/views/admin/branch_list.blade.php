@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
    @include('layouts.admin_sidebar')
        <div class="col-md-10">
               <form class="form-group form-margin-top">
                    <div class="col-sm-9 padding">
                        <input class="form-control" id="disabledInput" name="search" type="text" placeholder="Search...">
                    </div> 
                    <div class="col-sm-1 padding">   
                 <button type="submit" class="btn btn-default col-sm-10"><span class="glyphicon glyphicon-search"></span> Search</button>
                 </div> 
                 <div class="col-sm-1 padding"> 
                 <button type="submit" class="btn btn-warning col-sm-12"><span class="glyphicon glyphicon-download-alt"></span> Download </button>
                 </div> 
                 <div class="col-sm-1 padding"> 
                 <button type="submit" class="btn btn-primary col-sm-12"> <span class="glyphicon glyphicon glyphicon-print"></span>Print</button>
                 </div> 
               </form>
                <div class="clear" style="clear: both;"></div>
               <table class="table form-margin-top">
                   <tr class="bnt btn-success ">
                       <th>Sl. No.</th>
                       <th>Branch Name</th>
                       <th>Branch Phone</th>
                       <th>Branch E-mail</th>
                       <th>Branch Adress</th>
                       <th>Created by</th>
                       <th>Create Date</th>
                       <th>Action</th>
                   </tr>
                   <?php print_r($branch_list); ?>
                   <tr>
                       <td>01</td>
                       <td>Mirpur-10</td>
                       <td>01918305499</td>
                       <td>mirpur@gmail.com</td>
                       <td>Mirpur -10, Mirpur</td>
                       <td>Triple-MMM</td>
                       <td>2017-06-07 05:06:41</td>

                       <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                   </tr>
                   <tr>
                       <td>02</td>
                       <td>Mirpur-10</td>
                       <td>01918305499</td>
                       <td>mirpur@gmail.com</td>
                       <td>Mirpur -10, Mirpur</td>
                       <td>Triple-MMM</td>
                       <td>2017-06-07 05:06:41</td>

                       <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                       
                   </tr>
                   <tr>
                       <td>02</td>
                       <td>Mirpur-10</td>
                       <td>01918305499</td>
                       <td>mirpur@gmail.com</td>
                       <td>Mirpur -10, Mirpur</td>
                       <td>Triple-MMM</td>
                       <td>2017-06-07 05:06:41</td>
                       <td><a href="#">Edit</a> || <a href="#">Delete</a></td>
                       
                   </tr>
               </table>
        </div>
    </div>
</div>
@endsection