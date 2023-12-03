
@extends('welcome')

@section('content')


    <h3 class="mb-4">History List </h3>

    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">Incoming Products Total</th>
            <th scope="col">Outgoing Products Total</th>
            <th scope="col">Profit</th>
        </tr>
        </thead>
        <tbody>
            <td>{{ $product_total  }}</td>
            <td>{{ $out_products_total  }}</td>
            <td>{{ $total_formatted_new  }}</td>
        </tbody>
    </table>
@endsection
