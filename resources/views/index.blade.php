@extends('layouts.app')
<style type="text/css">
	.avatar {
		border-radius: 100%;
		max-width: 200px;
	}
</style>
@section('content')

<div class="container">
	<div class="row">
		<div class="col">
			<div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
				@guest

				@else
				<div class="top_bar_item" style="color:white;">{{ Auth::user()->name }} &nbsp &nbsp</div>

				<div class="jumbotron">
					<h2>Congratulations You are now logged In as a user</h2>
				</div>
				@endguest
			</div>
			<div class="jumbotron">
				<h2>Welcome to the home page</h2>
			</div>
		</div>
	</div>
</div>


@endsection