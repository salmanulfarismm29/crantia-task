<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Validation\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = DB::table('products')->select('id', 'name', 'discription', 'image')->get();

        return view('products.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'productname' => 'required|max:100',
                'productdesc' => 'required|max:255',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:4000',
            ],
            [
                'productname.required' => 'Product name is required',
                'productname.max' => 'Product name maximum 100 characters',
                'productdesc.required' => 'Product discription is required',
                'productdesc.max' => 'Product discription maximum 255 characters',
            ]
        );

        $product = new Products();
        $product->name = $request->input('productname');
        $product->discription = $request->input('productdesc');

        if (!empty($request->file('image'))) {
            $fileName = time() . '_' . Str::random(5) . '.' . $request->file('image')->extension();
            $img = Image::make($request->file('image')->path());
            $img->fit(config('crantia.products.thumb_width'), (config('crantia.products.thumb_height')));

            $img->save(Storage::disk('public')->path(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $fileName), 100);
            $img->save(Storage::disk('public')->path(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $fileName, File::get($request->file('image'))));

            $product->image = $fileName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Products::find($id);
        $product->image = empty($product->image) ? "" : asset('storage/' . config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image);

        return view('products.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Products::find($id);
        $product->image = empty($product->image) ? "" : asset('storage/' . config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'productname' => 'required|max:100',
                'productdesc' => 'required|max:255',
                'image' => 'nullable|mimes:jpeg,png,jpg|max:4000',
            ],
            [
                'productname.required' => 'Product name is required',
                'productname.max' => 'Product name maximum 100 characters',
                'productdesc.required' => 'Product discription is required',
                'productdesc.max' => 'Product discription maximum 255 characters',
            ]
        );

        $product = Products::find($id);
        $product->name = $request->input('productname');
        $product->discription = $request->input('productdesc');

        if (!empty($request->file('image'))) {

            if ($product->image) {
                if (Storage::disk('public')->exists(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image)) {
                    Storage::disk('public')->delete(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image);
                }
                if (Storage::disk('public')->exists(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $product->image)) {
                    Storage::disk('public')->delete(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $product->image);
                }
            }

            $fileName = time() . '_' . Str::random(5) . '.' . $request->file('image')->extension();
            $img = Image::make($request->file('image')->path());
            $img->fit(config('crantia.products.thumb_width'), (config('crantia.products.thumb_height')));

            $img->save(Storage::disk('public')->path(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $fileName), 100);
            $img->save(Storage::disk('public')->path(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $fileName, File::get($request->file('image'))));

            $product->image = $fileName;
        }

        $product->save();
        return redirect()->route('products.index')->with('success','Product Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);

        if ($product) {
            if ($product->image) {

                if (Storage::disk('public')->exists(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image)) {
                    Storage::disk('public')->delete(config('crantia.crantiadir') . "/" . config('crantia.products.product') . $product->image);
                }
                if (Storage::disk('public')->exists(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $product->image)) {
                    Storage::disk('public')->delete(config('crantia.crantiadir') . "/" . config('crantia.products.productthumb') . $product->image);
                }
            }

            $product->delete();

            return redirect()->back()->with('success', 'Product Delete');
        }

        return redirect()->back()->with('error', 'Product not found');
    }
}
