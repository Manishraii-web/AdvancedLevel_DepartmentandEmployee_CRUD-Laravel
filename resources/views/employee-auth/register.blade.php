{{-- @extends('layouts.app')

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

@endsection --}}

@extends('layouts.app')

@section('content')
    <h2 class="mb-4">

         Employee Registration Request

    </h2>

    <form method="POST" action="{{ route('employee.register.submit') }}" enctype="multipart/form-data">

        {{-- @csrf --}}

        <div class="row">

            <div class="col-md-6 mb-3">

                <label>First Name</label>

                <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}">

                @error('firstname')
                    <small class="text-danger">

                        {{ $message }}

                    </small>
                @enderror

            </div>

            <div class="col-md-6 mb-3">

                <label>Last Name</label>

                <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}">

                @error('lastname')
                    <small class="text-danger">

                        {{ $message }}

                    </small>
                @enderror

            </div>

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email" name="email" class="form-control" value="{{ old('email') }}">

            @error('email')
                <small class="text-danger">

                    {{ $message }}

                </small>
            @enderror

        </div>

        <div class="mb-3">

            <label>Phone</label>

            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">

            @error('phone')
                <small class="text-danger">

                    {{ $message }}

                </small>
            @enderror

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class ="form-control">
        </div>

        <label>Department</label>

        <select name="department_id" class="form-control">

            <option value="">

                Select Department

            </option>

            @foreach ($departments as $department)
                <option value="{{ $department->id }}">

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

            <input type="file" name="image" class="form-control">

            @error('image')
                <small class="text-danger">

                    {{ $message }}

                </small>
            @enderror

        </div>

        <button class="btn btn-success">

            Register Employee

        </button>

    </form>
@endsection

