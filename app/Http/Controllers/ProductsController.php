<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;

use Request;

class ProductsController extends Controller
{
   

    public function index()

    {
        // get all products
       $products = (Product::all());
        
       // get all category
       $categories = DB::table('categories')
            ->select('name')
            ->get();

       

        // check sort
        if (Request::get('sort') == 'name')
        {
            $products = Product::orderBy('name', 'asc')
                                        ->get();
        }
        elseif (Request::get('sort') == 'price'){
            $products = Product::orderBy('price', 'asc')
                                        ->get();
        }

        if (Request::get('filterby'))
        {
            $products = Product::where('category_name', Request::get('filterby'))
                                        ->get();
        }
        


       return view('products.index', ['products' => $products, 'categories' => $categories]);
    }

    public function create()

    {
        $categories = DB::table('categories')
            ->select('name')
            ->get();
        
        return view('products.create', ['categories' => $categories]);
    }


    public function store()

    {

        
        request()->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_name' ,
            'image' => 'required',
        ]);
         
        Product::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request('price'),
            'category_name' => request('category_name'),
            'image' => request('image'),

        ]);

        return redirect('/products');

    }

    public function delete($id)

    {
        DB::delete('delete from products where id = ? ', [$id]);
        return redirect('/products')->with('success', 'Product Deleted'); 
    }

    // public function destroy(int $id)

    // {
    //     $product = product::find($id);
    //     $product->delete();

    //     return redirect('/products'); 
    // }

}
 