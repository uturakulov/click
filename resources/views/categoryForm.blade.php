@extends('layout')

@section('content')
    <div style="width: 80%; margin:auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="text-center m-5">Categories</h1>
        @if ($page == 'create')
            <form action="{{ route('categories.store') }}" method="POST" class="w-50 m-auto">
                {{ csrf_field() }}
                <input type="text" name="title" class="form-control">
                <button type="submit">Submit</button>
            </form>
        @else
            <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST"
                enctype="multipart/form-data" class="w-50 m-auto">
                @method('PUT')
                {{ csrf_field() }}
                <input type="text" name="title" class="form-control" value="{{ $category->title }}">
                <button type="submit">Submit</button>
            </form>
        @endif

    </div>
@endsection
