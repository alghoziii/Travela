@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="{{route('front.index')}}">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
        </a>
        <p class="text-center m-auto font-semibold">Schedule</p>
        <div class="w-12"></div>
    </nav>
    <div class="flex flex-col gap-3 px-4">
        <p class="font-semibold">My Packages</p>

        @forelse(Auth::user()->bookings as $booking)
        <a href="{{route('dashboard.booking.details', $booking->id)}}" class="card">
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-4">
                <p class="text-center text-sm leading-[22px] tracking-035">
                    <span class="font-semibold text-2xl">{{$booking->start_date->format('d')}}</span> <br> {{$booking->start_date->format('M')}}<br> {{$booking->start_date->format('Y')}}
                </p>
                <div class="flex items-center gap-4">
                    <div class="w-[92px] h-[92px] flex shrink-0 rounded-xl overflow-hidden">
                        <img src="{{Storage::url($booking->tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold text-sm tracking-035 leading-[22px]">{{$booking->tour->name}}</p>
                        <p class="text-sm leading-[22px] tracking-035 text-darkGrey">{{$booking->tour->days}} days | {{$booking->quantity}} packs</p>
                        @if($booking->ispaid)
                        <div class="success-badge w-fit border border-[#60A5FA] p-[4px_8px] rounded-lg bg-[#EFF6FF] flex items-center justify-center">
                            <span class="text-xs leading-[22px] tracking-035 text-[#2563EB]">Success Paid</span>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </a>
        @empty
        <p>Anda belum pernah melakukan booking</p>
        @endforelse

    </div>
    <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
        <a href="{{route('front.index')}}" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/home.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Home</p>
            </div>
        </a>
        <a href="" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/search.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Search</p>
            </div>
        </a>
        <a href="" class="menu">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/calendar-blue.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Schedule</p>
            </div>
        </a>
        <a href="{{ route('dashboard.profile') }}" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/user-flat.svg')}}" alt="icon">
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Profile</p>
            </div>
        </a>
    </div>
</section>
@endsection