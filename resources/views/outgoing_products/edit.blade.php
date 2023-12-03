@extends('welcome')

@section('content')
    <div class="container col-5">
        <h1>Edit Outgoing Product</h1>
        <form method="post" action="{{ route('outgoing_products.update', $product->id) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="product_name" value="{{ $product->product_name  }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Customer Name:</label>
                <input type="text" name="customer_name" value="{{ $product->customer_name  }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Type:</label>
                <input type="text" name="type" class="form-control" value="{{ $product->type  }}">
            </div>
            <div class="form-group">
                <label for="description">Price:</label>
                <input type="text" name="price" id="" class="form-control" value="{{ $product->price  }}">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="qty" id="" class="form-control" value="{{ $product->qty  }}">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('outgoing_products.index') }}" class="btn btn-secondary">Back to Outgoing Product List</a>

        </form>

    </div>


@endsection
