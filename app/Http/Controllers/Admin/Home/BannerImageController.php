<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\BannerImage;
use Illuminate\Http\Request;
use App\Traits\UploadsImages;

class BannerImageController extends Controller
{
        use UploadsImages;

     public function index()
    {
        $banners = BannerImage::all();
        // dd($banners);
        return view('admin.frontend.home.banner_images.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.frontend.home.banner_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'button' => 'nullable|string',
        ]);

        // Handle file upload
               $path = $this->uploadImage($request->file('image'), 'banner_images');


        BannerImage::create([
            'name' => $request->name,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'image' => $path ?? null,
            'button' => $request->button,
        ]);

        return redirect()->route('admin.banner-images.index')->with('success', 'Banner created successfully!');
    }

    public function show($id)
    {
        $banner = BannerImage::findOrFail($id);
        return view('banner_images.show', compact('banner'));
    }

    public function edit($id)
    {
        $banner = BannerImage::findOrFail($id);
        return view('admin.frontend.home.banner_images.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = BannerImage::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'sub_title' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'button' => 'nullable|string',
        ]);

         if ($request->hasFile('image')) {
            // Use your trait method to delete old image and upload new one
            $banner->image = $this->updateImage($banner->image, $request->file('image'), 'banner_images');
        }

        $banner->update([
            'name' => $request->name,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'button' => $request->button,
        ]);

        return redirect()->route('admin.banner-images.index')->with('success', 'Banner updated!');
    }

  public function destroy($id)
{
    $banner = BannerImage::findOrFail($id);

    // Delete the image from storage
    $this->deleteImage($banner->image);

    // Delete the database record
    $banner->delete();

    return redirect()->route('admin.banner-images.index')->with('success', 'Banner deleted!');
}

}
