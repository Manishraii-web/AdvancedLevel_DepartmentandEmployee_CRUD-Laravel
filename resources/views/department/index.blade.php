@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-4">

    <h2>Departments</h2>

    <a href="{{ route('departments.create') }}"
       class="btn btn-primary">

        Add Department

    </a>

</div>

<table class="table table-bordered">

    <thead>

        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

        @forelse($departments as $department)

            <tr>

                <td>{{ $department->id }}</td>

                <td>{{ $department->name }}</td>

                <td>

                    <a href="{{ route('departments.edit', $department->id) }}"
                       class="btn btn-warning btn-sm">

                        Edit

                    </a>

                    <form
                        action="{{ route('departments.destroy', $department->id) }}"
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

                <td colspan="3">

                    No Departments Found

                </td>

            </tr>

        @endforelse

    </tbody>

</table>

{{ $departments->links() }}

@endsection
