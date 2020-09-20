@extends('layouts.app')

@section('content')

<div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title service text-center trans_200">
						<h2>Enter Token</h2>
					</div>
				</div>
			</div>
			</div><hr>
		<div class="container">
			<div class="panel panel-default text-center">
					<div class="row">
                        <div class="col-md-3"></div>
					    <div class="col-md-6">
                            <div class="panel-body">
                            @if (session('response') )
                <div class="alert alert-danger">
                    {{ session('response') }}
                </div>


                @endif
                    <form class="form-horizontal" method="GET" action="{{ route('home') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                            <div class="col-md-6">
                                <input placeholder="Enter Token" id="token" type="password" class="form-control" name="token" required>

                                @if ($errors->has('token'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('token') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                       

                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Verify Token
                                </button><br>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-3"></div>
                   
                	</div>
                  
                    
					
			</div>
		</div>
						
	</div>
				

			</div>
			</div>
			
	
	</div>




@endsection
