<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function add(Request $req) {
        $product = new Product;
        $product->make = $req->productmake;
        $product->desc = $req->productdesc;
        $product->qt = $req->productqt;
        $product->price = $req->productprice;
        $product->save();
        
        if($product){
            return redirect('app');
        } else {
            echo "product not added";
        }
    }

    public function getProducts(Request $req) {
        $products = Product::all();
        return $products;
    }

    public function delete($id){
        // $isDeleted = Student::where(id, $id)->delete();
        $isDeleted = Product::destroy($id);
        if($isDeleted){
            return redirect('app');
        }
    }
    
    public function edit($id){
        $product = Product::find($id);
        return view('editform', ['product'=>$product]);
    }

    public function editProduct(Request $req, $id){
        $product = Product::find($id);
        $product->make = $req->productmake;
        $product->desc = $req->productdesc;
        $product->qt = $req->productqt;
        $product->price = $req->productprice;
        
        if($product->save()){
            return redirect('app');
        }
        else {
            return "update failed";
        }
    }
}