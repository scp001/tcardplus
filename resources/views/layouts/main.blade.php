<!doctype html>
<?php use App\Http\Controllers\Helper;?>
<html>
<head>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://code.highcharts.com/highcharts.src.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>-->

	<script src="{{ asset('vendors/jquery-2.1.3.min.js', Config::get('app.secure')) }}"></script>
	<script src="{{ asset('vendors/highcharts-4.0.4/js/highcharts.src.js', Config::get('app.secure')) }}"></script>
	<script src="{{ asset('vendors/highcharts-4.0.4/js/exporting.src.js', Config::get('app.secure')) }}"></script>
    <meta name="csrf-token" content="{{ Session::token() }}">

    <!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('vendors/bootstrap-3.3.2/css/bootstrap.min.css', Config::get('app.secure')) }}" />
	<script src="{{ asset('vendors/bootstrap-3.3.2/js/bootstrap.min.js', Config::get('app.secure')) }}"></script>
	
	<!-- JQuery -->
	<link rel="stylesheet" href="{{ asset('vendors/jquery-ui-1.11.2.custom/jquery-ui.min.css', Config::get('app.secure')) }}" />
	<script src="{{ asset('vendors/jquery-ui-1.11.2.custom/jquery-ui.min.js', Config::get('app.secure')) }}"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="https://www.utsc.utoronto.ca/_includes/application/css/hf.css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css', Config::get('app.secure')) }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/daterangepicker-bs3.css', Config::get('app.secure'))}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tablesorter.css', Config::get('app.secure'))}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/navigation.css', Config::get('app.secure'))}}" />


    <script src="{{ Helper::asset('js/tcard-plus.js') }}"></script>
    <script src="{{ Helper::asset('js/jquery.number.js') }}"></script>

	<script type="text/javascript">
	var BASE_URL = "{{ URL::to('/')}}/";
	var TOKEN = "{{ csrf_token() }}";
	</script>

	<title>TCard Plus</title>
</head>
<body>
	@include("layouts.header")
    <br>
    @include("layouts.notifications")
    @include("layouts.navigation")
	

	<div class="content-container">
		<div class="content" role="main">
            <noscript>
                <center><h3>Note: This UTSC system requires that JavaScript support be turned on.<br>It will not function properly with JavaScript turned off.</h3></center>
            </noscript>
			@yield("content")
		</div>
	</div>
	@yield("javascript")
	@include("layouts.footer")
</body>
</html>
