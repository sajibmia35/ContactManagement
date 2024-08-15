@extends('layouts.app')
@section('content')
<div class="container">
    @session('status')
        <div class="alert alert-success text-center my-2">
            {{session('status')}}
        </div>
    @endsession
    <div class="row">
        <div class="title text-center col-md-12 my-2">
            <h1>{{__('Contact Management')}}</h1>
        </div>
        <div class="col-md-7">
            <a href="{{ route('contacts.create') }}" class="btn btn-primary mb-3">Create New Contact</a>
        </div>
        <div class="col-md-5">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" name="search" placeholder="Search By Name or Email" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>
                    <a
                        href="{{ route('contacts.index', ['sort' => 'name', 'order' => $sortField === 'name' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                        Name
                    </a>
                </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>
                    <a
                        href="{{ route('contacts.index', ['sort' => 'created_at', 'order' => $sortField === 'created_at' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}">
                        Created At
                    </a>
                </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->address }}</td>
                    <td>{{ $contact->created_at}}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No contacts found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $contacts->links() }}
    </div>
@endsection
