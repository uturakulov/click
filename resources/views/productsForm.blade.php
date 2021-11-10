@extends('layout')

@section('content')
    <div style="width: 80%; margin:auto">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <h1 class="text-center m-5">Products</h1>
        @if ($page == 'create')
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                class="w-50 m-auto">
                {{ csrf_field() }}
                <input type="text" name="name" class="form-control">
                <textarea name="description" cols="30" rows="10" class="form-control"></textarea>
                <input type="text" name="price" class="form-control">
                <select name="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                    @endforeach
                </select>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <input type="file" name="image" class="form-control">
                <button type="submit">Submit</button>
            </form>
        @else
            <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST"
                enctype="multipart/form-data" class="w-50 m-auto">
                @method('PUT')
                {{ csrf_field() }}
                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                <textarea name="description" cols="30" rows="10"
                    class="form-control">{{ $product->description }}</textarea>
                <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                <select name="user_id" class="form-control">
                    <option value="{{ $product->user_id }}" selected>
                        {{ $product->user->first_name . ' ' . $product->user->last_name }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name }}</option>
                    @endforeach
                </select>
                <select name="category_id" class="form-control">
                    <option value="{{ $product->category_id }}" selected>
                        {{ $product->category->title }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <input type="file" name="image" class="form-control">
                <button type="submit">Submit</button>
            </form>
        @endif

    </div>
@endsection
