@extends('layouts.app')

@section('content')

<h2 class="mb-4">

    Pending Employee Requests

</h2>

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<table class="table table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>

        </tr>

    </thead>

    <tbody>

        @forelse($employees as $employee)

            <tr>

                <td>{{ $employee->id }}</td>

                <td>

                    {{ $employee->firstname }}
                    {{ $employee->lastname }}

                </td>

                <td>{{ $employee->email }}</td>

                <td>

                    <form method="POST"
                          action="{{ route('admin.employees.approve', $employee->id) }}">

                        @csrf
                        @method('PUT')

                        <button class="btn btn-success">

                            Approve

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="4">

                    No Pending Employees

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection
