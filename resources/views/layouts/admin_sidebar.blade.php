<?php
$url = Request::route()->getName(); 
// Route::current()->uri();
?>
<div class="col-md-2 sidebar">
	<div class="position_sidebar" data-spy="affix" data-offset-top="60">
		<ul class="menu">
			<li><a class="{{ Request::path() == 'home' ? 'active' : '' }}" href="{{url('/home')}}">Dashboard</a></li>
			<li>
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
			<li><a  href="#">Company</a></li>
			<li><a  href="#">Sale Department</a></li>
			<li><a  href="#">Purchase Department</a></li>
			<li>
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