@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h1 class="text-center mb-5">

        Employee Management System

    </h1>

    <div class="row">

        <!-- Admin Login -->

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>Admin</h3>

                <a href="{{ route('login') }}"
                   class="btn btn-primary mt-3">

                    Admin Login

                </a>

            </div>

        </div>

        <!-- Employee Login -->

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>Employee Login</h3>

                <a href="{{ route('employee.login') }}"
                   class="btn btn-success mt-3">

                    Employee Login

                </a>

            </div>

        </div>

        <!-- Employee Register -->

        <div class="col-md-4">

            <div class="card p-4 text-center">

                <h3>Employee Register</h3>

                <a href="{{ route('employee.register') }}"
                   class="btn btn-dark mt-3">

                    Register

                </a>

            </div>

        </div>

    </div>

</div>

@endsection
