<?php

namespace App\Http\Controllers;

use App\Models\OutgoingProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public  function  index()
    {
        $product_total = Product::sum('price');
        $out_products_total = OutgoingProduct::sum('price');
        $total = $out_products_total - $product_total;

        if ($out_products_total > $product_total) {
            $total_formatted_new = '-'.number_format(abs($total), 0, '', '');
        } elseif ($out_products_total < $product_total) {
            $total_formatted_new = number_format(abs($total), 0, '', '');
        } else {
            $total_formatted_new = '±'.number_format(abs($total), 0, '', '');
        }

        return view('history', compact('out_products_total','product_total', 'total_formatted_new'));
    }
}
