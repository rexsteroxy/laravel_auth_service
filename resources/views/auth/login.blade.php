@extends('layouts.app')

@section('content')

<div class="services">
		<div class="container">
			<div class="row">

				<div class="col">
					<div class="section_title service text-center trans_200">
						<h2>User Login</h2>
					</div>
				</div>
			</div>
			</div><hr>
		<div class="container">
			<div class="panel panel-default text-center">
					<div class="row">
                        <div class="col-md-3"></div>
					    <div class="col-md-9">
                            <div class="panel-body">
                            @if(count($errors) > 0)
                    @foreach($errors->all as $error)
                        <div class="alert alert-danger"><li>{{$error}}</li></div>
                    @endforeach
                @endif
                @if (session('response') )
                <div class="alert alert-danger">
                    {{ session('response') }}
                </div>


                @endif

                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                            <div class="col-md-6">
                                <input placeholder="Enter Your Email" id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                            <div class="col-md-6">
                                <input placeholder="Enter Your Password" id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button><br>

                                <strong>Not Registered? Click Here <a href="{{ route('register.user') }}">Register</a></strong>
                            </div>
                        </div>
                    </form>


                	</div>



			</div>
		</div>

	</div>


			</div>
			</div>


	</div>




@endsection
