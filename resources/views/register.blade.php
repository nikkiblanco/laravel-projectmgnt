@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Register</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('register-user') }}" method="POST">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-success">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form form-control" id="name" name="name"
                                        value="{{ old('name') }}" placeholder="Juan Dela Cruz" />
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Email Address</label>
                                    <input type="email" class="form form-control" id="email" name="email"
                                        value="{{ old('email') }}" placeholder="name@example.com" />
                                    <span class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form form-control" id="password" name="password" />
                                    <span class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-2">
                                <button class="btn btn-primary" type="submit">Register</button>
                            </div>
                            <div class="col-6 mt-2">
                                Already registered? <a href="{{ route('login')}}">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
