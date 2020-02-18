<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::where('parent_id', 0)->get();
        return view('admin.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::where('parent_id', 0)->get();
        return view('admin.product.new', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
                            'title' => 'required','description' => 'required','meta_keyword' => 'required','meta_title' => 'required','meta_description' => 'required',                            
                        ]);
        
        $user = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'meta_keyword' => $request->meta_keyword,
            'meta_description' => $request->meta_description,
            'meta_title' => $request->meta_title,
        ]);

         return redirect('product')->with('status', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect('product');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $products=Product::where('parent_id', 0)
                    ->where('id',"<>",$product->id)
                    ->get();
        return view('admin.product.edit',compact('product','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
                            'title' => 'required',
                            'description' => 'required',
                            'meta_keyword' => 'required',
                            'meta_title' => 'required',
                            'meta_description' => 'required'
                        ]);

        $product->title           =$request->title;
        $product->description     =$request->description;
        $product->meta_keyword    =$request->meta_keyword;
        $product->meta_title      =$request->meta_title;
        $product->meta_description=$request->meta_description;
        $product->parent_id       =$request->parent_id;


        $product->save();

        return redirect('product')->with('status', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //dd($product);
        if($product->childs->isNotEmpty())
            return redirect('product')->with('status', 'Can\'t delete product. Please delete child element!');  
              
        $product->delete();
        return redirect('product')->with('status', 'Product Deleted!');
    }

     /**
     * Display the product details
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $product=Product::where('id',$id)->first();
        return view('product.index',compact('product'));
    }
}
