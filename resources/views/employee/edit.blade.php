@extends('layouts.app')

@section('content')

<h2 class="mb-4">

    Edit Employee

</h2>

<form method="POST"
      action="{{ route('employees.update', $employee->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row">

        <div class="col-md-6 mb-3">

            <label>First Name</label>

            <input
                type="text"
                name="firstname"
                class="form-control"
                value="{{ old('firstname', $employee->firstname) }}"
            >

        </div>

        <div class="col-md-6 mb-3">

            <label>Last Name</label>

            <input
                type="text"
                name="lastname"
                class="form-control"
                value="{{ old('lastname', $employee->lastname) }}"
            >

        </div>

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email', $employee->email) }}"
        >

    </div>

    <div class="mb-3">

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone', $employee->phone) }}"
        >

    </div>

    <div class="mb-3">

        <label>Salary</label>

        <input
            type="number"
            name="salary"
            class="form-control"
            value="{{ old('salary', $employee->salary) }}"
        >

    </div>

    <div class="mb-3">

        <label>Department</label>

        <select
            name="department_id"
            class="form-control"
        >

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                    {{ $employee->department_id == $department->id ? 'selected' : '' }}
                >

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="mb-3">

        <label>Current Image</label>

        <br>

        @if($employee->image)

            <img
                src="{{ asset('storage/' . $employee->image) }}"
                width="100"
            >

        @endif

    </div>

    <div class="mb-3">

        <label>New Image</label>

        <input
            type="file"
            name="image"
            class="form-control"
        >

    </div>

    <button class="btn btn-primary">

        Update Employee

    </button>

</form>

@endsection
