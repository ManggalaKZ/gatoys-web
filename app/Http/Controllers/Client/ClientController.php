<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Shop;
use App\Models\Order;
use App\Models\OrderDetail;
use Validator;
use Str;

class ClientController extends Controller
{
    public function index()
    {
        $shop = Shop::first();

        // if (!$shop) {
        //     return redirect()->route('register');
        // }

        $data = [
            'shop' => $shop,
            'product' => Product::with(['category', 'productImage'])
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get(),
            'category' => Category::orderBy('id', 'DESC')->take(4)->get(),
            'title' => 'Home'
        ];

        return view('client.index', $data);
    }

    public function products()
    {
        $data = [
            'shop' => Shop::first(),
            'product' => Product::with(['category', 'productImage'])
                ->orderBy('id', 'DESC')
                ->paginate(16),
            'category' => Category::orderBy('id', 'DESC')->get(),
            'title' => 'Products'
        ];

        return view('client.products', $data);
    }

    public function searchProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('clientHome')->withErrors($validator)->withInput();
        } else {
            $search = $request->product;

            $data = [
                'title' => 'Result',
                'shop' => Shop::first(),
                'product' => Product::with(['category', 'productImage'])
                    // UBAH 'LIKE' MENJADI 'ILIKE' DI BARIS INI
                    ->where('title', 'ILIKE', '%' . $search . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(20)
                    ->withQueryString(),
                'search' => $search
            ];

            return view('client.productSearch', $data);
        }
    }
    public function category()
    {
        $data = [
            'shop' => Shop::first(),
            'category' => Category::orderBy('id', 'DESC')->paginate(12),
            'title' => 'Products'
        ];

        return view('client.category', $data);
    }

    public function categoryProducts($category)
    {
        $data = [
            'shop' => Shop::first(),

            'category' => Category::where('name', $category)->first(),
            'title' => 'Category - ' . str_replace('-', ' ', ucwords($category))
        ];

        return view('client.categoryProducts', $data);
    }

    public function productDetail($products)
    {
        $products = trim($products);
        $product = Product::with([
            'category.product.productImage',
            'category.product.category',
            'productImage'
        ])
            ->where('title', $products)
            ->orWhere('title', 'LIKE', $products . '%')
            ->first();

        if (!$product) {
            abort(404, 'Product not found');
        }

        if ($product->category && $product->category->product->count() > 1) {
            $recomendationProducts = $product->category->product->take(8);
        } else {
            $recomendationProducts = Product::with(['category', 'productImage'])
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();
        }

        $data = [
            'shop' => Shop::first(),
            'product' => $product,
            'recomendationProducts' => $recomendationProducts,
            'title' => str_replace('-', ' ', ucwords($product->title))
        ];

        return view('client.productDetail', $data);
    }

    public function checkout()
    {
        $data = [
            'shop' => Shop::first(),
            'title' => 'Checkout'
        ];

        return view('client.checkout', $data);
    }

    public function checkoutSave(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('clientCheckout')->withErrors($validator)->withInput();
        } else {
            $order_code = Str::random(3) . '-' . Date('Ymd');

            if (session('cart')) {
                $total = 0;
                foreach ((array) session('cart') as $id => $details) {
                    $total += $details['price'] * $details['quantity'];

                    $data[$id] = [
                        'order_code' => $order_code,
                        'title' => $details['title'],
                        'price' => $details['price'],
                        'quantity' => $details['quantity'],
                    ];
                }

                $shop = Shop::first();

                Order::create([
                    'shop_id' => $shop->id,
                    'order_code' => $order_code,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'note' => $request->note,
                    'total' => $total,
                    'status' => 0
                ]);

                OrderDetail::insert($data);

                session()->forget('cart');

                return redirect()->route('clientOrderCode', $order_code);
            }
        }
    }

    public function successOrder($order_code)
    {
        $data = [
            'shop' => Shop::first(),
            'order_code' => $order_code,
            'title' => 'Checkout'
        ];

        return view('client.success-order', $data);
    }

    public function checkOrder()
    {
        $data = [
            'shop' => Shop::first(),
            'title' => 'Check Order'
        ];

        return view('client.check-order', $data);
    }

    public function checkOrderStatus(Request $request)
    {
        $order = Order::where('order_code', $request->order_code)->first();
        $shop = Shop::first();

        if ($order) {
            $data = [
                'shop' => $shop,
                'order' => $order,
                'orderDetail' => OrderDetail::where('order_code', $request->order_code)->get(),
                'title' => 'Check Order'
            ];
            return view('client.check-order', $data);
        }

        $data = [
            'shop' => $shop,
            'title' => 'Check Order'
        ];

        return view('client.check-order', $data);
    }

    public function about()
    {
        $data = [
            'shop' => Shop::first(),
            'title' => 'About'
        ];

        return view('client.about', $data);
    }
}
