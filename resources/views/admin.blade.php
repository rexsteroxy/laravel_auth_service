@extends('layouts.admin')

<style type="text/css">
 .avatar{
     border-radius:100%;
     max-width : 100px;
 }
</style>
@section('content')
<div class="container"> 
    <div class="row"> 
    
        @if(count($errors) > 0)
                    @foreach($errors->all as $error)
                        <div class="alert alert-danger"><li>{{$error}}</li></div>
                    @endforeach
                @endif
                @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
                    @endif
            <div class="panel panel-default text-center">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-md-4">  
                       DISPLAY ALL USERS
                     </div>
                     <div class="col-md-4">
                    
                     </div>
                </div>
                </div>

                <div class="panel-body">



                <div class="col-md-12">

@if(count($users) > 0)

@foreach($users->all() as $user)
<div class="row">
    <div></div>
    <h1>{{$user->id}}</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Login ID</th>
                <th scope="col">Registered Time</th>
                <th scope="col">Uique Token</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{date('M j, Y h:i', strtotime($user->updated_at))}}</td>
                <td>{{ $user->unique_token }}</td>
                <td><a href="" class="btn btn-primary">Copy Token</a></td>
               
            </tr>
        </tbody>
    </table>
</div>


@endforeach
<div class="row">
				<div class="col">
					<div class="d-flex align-items-center justify-content-center"> {{ $users->links() }}</div>
				</div>
			</div>
@else
<h4 class="text-center">No User</h4>

@endif


</div>
              
                </div>
             
            </div>
        </div>
    </div>
</div>
@endsection


























<!-- @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! as Admin
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
