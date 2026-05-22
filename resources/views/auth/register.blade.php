@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3>Admin Register</h3>
            </div>

            <div class="card-body">

                <form method="POST"
                      action="{{ route('admin.register.submit') }}">

                    @csrf

                    <div class="mb-3">

                        <label>Name</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                        >

                        @error('name')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Email</label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                        >

                        @error('email')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control"
                        >

                        @error('password')

                            <small class="text-danger">
                                {{ $message }}
                            </small>

                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Confirm Password</label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                        >

                    </div>

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        Register
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection
