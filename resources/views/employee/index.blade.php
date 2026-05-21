@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Employees</h2>

    {{-- <a href="{{ route('employees.create') }}"
       class="btn btn-primary">

        Add Employee

    </a> --}}

</div>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Actions</th>

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

                <td>{{ $employee->email }}</td>

                <td>

                    {{ $employee->department->name ?? 'N/A' }}

                </td>

                <td>{{ $employee->salary }}</td>

                <td>

                    <a href="{{ route('employees.edit', $employee->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('employees.destroy', $employee->id) }}"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">

                            Delete

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="7">

                    No Employees Found

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

{{ $employees->links() }}

@endsection
