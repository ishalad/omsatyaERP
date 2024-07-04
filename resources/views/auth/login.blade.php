@include('layouts.guest')



<div class="row authentication mx-0">

    <div class="col-xxl-5 col-xl-5 col-lg-5 d-xl-block d-none px-0">
        <div class="authentication-cover">
            <div class="aunthentication-cover-content rounded">
                <div class=" text-center p-5 d-flex align-items-center justify-content-center">
                    <div>
                        <div class="mb-5">
                            <img src="{{ asset('assets/images/authentication/2.png') }}"
                                class="authentication-image w-100" alt="">
                        </div>
                        <h6 class="fw-semibold ">Sign In</h6>
                        <p class="fw-normal fs-14 op-7"> test</p>
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
                    <div class="row gy-3">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="col-xl-12 mt-0">
                                <label for="email" class="form-label text-default">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" id="email"
                                    value="{{ old('email') }}">
                            </div>

                            <div class="col-xl-12 mt-0">
                              
                                    <label for="password" class="form-label text-default d-block">Password</label>
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        id="signin-password" placeholder="password">
                                    <button class="btn btn-light border border-black border-1" type="button"
                                        onclick="createpassword('signin-password',this)" id="button-addon2"><i
                                            class="ri-eye-off-line align-middle"></i></button>
                                    @if (Route::has('password.request'))
                                        <a class="float-end text-danger" href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                            
                                    {{-- <div class="input-group">
                                    <input type="password" class="form-control form-control-lg" id="signin-password" placeholder="password">
                                </div> --}}
                                                          
                            </div>
                            <div class="mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        Remember password ?
                                    </label>
                                </div>
                            </di   v>

                            <div class="col-xl-12 mt-0">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @endsection --}}
