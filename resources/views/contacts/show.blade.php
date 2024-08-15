@extends('layouts.app')
@section('content')
<div class="container">
    <div class="title text-center col-md-12 my-2">
        <h2>Contact Details</h2>
    </div>
    <div class="form-group">
        <p>Name: {{ $contact->name }}</p>
    </div>

    <div class="form-group">
        <p>Email: {{ $contact->email }}</p>
    </div>

    <div class="form-group">
        <p>Phone: {{ $contact->phone }}</p>
    </div>

    <div class="form-group">
        <p>Address: {{ $contact->address }}</p>
    </div>
    <div class="form-group">
        <p>Created: {{ $contact->created_at }}</p>
    </div>
    <a href="{{ route('contacts.index', $contact->id) }}" class="btn btn-info">Home</a>
</div>
@endsection
