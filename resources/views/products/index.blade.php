
@extends('welcome')

@section('content')
    <div class="container col-5 mt-2">
        @if(session('success'))
            <div class="alert alert-success" id="flash-message">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 5000);
            </script>
        @elseif(session('delete'))
            <div class="alert alert-danger" id="flash-message">
                {{ session('delete') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 5000);
            </script>
        @elseif(session('update'))
            <div class="alert alert-primary" id="flash-message">
                {{ session('update') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('flash-message').style.display = 'none';
                }, 5000);
            </script>
        @endif
    </div>


    <h3 class="mb-4">Product List <a href="{{ route('products.create') }}" class="btn btn-info float-right">Add Product</a></h3>

    <form action="{{ route('products.index') }}" method="GET" class="form-inline mb-3">
        <div class="form-group mr-2">
            <label for="search" class="mr-2">Search by Created Date:</label>
            <input type="date" name="search" id="search" class="form-control" value="{{ request('search') }}">
        </div>
        <button type="submit" class="btn btn-info">Search</button>
        @if(request()->has('search'))
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear</a>
        @endif
    </form>

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->customer_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->qty }}</td>
                <td>{{ $product->created_at->diffForHumans() }}</td>
                <td>{{ $product->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links('pagination::bootstrap-4') }}
@endsection
