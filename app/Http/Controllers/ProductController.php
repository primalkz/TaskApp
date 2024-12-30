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

    public function search(Request $req) {
        $productFilter = Product::where('make', 'like', "%$req->search%")->get();
        return view('app', ['products'=>$productFilter]);
    }

    public function exportProducts()
    {
        // Fetch all products
        $products = Product::all();

        // Define the CSV filename
        $filename = "products_" . date('Ymd_His') . ".csv";

        // Set headers for the response
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        // Callback to create CSV content
        $callback = function () use ($products) {
            $file = fopen('php://output', 'w');

            // Add CSV column headers
            fputcsv($file, ['ID', 'Make/Model', 'Description', 'Quantity', 'Price', 'Last Updated']);

            // Add rows of product data
            foreach ($products as $product) {
                fputcsv($file, [
                    $product->id,
                    $product->make,
                    $product->desc,
                    $product->qt,
                    $product->price,
                    $product->updated_at,
                ]);
            }

            fclose($file);
        };

        // Return streamed response
        return response()->stream($callback, 200, $headers);
    }


    public function importProducts(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048', // Ensure the file is a CSV or TXT
        ]);

        // Open the uploaded file
        $file = $request->file('file');
        $handle = fopen($file->getRealPath(), 'r');

        // Read the first row (headers)
        $headers = fgetcsv($handle);

        // Define expected headers
        $expectedHeaders = ['ID', 'Make/Model', 'Description', 'Quantity', 'Price', 'Last Updated'];

        // Check if the headers match
        if ($headers !== $expectedHeaders) {
            fclose($handle);
            return back()->withErrors(['file' => 'Invalid file format. Ensure headers match: ' . implode(', ', $expectedHeaders)]);
        }

        // Prepare for batch insertion
        $products = [];

        // Read and process each row
        while (($row = fgetcsv($handle)) !== false) {
            // Map fields to the Product model
            $products[] = [
                'id' => $row[0],
                'make' => $row[1],
                'desc' => $row[2],
                'qt' => $row[3],
                'price' => $row[4],
                'updated_at' => $row[5],
                'created_at' => now(), // Ensure timestamps are set
            ];
        }

        // Close the file handle
        fclose($handle);

        // Insert all products into the database
        Product::insert($products);

        return redirect('/app')->with('success', 'Products imported successfully.');
    }

}