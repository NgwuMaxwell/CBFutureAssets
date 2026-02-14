@extends('layouts.guest1')
@section('title', 'Login account')
@section('content')



        <!-- Row -->
        <div class="row signpages text-center">
            <div class="col-md-12">
                <div class="card border-0">




                    @if (Session::has('status'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                    <div class="row row-sm">
                        <div class="col-lg-8 col-xl-8 col-xs-8 col-sm-12 login_form rounded-start-11">

                            <div class="container-fluid">
                                <div class="row row-sm">
                                    <div class="card-body mt-2 mb-2">
                                        <div class="text-center">
                                            <a href="/">
                                                <img src="{{ asset('storage/app/public/'.$settings->logo)}}" style="height: 60px" class="text-center" />
                                            </a>
                                        </div>
                                        <h2 class="text-start mb-2">Sign In</h2>
                                        <p class="mb-4 text-muted tx-13 ms-0 text-start">Sign in to start trading
                                            crypto, forex and stocks.</p>
                                        <div class="panel desc-tabs border-0 p-0">


                                            {{-- <div id="login_loader"
                                                style="padding: 3rem; margin: 0 1.5rem 2rem; display: none; align-items: center; justify-content: center; flex-direction: column;">
                                                <img src="{{ asset('temp/auth/main/assets/img/loader.svg')}}" alt="Loader">
                                                <span style="letter-spacing: 4px;" class>LOGGING...</span>
                                            </div> --}}



                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                 <div class="panel-body tabs-menu-body mt-2">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab01">
                                                            <div class="form-group text-start">
                                                                <label class="tx-medium">Email or Username</label>
                                                                <input class="form-control" name="email" value="{{ old('email') }}"
                                                                    placeholder="Email or Username" type="text"
                                                                   required>

                                                                   <div>
                                                                    @error('email')
				                                 <h6 class="fs-6 text-danger">{{ $message }}</h6>
			                                                    @enderror
                                                                   </div>
                                                            </div>
                                                            <div class="form-group text-start">
                                                                <label class="tx-medium">Password</label>
                                                                <input class="form-control border-end-0"
                                                                    placeholder="Enter your password"  name="password"
                                                                    type="password"
                                                                    data-bs-toggle="password" required>
                                                            <div>
                                                                @error('password')
                                                                <h6 class="fs-6 text-danger">{{ $message }}</h6>
                                                                               @enderror
                                                            </div>


                                                            </div>
                                                            <button type="submit" name="login"
                                                                class="btn btn-primary btn-block">Sign In</button>

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                        <div class="text-start mt-4 ms-0 mb-3">
                                            <div class="mb-1"><a href="{{ route('password.request') }}">Forgot password?</a></div>
                                            <div>Don't have an account? <a href="{{('register')}}">Register Here</a></div>
                                        </div>
                                        {{-- <div class="signin-or-title">
                                            <h5 class="fs-12 mb-1 title tx-normal">or</h5>
                                        </div> --}}
                                        {{-- <div class="pb-1 pt-4">
                                            <div class="text-center socialicons">
                                                <a href="#" target="_blank"
                                                    class="btn ripple btn-danger-transparent rounded-circle"
                                                    role="button"><i class="mdi mdi-google"></i></a>
                                                <a href="#" target="_blank"
                                                    class="btn ripple btn-primary-transparent rounded-circle"
                                                    role="button"><i class="mdi mdi-facebook"></i></a>
                                                <a href="#" target="_blank"
                                                    class="btn ripple btn-info-transparent rounded-circle"
                                                    role="button"><i class="mdi mdi-twitter"></i></a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>


            </div>
        </div>
        <!-- End Row -->





@endsection
