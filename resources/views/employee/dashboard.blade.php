@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Employee Dashboard</h2>

    <form method="POST"
          action="{{ route('employee.logout') }}">

        @csrf

        <button class="btn btn-danger">

            Logout

        </button>

    </form>

</div>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>

        </tr>

    </thead>

    <tbody>

        @forelse($employees as $employee)

            <tr>

                <td>{{ $employee->id }}</td>

                <td>

                    @if($employee->image)

                        <img
                            src="{{ asset('storage/' . $employee->image) }}"
                            width="60"
                            height="60"
                        >

                    @endif

                </td>

                <td>

                    {{ $employee->firstname }}
                    {{ $employee->lastname }}

                </td>

                <td>

                    {{ $employee->email }}

                </td>

                <td>

                    {{ $employee->department->name ?? 'N/A' }}

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5">

                    No Employees Found

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

@endsection
