<!doctype html>
<html class="no-js" lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel Admin Panel</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.6/flatly/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('vendor/kun-category/sweetalert/css/sweetalert.css')}}" rel="stylesheet">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style>
		body {
			padding-top: 70px;
		}
	</style>
	<!-- Scripts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="{{asset('vendor/kun-category/sweetalert/js/sweetalert.min.js')}}"></script>
	<script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="#">Admin Panel</a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li><a href="#">{{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		@include('categories::includes.messages')
		<div class="row">
			  <div class="col-md-3">
				  	@include('categories::includes.sidebar')
			  </div>
			  <div class="col-md-9">
				  	@yield('content')
			  </div>
		</div>
	</div>

	<hr/>

	<div class="container">
	    &copy; {{ date('Y') }}. Created by <a href="http://github.com/kun391">Thanh Nguyen</a>
	    <br/>
	</div>

	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		$(function() {
			$.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
		        }
		    });
			$('[data-method]').append(function () {
		        if (! $(this).find('form').length > 0)
		            return "\n" +
		                "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
		                "   <input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
		                "   <input type='hidden' name='_token' value='" + $('meta[name="_token"]').attr('content') + "'>\n" +
		                "</form>\n"
		        else
		            return "";
		    })
		        .removeAttr('href')
		        .attr('style', 'cursor:pointer;')
		        .attr('onclick', '$(this).find("form").submit();');

			$('body').on('submit', 'form[name=delete_item]', function(e){
		        e.preventDefault();
		        var form = this;

		        swal({
		            title: "Warning",
		            text: "Are you sure you want to delete this item?",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonColor: "#DD6B55",
		            confirmButtonText: "Yes, delete it!",
		            closeOnConfirm: true
		        }, function(confirmed) {
		            if (confirmed)
		                form.submit();
		        });
		    });

		    /**
		     * Bind all bootstrap tooltips
		     */
		    $("[data-toggle=\"tooltip\"]").tooltip();
		})
	</script>

</body>
</html>
