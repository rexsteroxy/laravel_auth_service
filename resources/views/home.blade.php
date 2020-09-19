
@extends('layouts.app')
<style type="text/css">
 .avatar{
     border-radius:100%;
     max-width : 200px;
 }
 </style>
@section('content')


<div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title service text-center trans_200">
            <h2>User Dashboard</h2>
            @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
            @endif
					</div>
				</div>
			</div>
			</div>
		<div class="container">
			<div class="panel panel-default text-center">
				<div class="panel-body">
						 
					<div class="col-md-8">
						<div class="top_bar_item" style="color:green;">{{ Auth::user()->name }} &nbsp &nbsp</div>
						<div class="top_bar_item" style="color:green;">{{ Auth::user()->email }} &nbsp &nbsp</div>
						<a class='btn btn-danger' href="{{ route('user.logout') }}" style="color:white;"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="get" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
									
		</div>
						
	</div>
				

			</div>
			</div>
			
	
	</div>




@endsection
