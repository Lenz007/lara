@if (Session::has('success') )
	<div class="alert alert-success text-center" role="alert">
		{{Session::get('success')}}
	</div>
@endif

@if (Session::has('mistake') )
	<div class="alert alert-danger" role="alert">
		<strong>Ошибка:</strong>{{Session::get('mistake')}}
	</div>
@endif