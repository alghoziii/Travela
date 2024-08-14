<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $package_bookings = PackageBooking::with(['customer', 'tour'])->orderByDesc('id')->paginate(10);
        return view('admin.package_bookings.index', compact('package_bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageBooking  $packageBooking
     * @return \Illuminate\Http\Response
     */
    public function show(PackageBooking $packageBooking)
    {
        //
        return view('admin.package_bookings.show', compact('packageBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageBooking  $packageBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageBooking  $packageBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PackageBooking $packageBooking)
    {
        //
        DB::transaction(function () use ($packageBooking) {
            $packageBooking->update([
                'ispaid' => true,
            ]);
        });

        return redirect()->route('admin.package_bookings.show', $packageBooking);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageBooking  $packageBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageBooking $packageBooking)
    {
        //
    }
}
