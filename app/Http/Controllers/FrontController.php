<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBookingCheckoutRequest;
use App\Http\Requests\StorePackageBookingRequest;
use App\Http\Requests\UpdatePackageBookingRequest;
use App\Models\Category;
use App\Models\PackageBank;
use App\Models\PackageBooking;
use App\Models\PackageTour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();
        $package_tours = PackageTour::orderByDesc('id')->take(3)->get();
        return view('front.index', compact('package_tours', 'categories'));
    }

    public function category(Category $category)
    {
        return view('front.category', compact('category'));
    }

    public function details(PackageTour $packageTour)
    {
        $latestPhotos = $packageTour->package_photos()->orderByDesc('id')->take(3)->get();

        return view('front.details', compact('packageTour', 'latestPhotos'));
    }

    public function book(PackageTour $packageTour)
    {
        return view('front.book', compact('packageTour'));
    }

    public function book_store(StorePackageBookingRequest $request, PackageTour $packageTour)
    {
        $user = Auth::user();
        $bank = PackageBank::orderByDesc('id')->first();
        $packageBookingId = null;

        DB::transaction(function () use ($request, $user, $packageTour, $bank, &$packageBookingId) {
            $validated = $request->validated();

            $startDate = new Carbon($validated['start_date']);
            $totalDays = $packageTour->days - 1;
            //10,11,12,13,14
            $endDate = $startDate->addDays($totalDays);

            $sub_total = $packageTour->price * $validated['quantity'];
            $insurance = 300000 * $validated['quantity'];
            $tax = $sub_total * 0.10;

            $validated['end_date'] = $endDate;
            $validated['user_id'] = $user->id;
            $validated['ispaid'] = false;
            $validated['prof'] = 'dummytrx.png';
            $validated['package_tour_id'] = $packageTour->id;
            $validated['package_bank_id'] = $bank->id;
            $validated['insurance'] = $insurance;
            $validated['tax'] = $tax;
            $validated['sub_total'] = $sub_total;
            $validated['total_amount'] = $sub_total + $tax + $insurance;

            $packageBooking = PackageBooking::create($validated);

            $packageBookingId = $packageBooking->id;
        });

        if ($packageBookingId) {
            return redirect()->route('front.choose_bank', $packageBookingId);
        } else {
            return back()->withErrors('Failed To Create Booking');
        }
    }

    public function choose_bank(PackageBooking $packageBooking)
    {
        $user = Auth::user();
        if ($packageBooking->user_id != $user->id) {
            abort(403);
        }
        $banks = PackageBank::all();
        return view('front.choose_bank', compact('packageBooking', 'banks'));
    }

    public function choose_bank_store(UpdatePackageBookingRequest $request, PackageBooking  $packageBooking)
    {
        $user = Auth::user();
        if ($packageBooking->user_id != $user->id) {
            abort(403);
        }
        DB::transaction(function () use ($request, $packageBooking) {
            $validated = $request->validated();
            $packageBooking->update([
                'package_bank_id' => $validated['package_bank_id'],
            ]);
        });
        return redirect()->route('front.book_payment', $packageBooking->id);
    }

    public function book_payment(PackageBooking $packageBooking)
    {
        return view('front.book_payment', compact('packageBooking'));
    }

    public function book_payment_store(StorePackageBookingCheckoutRequest $request, PackageBooking $packageBooking)
    {
        $user = Auth::user();
        if ($packageBooking->user_id != $user->id) {
            abort(403);
        }

        DB::transaction(function () use ($request, $user, $packageBooking) {
            $validated = $request->validated();
            if ($request->hasFile('prof')) {
                $profPath = $request->file('prof')->store('profs', 'public');
                $validated['prof'] = $profPath;
            }
            $packageBooking->update($validated);
        });

        return redirect()->route('front.book_finish');
    }

    public function book_finish()
    {
        return view('front.book_finish');
    }
}
