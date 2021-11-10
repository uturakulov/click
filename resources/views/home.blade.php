@extends('layout')

@section('content')
    <div class="container">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1>{{ $user->name }}</h1>
        <h3>{{ $user->email }}</h3>
        <a href="{{ route('change-view') }}">Change password</a>
    </div>
@endsection
