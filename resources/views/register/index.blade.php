@extends('layouts.main')

@section('name', 'class="bg-primary"')

@section('title', 'Register')

@section('login')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center"
                                style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Register</h4>
                                    <p class="mb-0">Masukkan data untuk register dengan baik dan teratur.</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('auth.register') }}" method="post">
                                        @csrf
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Nama lengkap</label>
                                            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">

                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">

                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3 border-rounded">
                                            <select class="form-select" name="id_outlet" id="id_outlet"
                                                aria-label="Floating label select example">
                                                <option selected>Open this select menu...</option>
                                                @foreach ($id_outlet as $ot)
                                                    <option value="{{ $ot->id }}">{{ $ot->id }}</option>
                                                @endforeach

                                            </select>
                                            <label for="id_outlet">ID Outlet</label>
                                        </div>
                                        <div class="form-floating mb-3 border-rounded">
                                            <select class="form-select" name="role" id="role"
                                                aria-label="Floating label select example">
                                                <option selected>Open this select menu...</option>
                                                @foreach ($user_roles as $item)
                                                    <option value="{{ $item }}">{{ $item }}</option>
                                                @endforeach

                                            </select>
                                            <label for="role">Role Akun</label>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" name="password" id="password" class="form-control @error('cpassword') is-invalid @enderror">

                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="cpassword" id="cpassword" class="form-control @error('cpassword') is-invalid @enderror">

                                            @error('cpassword')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Sudah mempunyai akun?
                                        <a href="{{ route('login') }}"
                                            class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
