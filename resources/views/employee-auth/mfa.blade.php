@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card">

            <div class="card-header">
                <h3>Employee OTP Verification</h3>
            </div>

            <div class="card-body">

                <form method="POST" action="{{ route('employee.mfa.verify') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Enter OTP</label>
                        <input type="text" name="otp" class="form-control">

                        @error('otp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-primary w-100">
                        Verify OTP
                    </button>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
