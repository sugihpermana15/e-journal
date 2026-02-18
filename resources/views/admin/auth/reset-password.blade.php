@extends('admin.layouts.master_auth')

@section('title', 'Reset Password | Admin')

@section('content')

    <div>
        <img src="{{ asset('assets/admin/images/auth/login_bg.jpg') }}" alt="Auth Background"
            class="auth-bg light w-full h-full opacity-60 position-absolute top-0">
        <img src="{{ asset('assets/admin/images/auth/auth_bg_dark.jpg') }}" alt="Auth Background" class="auth-bg d-none dark">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100 py-10">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card mx-xxl-8">
                        <div class="card-body py-12 px-8">
                            <img src="{{ asset('assets/images/resources/logoMed.png') }}" alt="Med Open Press" height="30"
                                class="mb-4 mx-auto d-block">
                            <h6 class="mb-8 fw-medium text-center">Create a Strong Password</h6>
                            <form id="passwordForm">
                                <div class="row g-4">
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username :</label>
                                        <input type="text" class="form-control" id="username" name="username" required>
                                    </div>
                                    <div class="col-12 password-field-wrapper">
                                        <label for="password" class="form-label">Password :</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <div class="password-field-wrapper">
                                        <label for="confirmPassword" class="form-label">Confirm Password :</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirmPassword" required>
                                    </div>
                                    <div class="error" id="confirmPasswordError"></div>
                                    <button type="submit" id="submitBtn" class="btn btn-primary w-full" disabled>Reset Password</button>
                                    <p class="mb-0 fw-semibold position-relative text-center fs-12">Return to <a
                                            href="{{ url('admin/auth/signin') }}" class="text-decoration-underline text-primary">Sign In</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="position-relative text-center fs-12 mb-0">© {{ date('Y') }}. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
