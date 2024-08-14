<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBankRequest;
use App\Http\Requests\UpdatePackageBankRequest;
use App\Models\PackageBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banks = PackageBank::orderByDesc('id')->paginate(10);
        return view('admin.banks.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePackageBankRequest $request)
    {
        //

        DB::transaction(function () use ($request) {

            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $validated['logo'] = $logoPath;
            }

            $newBank = PackageBank::create($validated);
        });

        return redirect()->route('admin.package_banks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageBank  $packageBank
     * @return \Illuminate\Http\Response
     */
    public function show(PackageBank $packageBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageBank  $packageBank
     * @return \Illuminate\Http\Response
     */
    public function edit(PackageBank $packageBank)
    {
        //
        return view('admin.banks.edit', compact('packageBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageBank  $packageBank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePackageBankRequest $request, PackageBank $packageBank)
    {
        //
        DB::transaction(function () use ($request, $packageBank) {

            $validated = $request->validated();

            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $validated['logo'] = $logoPath;
            }

            $packageBank->update($validated);
        });

        return redirect()->route('admin.package_banks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageBank  $packageBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageBank $packageBank)
    {
        //
        DB::transaction(function () use ($packageBank) {
            $packageBank->delete();
        });
        return redirect()->route('admin.package_banks.index');
    }
}
