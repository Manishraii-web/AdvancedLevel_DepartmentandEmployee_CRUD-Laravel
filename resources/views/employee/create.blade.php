@extends('layouts.app')

@section('content')

<h2 class="mb-4">

    Create Employee

</h2>

<form method="POST"
      action="{{ route('employees.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div class="row">

        <div class="col-md-6 mb-3">

            <label>First Name</label>

            <input
                type="text"
                name="firstname"
                class="form-control"
                value="{{ old('firstname') }}"
            >

            @error('firstname')

                <small class="text-danger">

                    {{ $message }}

                </small>

            @enderror

        </div>

        <div class="col-md-6 mb-3">

            <label>Last Name</label>

            <input
                type="text"
                name="lastname"
                class="form-control"
                value="{{ old('lastname') }}"
            >

            @error('lastname')

                <small class="text-danger">

                    {{ $message }}

                </small>

            @enderror

        </div>

    </div>

    <div class="mb-3">

        <label>Email</label>

        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email') }}"
        >

        @error('email')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label>Phone</label>

        <input
            type="text"
            name="phone"
            class="form-control"
            value="{{ old('phone') }}"
        >

        @error('phone')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label>Salary</label>

        <input
            type="number"
            name="salary"
            class="form-control"
            value="{{ old('salary') }}"
        >

        @error('salary')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label>Department</label>

        <select
            name="department_id"
            class="form-control"
        >

            <option value="">

                Select Department

            </option>

            @foreach($departments as $department)

                <option
                    value="{{ $department->id }}"
                >

                    {{ $department->name }}

                </option>

            @endforeach

        </select>

        @error('department_id')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <div class="mb-3">

        <label>Image</label>

        <input
            type="file"
            name="image"
            class="form-control"
        >

        @error('image')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <button class="btn btn-success">

        Create Employee

    </button>

</form>

@endsection
