<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $perPage = $request->input('perPage', 5); // Default to 5 if not specified

        $products = Product::where('name', 'LIKE', "%$search%")
                        ->orWhere('weight', 'LIKE', "%$search%")
                        ->orWhere('price', 'LIKE', "%$search%")
                        ->orWhere('condition', 'LIKE', "%$search%")
                        ->orWhere('stock', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->paginate($perPage);

        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'condition' => 'required|string',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $product = new Product($request->all());
        $product->user_id = Auth::id();
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('products.index')->with('error', 'Unauthorized action.');
        }
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('products.index')->with('error', 'Unauthorized action.');
        }

        $request->validate([
            'image' => 'required|string',
            'name' => 'required|string',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'condition' => 'required|string',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('products.index')->with('error', 'Unauthorized action.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
    public function allProducts()
    {
        $products = Product::all();
        return view('products.products-all', compact('products'));
    }
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
    // public function show(Product $product)
    // {
    //     return view('transactions.checkout', compact('product'));
    // }


    public function checkout(Request $request, Product $product)
    {
        $request->validate([
            'no_invoice' => 'required|string',
            'admin_fee' => 'required|numeric',
            'kode_unik' => 'required|integer',
            'metode_pembayaran' => 'required|string',
        ]);

        $total_product_price = $product->price;
        $total = $total_product_price + $request->admin_fee + $request->kode_unik;

        $transaction = new Transaction([
            'no_invoice' => $request->no_invoice,
            'admin_fee' => $request->admin_fee,
            'kode_unik' => $request->kode_unik,
            'total' => $total,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status' => 'UNPAID',
            'expired_at' => Carbon::now()->addDays(1),
        ]);

        $transaction->user_id = Auth::id();
        $transaction->product_id = $product->id;
        $transaction->save();

        return redirect()->route('products.checkout', $product->id)->with('success', 'Checkout successful.');
    }

    public function showCheckout(Product $product)
    {
        $user = Auth::user();
        $transaction = Transaction::where('product_id', $product->id)
                                ->where('user_id', $user->id)
                                ->first();

        return view('transactions.checkout', compact('product', 'transaction'));
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

}
