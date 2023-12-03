@extends('welcome')

@section('content')
    <div class="container col-5">
        <h1>Create Product</h1>
        <form method="post" action="{{ route('products.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="product_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Customer Name:</label>
                <input type="text" name="customer_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Type:</label>
                <input type="text" name="type" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Price:</label>
                <input type="text" name="price" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="qty" id="" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>

        </form>

    </div>


@endsection
