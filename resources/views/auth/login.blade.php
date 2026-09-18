@extends('auth.layout')

@section('content')

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
            <!-- Login -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-6">
                        <a href="index.html" class="app-brand-link">
                            <span class="app-brand-logo demo">
                                <img src="{{ asset('assets/img/inventory_logo_speed_box.svg') }}" alt="Logo" class="app-brand-img">
                            </span>
                            <span class="app-brand-text demo text-heading fw-bold">INV-SYS</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1">Welcome to INV-SYS! 👋</h4>
                    <p class="mb-6">Please sign-in to your account and start the adventure</p>

                    <form id="formAuthentication" class="mb-4" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="email" class="form-label">Email or Username</label>
                            <input
                                type="text"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="Enter your email or username"
                                oninput="this.classList.remove('is-invalid'); const errorDiv = this.nextElementSibling; if (errorDiv) errorDiv.style.setProperty('display', 'none');"
                                autofocus />
                            @error('email')
                            <div class="invalid-feedback" style="display: block;">Email/password tidak valid</div>
                            @enderror
                        </div>
                        <div class="mb-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                        <div class="my-8">
                            <div class="d-flex justify-content-between">
                                <div class="form-check mb-0 ms-2">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                                <a href="auth-forgot-password-basic.html">
                                    <p class="mb-0">Forgot Password?</p>
                                </a>
                            </div>
                        </div>
                        <div class="mb-6">
                            <button class="btn btn-primary d-grid w-100" type="submit">Login</button>
                        </div>
                    </form>

                    <p class="text-center">
                        <span>Akses akun dikelola oleh Admin Sistem.</span>
                    </p>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>

@endsection