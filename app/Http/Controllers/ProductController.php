<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('section')->get();
        $sections = Section::select('id', 'name')->get();

        return view('products.index', compact('products', 'sections'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        $product = Product::create($data);

        if ($product) {
            return redirect()->route('products.index')->with('success', 'تمت الإضافة بنجاح');
        } else {
            return redirect()->back()->with('error', 'فضلت عملية الإضافة');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $sections = Section::select('id', 'name')->get();

        $view = view('products._edit', compact('product', 'sections'))->render();

        return response()->json([
            'data' => $view,
            'status' => 'success',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = $product->delete();

        if ($product) {
            return redirect()->route('products.index')->with('success', 'تم المسح بنجاح');
        } else {
            return redirect()->back()->with('error', 'فضلت عملية المسح');
        }
    }

    public function getProductData($section_id)
    {
        // get all products with section id 
        $sectionProducts = Product::where('section_id', $section_id)->get();

        return response()->json([
            'data' => $sectionProducts,
            'status' => 'success',
        ]);
    }
}
