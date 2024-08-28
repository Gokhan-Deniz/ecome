<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index(){
      $products = Product::latest()->get();
      return view('admin.allproducts', compact('products'));
    }

    public function AddProduct(){
      $categories = Category::latest()->get();
      $subcategories =  Subcategory::latest()->get();
      return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request){
      $request->validate([
        'product_name' => 'required',
        'price' => 'require',
        'quantity' => 'require',
        'product_short_des' => 'require',
        'product_long_des' => 'require',
        'product_category_id' => 'require',
        'product_subcategory_id' => 'require',
        'product_image' => 'require',
        //'product_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      $image=$request->file('product_img');
      $img_name =hexdec(uniqid()).'.'. $image->getClientOrginalExtension();
      $request->product_img->move(public_path('upload'),$img_name);
      $img_url='upload/'.$img_name;

      $category_id=$request->product_category_id;
      $subcategory_id=$request->product_subcategory_id;

      $category_name= Category::where('id', $category_id)->value('category_name');
      $subcategory_name= SubCategory::where('id', $subcategory_id)->value('subcategory_name');

      Product::insert([
        'product_name' => $request->product_name,
        'product_short_des' => $request->product_short_des,
        'product_long_des' => $request->product_long_des,
        'price' => $request->price,
        'product_category_name' => $category_name,
        'product_subcategory_name' => $subcategory_name,
        'product_category_id' => $request->product_category_id,
        'product_subcategory_id' => $request->product_subcategory_id,
        'product_img' => $img_url,
        'quantity' => $request->quantity,
        'slug' => strtolower(str_replace(' ','-', $request->product_name)),
      ]);

      Category::where('id', $category_id)->increment('product_count',1);
      Subcategory::where('id', $subcategory_id)->increment('product_count',1);

      return redirect()->route('allproducts')->with('message','Ürün başarıyla eklendi!');
    }

    public function EditProduct($id){
      $productinfo=Product::findOrFail($id);

      return view('admin.editproduct', compact('productinfo'));
    }

    public function UpdateProduct(Request $request){
      $productid=$request->id;
      $request->validate([
        'product_name' => 'required',
                          'price' => 'required',
                          'quantity' => 'requireds',
                          'product_short_des' => 'required',
                          'product_long_des' => 'required',
      ]);

      Product::findOrFail($productid)->update([
        'product_name' => $request->product_name,
        'product_short_des' => $request->product_short_des,
        'product_long_des' => $request->product_long_des,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'slug' => strtolower(str_replace(' ','-', $request->product_name)),
      ]);

      return redirect()->route('allproducts')->with('message','Ürün başarıyla güncellendi!');
    }

    public function DeleteProduct($id){
      
      $cat_id=Product::where('id', $id)->value('product_category_id');
      $subcat_id=Product::where('id', $id)->value('product_subcategory_id');

      Product::findOrFail($id)->delete();

      Category::where('id', $cat_id)->decrement('product_count', 1);
      Subcategory::where('id', $subcat_id)->decrement('product_count', 1);

      return redirect()->route('allproducts')->with('message','Ürün başarıyla silindi!');
    }
}
