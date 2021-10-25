<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\View;

class ProductsController extends Controller
{
    public $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Example it you wanna use paginate ( http://localhost:8000/api/products?pagination=10 )
     * @pagination param optional
     * If you wanna get all data without paginattion (http://localhost:8000/api/products)
     * Example sort data by name   : http://localhost:8000/api/products?sort=price
     * Example sort data by price  : http://localhost:8000/api/products?sort=price
     * Example sort data by category http://localhost:8000/api/products?sort=category
     */
    public function index()
    {
        $pagination = null;
        $fieldSort = '';

        request()->has('pagination') ? $pagination = request()->pagination : null;

        $products =  $this->repository->allProducts($pagination);

        return View::make('products.index', compact('products'));
    }


    // public function getSingle($idProduct) {

    //     $results =  $this->repository->find($idProduct);

    //     return response()->json(['product'=>$results],200);
    // }

    public function CreateProduct()
    {

        return View::make('products.create');
        
    }

    public function Store(StoreProductRequest $request)
    {
        $results =  $this->repository->storeProduct($request);
        return redirect('/');
    }


    public function Destory($id)
    {
        try {
            $statusDestory = Product::findOrFail($id)->delete();

            if($statusDestory) {
                return redirect('/')->with('success', 'Product Deleted'); 
            }

        } catch (\Exception $e) {
            throw new Exception('somthing error when delete this product check and  try again');
        } 
    }
}
 