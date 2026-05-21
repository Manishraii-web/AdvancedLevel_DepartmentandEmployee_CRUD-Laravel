\@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">

        Employee Login

    </h2>

    <form method="POST"
          action="{{ route('employee.login.submit') }}">

        @csrf

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

        <button class="btn btn-primary">

            Login

        </button>

    </form>

</div>

@endsection
