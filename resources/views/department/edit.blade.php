@extends('layouts.app')

@section('content')

<h2 class="mb-4">Edit Department</h2>

<form method="POST"
      action="{{ route('departments.update', $department->id) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">

        <label>Name</label>

        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name', $department->name) }}"
        >

        @error('name')

            <small class="text-danger">

                {{ $message }}

            </small>

        @enderror

    </div>

    <button class="btn btn-primary">

        Update

    </button>

</form>

@endsection
