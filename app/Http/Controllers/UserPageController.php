<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Menu; // Ensure the Menu model is imported at the top of the file
use Illuminate\Support\Facades\Session;
use App\Models\Orders;
use App\Models\Testimonials;

class UserPageController extends Controller
{
    public function index(){
        return view('user.dashboard');
    }
    public function menu()
    {
        $menus = Menu::all(); // Ensure the Menu model is imported at the top of the file
        return view('user.menu',compact('menus')); // Adjust the view path as necessary
    }

    public function product()
    {
        $products = Category::all(); // Ensure the Product model is imported at the top of the file
        return view('user.product',compact('products')); // Ensure this view exists
    }

    public function testimoni()
    {
        $testimonials = Testimonials::with('customer')->latest()->paginate(9);
        return view('user.testimoni', compact('testimonials'));
    }

    public function Detail(Category $id)
    {
        $products = $id->products;
        return view('user.Detail',compact('products')); 
    }

    public function payment(Product $id)
    {
        $Orders = [
            'user_id' => auth()->user()->id,
            'product_id' => $id->id,
            'status' => 'pending',
            'total_amount' => $id->price,
        ];
        Session::put('Orders',$Orders);


        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $id->price,
            )
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $user = auth()->user();
        return view('user.payment',compact('id','user','snapToken')); // Ensure this view exists
    }

    public function paymentConfirm(Request $request){
        $Orders = Session::get('Orders');
        $product = Product::find($Orders['product_id']);
        $Orders['status'] = 'Accepted';
        $Orders['address'] = $request->address;
        $Orders['city'] = $request->city;
        $Orders['postal_code'] = $request->postal_code;
        $Orders['start_date'] = now()->addDay();
        $Orders['end_date'] = now()->addDays($product->duration + 1 );

        Orders::create($Orders);
        return redirect('/');
    }

    public function history(){
        $payments = Orders::all();
        return view('user.payment-history',compact('payments'));
    }
}
