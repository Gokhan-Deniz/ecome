<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingInfo;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\paper;

class ClientController extends Controller
{
    public function CategoryPage(){
        return view('user_template.category');
    }

    public function SingleProduct($id){
        $product=Product::findOrFail($id);
        return view('user_template.product',compact('product'));
    }

    public function AddToCart(){
        $userid = Auth::id();
        $cart_items = Cart::where('user_id',$userid)->get(); 
        return view('user_template.addtocart', compact('cart_items'));
    }

    public function AddProductToCart(Request $request){
        $product_price=$request->price;
        $quantity=$request->quantity;
        $price= $product_price* $quantity;
        Cart::insert([
            'product_id'=>$request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$price,
        ]);

        return redirect()->route('addtocart')->with('message','Sepetinize eklendi.');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();

        return redirect()->route('addtocart')->with('message','Başarılı bir şekilde sepetinizden sildiniz.');
    }

    public function GetShippingAddress(){
        return view('user_template.shippingaddress');
    }

    public function AddShippingAddress(Request $request){
        ShippingInfo::insert([
            'user_id'=>Auth::id(),
            'phone_number'=>$request->phone_number,
            'city_name'=>$request->city_name,
            'postal_code'=>$request->postal_code,
            'street_info'=>$request->street_info,
        ]);

        return redirect()->route('checkout');
    }

    public function Checkout(){
        $userid= Auth::id();
        $cart_items=Cart::where('user_id',$userid)->get();
        $shipping_address= ShippingInfo::where('user_id',$userid)->first();
        return view('user_template.checkout', compact('cart_items','shipping_address'));
    }

    public function PlaceOrder(){
        $userid=Auth::id();
        $shipping_address= ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item){
            Order::insert([
                'userid'=>$userid,
                'Shipping_phoneNumber'=>$shipping_address->phone_number,
                'shipping_city'=>$shipping_address->city_name,
                'street_info'=>$shipping_address->street_info,
                'shipping_postalcode'=>$shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity'=>$item->quantity,
                'total_price' => $item->price,
            ]);
            $id=$item->id;
            Cart::findOrFail($id)->delete();
        }

        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'Başarılı bir şekilde sipariş verdiniz.');

    }

    public function UserProfile(){
        return view('user_template.userprofile');
    }

    public function PendingOrders(){
        $pending_orders =Order::where('status','pending')->latest()->get();
        return view('user_template.pendingorders', compact('pending_orders'));
    }

    public function History(){
        return view('user_template.history');
    }

    public function NewRelease(){
        return view('user_template.newrelease');
    }

    public function Paper(){
        return view('user_template.paper');
    }

    public function AddPaper(Request $request){
        Paper::insert([
            'user_id'=>Auth::id(),
            'TC_No'=>$request->TC_No,
            'Soyad'=>$request->Soyad,
            'Ad'=>$request->Ad,
            'Baba_ad'=>$request->Baba_ad,
            'Dogum_yeri'=>$request->Dogum_yeri,
            'Dogum_tarih'=>$request->Dogum_tarih,
            'Ev'=>$request->Ev,
            'Sicil'=>$request->Sicil,
        ]);

        return redirect()->route('userprofile')->with('message','Başarılı şekilde ruhsat başvurusu yaptınız.');
    }

    public function CustomerService(){
        return view('user_template.customerservice');
    }
}
