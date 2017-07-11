<?php
$url = Request::route()->getName(); 
// Route::current()->uri();
?>
<div class="col-md-2 sidebar">
	<div class="position_sidebar" data-spy="affix" data-offset-top="60">
		<ul class="menu">
			<li><a class="{{ Request::path() == 'home' ? 'active' : '' }}" href="{{url('/home')}}">Dashboard</a></li>
			<li>
				{{-- Branch Menu --}}
				<a class="dropdown">Branch <i class="local fa fa-chevron-circle-down"></i></a>
			    	<?php // active dropdwon and active page functions
			    	if(Request::path() == 'Add_Branch' || Request::path() == 'Branch_list' ){
			    		$display = "block";
			    	}else{
			    		$display = "none";
			    	} 
			    	?>
				    <ul class="sub_menu" style="display:{{$display}}" >
				     <li><a class="{{ Request::path() == 'Add_Branch' ? 'active' : '' }}" href="{{url('/Add_Branch')}}"> Add Branch </a></li>
				    <li><a class="{{ Request::path() == 'Branch_list' ? 'active' : '' }}" href="{{url('/Branch_list')}}"> List of Branches </a></li>
				    </ul>
			</li>
			<li>
			{{-- Sale Menu --}}
				<a class="dropdown">Sale Department <i class="local fa fa-chevron-circle-down"></i></a>
			    	<?php // active dropdwon and active page functions
			    	if(Request::path() == 'Create_customer' || Request::path() == 'Customer_list' ){
			    		$display = "block";
			    	}else{
			    		$display = "none";
			    	} 
			    	?>
				    <ul class="sub_menu" style="display:{{$display}}" >
				     <li><a class="{{ Request::path() == 'Sale' ? 'active' : '' }}" href="{{url('/Sale')}}"> Sale </a></li>
				     <li><a class="{{ Request::path() == 'Sale_history' ? 'active' : '' }}" href="{{url('/Sale_history')}}"> Sale Histories </a></li>
				     <li><a class="{{ Request::path() == 'Branch_sale_history' ? 'active' : '' }}" href="{{url('/Branch_sale_history')}}">Branch Sale Histories </a></li>
				     <li><a class="{{ Request::path() == 'Create_customer' ? 'active' : '' }}" href="{{url('/Create_customer')}}"> Add New Customer </a></li>
				     <li><a class="{{ Request::path() == 'Customer_sale_history' ? 'active' : '' }}" href="{{url('/Customer_sale_history')}}">Customers History </a></li>
				    <li><a class="{{ Request::path() == 'Customer_list' ? 'active' : '' }}" href="{{url('/Customer_list')}}"> List of Customer </a></li>
				    </ul>
			</li>

			<li>
			{{-- Purchase Menu --}}
				<a class="dropdown">Purchase Department <i class="local fa fa-chevron-circle-down"></i></a>
			    	<?php // active dropdwon and active page functions
			    	if(Request::path() == 'Purchase' || Request::path() == 'Purchase_history' || Request::path() == 'Add_Company' || Request::path() == 'Company_list' || Request::path() == 'Stock_list' ){
			    		$display = "block";
			    	}else{
			    		$display = "none";
			    	} 
			    	?>
				    <ul class="sub_menu" style="display:{{$display}}" >
				     <li><a class="{{ Request::path() == 'Purchase' ? 'active' : '' }}" href="{{url('/Purchase')}}"> Purchase </a></li>
				     <li><a class="{{ Request::path() == 'Purchase_history' ? 'active' : '' }}" href="{{url('/Purchase_history')}}"> Purchase Histories </a></li>
				     <li><a class="{{ Request::path() == 'Add_Company' ? 'active' : '' }}" href="{{url('/Add_Company')}}"> Add Company </a></li>
				    <li><a class="{{ Request::path() == 'Company_list' ? 'active' : '' }}" href="{{url('/Company_list')}}"> List of Companies </a></li>
				    <li><a class="{{ Request::path() == 'Stock_list' ? 'active' : '' }}" href="{{url('/Stock_list')}}"> Stocks </a></li>
				    </ul>
			</li>
			<li>
			{{-- Employee Menu --}}
				<a class="dropdown">Employee Department<i class="local fa fa-chevron-circle-down"></i></a>
			    	<?php // active dropdwon and active page functions
			    	if(Request::path() == 'register' || Request::path() == 'employee_list' ){
			    		$display = "block";
			    	}else{
			    		$display = "none";
			    	} 
			    	?>
				    <ul class="sub_menu" style="display:{{$display}}" >
				     <li><a class="{{ Request::path() == 'register' ? 'active' : '' }}" href="{{url('/register')}}"> Add Employee </a></li>
				    <li><a class="{{ Request::path() == 'employee_list' ? 'active' : '' }}" href="{{url('/employee_list')}}"> List of Employees </a></li>
				    </ul>
			</li>
			<li><a  href="#">Financial Department</a></li>
			<li><a  href="#">{{ Auth::user()->name}}</a></li>

		</ul>
	</div>

</div>
<script type="text/javascript">
// Dropdown Menu fuctions here
$(document).ready(function(){ 
    $(document).on("click",".dropdown", function(e){
        if($(this).children(".fa").hasClass("fa-chevron-circle-down")){
            $(this).children(".fa").removeClass("fa-chevron-circle-down");
            $(this).children(".fa").addClass("fa-chevron-circle-up");
        }
        else{
            $(this).children(".fa").addClass("fa-chevron-circle-down");
            $(this).children(".fa").removeClass("fa-chevron-circle-up");
        }

        $(".sub_menu").not(this).slideUp('slow'); // it call to other open element
        $(".dropdown").not(this).children(".fa").addClass("fa-chevron-circle-down");
        $(this).siblings(".sub_menu").slideDown('slow');
        
    }) ;

});

// scroll functions

$('.position_sidebar').affix({
  offset: {
    top: 10
  }
});



</script>