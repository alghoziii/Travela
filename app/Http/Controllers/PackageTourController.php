<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageTourRequest;
use App\Http\Requests\UpdatePackageTourRequest;
use App\Models\Category;
use App\Models\PackageTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageTourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $package_tours = PackageTour::orderByDesc('id')->paginate(10);
        return view('admin.package_tours.index', compact('package_tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderByDesc('id')->get();
        return view('admin.package_tours.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageTourRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            // Log::info('Data Validated:', $validated);

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath =
                    $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $packageTour = PackageTour::create($validated);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath =  $photo->store('package_photos/' . date('Y/m/d'), 'public');
                    $packageTour->package_photos()->create([
                        'photo' => $photoPath
                    ]);
                }
            };
        });
        return redirect()->route('admin.package_tours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageTour  $packageTour
     * @return \Illuminate\Http\Response
     */
    public function show(PackageTour $packageTour)
    {
        //

        $latestPhotos = $packageTour->package_photos()->orderByDesc('id')->take(3)->get();
        return view('admin.package_tours.show', compact('packageTour', 'latestPhotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageTour  $packageTour
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageTour $packageTour)
    {
        //
        $categories = Category::orderByDesc('id')->get();
        $latestPhotos = $packageTour->package_photos()->orderByDesc('id')->take(3)->get();
        return view('admin.package_tours.edit', compact('packageTour', 'latestPhotos', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageTour  $packageTour
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageTourRequest $request, PackageTour $packageTour)
    {
        //
        DB::transaction(function () use ($request, $packageTour) {
            $validated = $request->validated();

            // Log::info('Data Validated:', $validated);

            if ($request->hasFile('thumbnail')) {
                if ($packageTour->thumbnail) {
                    Storage::disk('public')->delete($packageTour->thumbnail);
                }

                $thumbnailPath =
                    $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);
            $packageTour->update($validated);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath =  $photo->store('package_photos/' . date('Y/m/d'), 'public');
                    $packageTour->package_photos()->create([
                        'photo' => $photoPath
                    ]);
                }
            };
        });
        return redirect()->route('admin.package_tours.index')->with('success', 'Data Tour berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageTour  $packageTour
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageTour $packageTour)
    {
        //
        DB::transaction(function () use ($packageTour) {
            $packageTour->delete();
        });
        return redirect()->route('admin.package_tours.index');
    }
}
