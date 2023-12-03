<?php

namespace App\Http\Controllers;

use App\Models\OutgoingProduct;
use Illuminate\Http\Request;

class OutgoingProductController extends Controller
{
    public function index(Request $request)
    {
        $query = OutgoingProduct::orderByDesc('id');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where('created_at', 'like', "%{$searchTerm}%");
        }
        $outgoing_products = $query->paginate(7);
        return view('outgoing_products.index', compact('outgoing_products'));
    }

    public function create()
    {
        return view('outgoing_products.create');
    }

    public function store(Request $request)
    {
        OutgoingProduct::create($request->all());

        return redirect()->route('outgoing_products.index')->with('success', 'OutgoingProduct created successfully');
    }

    public function edit($id)
    {
        $product = OutgoingProduct::find($id);
        return view('outgoing_products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = OutgoingProduct::find($id);
        $product->update($request->all());
        return redirect()->route('outgoing_products.index')->with('update', 'OutgoingProduct updated successfully');
    }

    public function destroy($id)
    {
        $product = OutgoingProduct::find($id);
        $product->delete();

        return redirect()->route('outgoing_products.index')->with('delete', 'OutgoingProduct deleted successfully');
    }
}
