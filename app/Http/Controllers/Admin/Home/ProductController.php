<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\UploadsImages;
 use Illuminate\Support\Str;
class ProductController extends Controller
{
        use UploadsImages;

      public function index()
    {
$products = Product::latest()->take(3)->get();
        // dd($productss);
        return view('admin.frontend.home.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.frontend.home.products.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'price' => 'required|string',
        'discount_price' => 'nullable|string',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $slug = $this->generateUniqueSlug($request->name);

    $path = $this->uploadImage($request->file('image'), 'products');

    Product::create([
        'name' => $request->name,
        'slug' => $slug,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
        'image' => $path ?? null,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
}


    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', compact('products'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('admin.frontend.home.products.edit', compact('products'));
    }

 

public function update(Request $request, $id)
{
    $products = Product::findOrFail($id);

    $request->validate([
        'name' => 'required|string',
        'price' => 'required|string',
        'discount_price' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $slug = $this->generateUniqueSlug($request->name, $id);

    if ($request->hasFile('image')) {
        $products->image = $this->updateImage($products->image, $request->file('image'), 'products');
    }

    $products->update([
        'name' => $request->name,
        'slug' => $slug,
        'price' => $request->price,
        'discount_price' => $request->discount_price,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Product updated!');
}



  public function destroy($id)
{
    $products = Product::findOrFail($id);

    // Delete the image from storage
    $this->deleteImage($products->image);

    // Delete the database record
    $products->delete();

    return redirect()->route('admin.products.index')->with('success', 'Banner deleted!');
}
private function generateUniqueSlug($name, $id = null)
{
    $slug = Str::slug($name);
    $originalSlug = $slug;
    $counter = 1;

    // Check if slug exists, and append counter if needed
    while (
        Product::where('slug', $slug)
            ->when($id, fn($query) => $query->where('id', '!=', $id)) // exclude current ID in update
            ->exists()
    ) {
        $slug = $originalSlug . '-' . $counter++;
    }

    return $slug;
}

}
