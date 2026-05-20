@extends('layouts.app')

@section('content')

<h2 class="mb-4">Create Department</h2>

<form method="POST"
      action="{{ route('departments.store') }}">

    @csrf

    <div class="mb-3">

        <label>Name</label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}"
        >

        @error('name')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <button class="btn btn-success">

        Create

    </button>

</form>

@endsection
