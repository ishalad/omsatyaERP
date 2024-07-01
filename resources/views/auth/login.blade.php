@include('layouts.guest')



<div class="row authentication mx-0">

    <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
        <div class="authentication-cover">
            <div class="aunthentication-cover-content rounded">
                <div class=" text-center p-5 d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mb-5">
                            <img src="{{asset('assets/images/authentication/2.png')}}" class="authentication-image w-100" alt="">
                        </div>
                        <h6 class="fw-semibold ">Sign In</h6>
                        <p class="fw-normal fs-14 op-7"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa eligendi expedita aliquam quaerat nulla voluptas facilis. Porro rem voluptates possimus, ad, autem quae culpa architecto, quam labore blanditiis at ratione.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-7 col-xl-7 col-lg-12">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-7 col-sm-8 col-12">
                <div class="p-5">
                    {{-- <div class="mb-3">
                        <a href="{{route('home')}}}">
                            <img src="../assets/images/brand-logos/desktop-logo.png" alt="" class="authentication-brand desktop-logo">
                            <img src="../assets/images/brand-logos/desktop-white.png" alt="" class="authentication-brand desktop-dark">
                        </a>
                    </div> --}}
                    <p class="h5 fw-semibold mb-2">Sign In</p>
                    <form action="{{route('login')}}" method="post">
                        <div class="row gy-3 mt-3">
                            <div class="col-xl-12 mt-0">
                                <label for="signin-username" class="form-label text-default">User Name</label>
                                <input type="text" class="form-control form-control-lg" id="signin-username" placeholder="user name" name="email" value="{{old('email')}}" required autofocus autocomplete="username">
                            </div>
                            <div class="col-xl-12 mb-3">
                                <label for="signin-password" class="form-label text-default d-block">Password<a href="forgot.html" class="float-end text-danger">Forget password ?</a></label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="signin-password" placeholder="password" name="password"
                                    required autocomplete="current-password" >
                                    <button class="btn btn-light" type="button" onclick="createpassword('signin-password',this)" id="button-addon2"><i class="ri-eye-off-line align-middle"></i></button>
                                </div>
                                <div class="mt-2">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                            <input id="remember_me" type="checkbox" class="rounded form-check-label text-muted fw-normal border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            Remember password ?
                                        </label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-grid mt-2">
                                <button type="submit" class="btn btn-lg btn-primary">Sign In</button>
                                {{-- <a href="index.html" class="btn btn-lg btn-primary">Sign In</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @endsection --}}
