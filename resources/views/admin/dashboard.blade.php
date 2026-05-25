@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Admin Dashboard</h2>
       <h3> Welcome, {{Auth::guard('admin')->user()->name}} </h3>

    <form method="POST"
          action="{{ route('admin.logout') }}">

        @csrf

        <button class="btn btn-danger">
            Logout
        </button>

    </form>

</div>

<div class="row">

    <div class="col-md-6">

        <div class="card p-4">

            <h4>Employees</h4>

            <a href="{{ route('employees.index') }}"
               class="btn btn-primary mt-3">

                Manage Employees

            </a>

        </div>

    </div>

    <div class="col-md-6">

        <div class="card p-4">

            <h4>Departments</h4>

            <a href="{{ route('departmenty.index') }}"
               class="btn btn-success mt-3">

                Manage Departments

            </a>

        </div>

    </div>

</div>
<a href="{{ route('employees.pending') }}"
   class="btn btn-warning mt-3">

    Pending Employee Requests

</a>

@endsection
