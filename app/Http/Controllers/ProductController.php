<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $section)
    {
		if (!in_array($section, ['men', 'women', 'kids']))
			abort(404);

		$categories = DB::table('categories')->get();
		$products = DB::table('products')->where('type', $section)->get();
		if ($request->has('category'))
			$products = $products->where('category', $request->query('category'));
echo $request->query('category');

		return view('product.index', [
			'section' => strtoupper($section),
			'products' => $products,
			'categories' => $categories
		]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('product.create', [
			'categories' => DB::table('categories')->get()
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
		$validated = $request->validated();

		DB::table('products')->insert([
			'name' => $validated['name'],
			'slug' => Str::slug($validated['name'], '-'),
			'description' => $validated['description'],
			'type' => $validated['type'],
			'category' => $validated['category'],
			'sizes' => implode(',', $validated['sizes']),
			'img_path' => $validated['images']->store('images', 'public'),
			'price' => $validated['price']
		]);
		return back()->with('status', 'Successfully added a new product!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function	show($slug)
	{
		$product = DB::table('products')->where('slug', $slug)->first();
		if (empty($product))
			abort(404);

		$product->sizes = explode(",", $product->sizes);
		return view('product.show', [
			'product' => $product
		]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$product = DB::table('products')->find($id);
		if (empty($product))
			abort(404);

		$product->sizes = explode(",", $product->sizes);
		return view('product.edit', [
			'product' => $product
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {
		$validated = $request->validated();

		DB::table('products')->update([
			'sizes' => implode(',', $validated['sizes'])
		]);
		echo "updated!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
	{
		// Return number of deleted rows.
		$count = DB::table('products')->where('id', $id)->delete();
		return view('product.destroy');
    }
}
