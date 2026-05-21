@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">

        Employee Register

    </h2>

    <form method="POST"
          action="{{ route('employee.register.submit') }}">

        @csrf

        <div class="mb-3">

            <label>First Name</label>

            <input type="text"
                   name="firstname"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Last Name</label>

            <input type="text"
                   name="lastname"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email"
                   name="email"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input type="password"
                   name="password"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Confirm Password</label>

            <input type="password"
                   name="password_confirmation"
                   class="form-control">

        </div>

        <button class="btn btn-success">

            Register

        </button>

    </form>

</div>

@endsection
