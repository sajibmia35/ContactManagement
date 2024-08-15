@extends('layouts.app')
@section('content')
<div class="container">
    <div class="title text-center col-md-12 my-2">
        <h2>Edit Contact</h2>
    </div>

    <form action="{{route('contacts.update', $contact->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $contact->name }}">
            @error('name')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}">
            @error('email')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $contact->phone }}">
            @error('phone')
                <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-group">
                <label>Address:</label>
                <textarea id="address" name="address" class="form-control">{!! $contact->address !!}</textarea>
                @error('address')
                    <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>n>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>
@endsection
