<!DOCTYPE html>
<html>
<head>
	@include('admin/layouts/head')
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

	@include('admin/layouts/header')

	@include('admin/layouts/sidebar')

	@section('main-content')
		@show

	@include('admin/layouts/footer')

</div>

	@include('admin.layouts.js')

</body>
</html>