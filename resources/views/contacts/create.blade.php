@extends('layouts.app')
@section('content')
<div class="container">
    <div class="title text-center col-md-12 my-2">
        <h2>{{ __('Create New Contact')}}</h2>
    </div>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" id="name" class="form-control">
            @error('name')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" id="email" class="form-control">
            @error('email')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control">
            @error('phone')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Address:</label>
            <textarea id="address" name="address" class="form-control">
            </textarea>
            @error('address')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Contact</button>
    </form>
</div>
@endsection
