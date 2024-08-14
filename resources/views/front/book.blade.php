@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="{{route('front.details', $packageTour->slug)}}">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
        </a>
        <p class="text-center m-auto font-semibold">Booking</p>
        <div class="w-12"></div>
    </nav>
    <form action="{{route('front.book.store', $packageTour->slug)}}" method="POST" class="flex flex-col gap-8">
        @csrf
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Start Date</p>
            <div class="flex items-center gap-[10px] bg-white p-[16px_24px] rounded-[37px]  transition-all duration-300">
                <input type="date" name="start_date" id="start_date" class="appearance-none outline-none w-full relative text-sm tracking-035 leading-[22px] [&::-webkit-calendar-picker-indicator]:absolute [&::-webkit-calendar-picker-indicator]:w-full [&::-webkit-calendar-picker-indicator]:h-full [&::-webkit-calendar-picker-indicator]:opacity-0">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{asset('assets/icons/calendar-blue.svg')}}" class="w-full h-full" alt="icon">
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Trip Destination</p>
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-3">
                <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden">
                    <img src="{{Storage::url($packageTour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-1">
                    <p class="font-semibold text-sm tracking-035 leading-[22px]">{{$packageTour->name}}</p>
                    <div class="flex gap-1 items-center">
                        <div class="w-4 h-4">
                            <img src="{{asset('assets/icons/location-map.svg')}}" class="w-4 h-4" alt="icon">
                        </div>
                        <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageTour->location}}</span>
                    </div>
                </div>
                <div class="flex flex-1 items-center justify-end gap-2">
                    <button type="button" id="remove-quantity"><img src="{{asset('assets/icons/minus-square.svg')}}" alt="icon"></button>
                    <p id="quantity" class="font-semibold text-sm">1</p>
                    <input type="hidden" name="quantity" id="quantity_input" value="1" />
                    <input type="hidden" name="packageTourPrice" id="packageTourPrice" value="{{$packageTour->price}}" />
                    <button type="button" id="add-quantity"><img src="{{asset('assets/icons/add-square.svg')}}" alt="icon"></button>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Contact Details</p>
            <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Name</p>
                    <p class="font-semibold">{{Auth::user()->name}}</p>
                </div>
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Email</p>
                    <p class="font-semibold">{{Auth::user()->email}}</p>
                </div>
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Phone</p>
                    <p class="font-semibold">{{Auth::user()->phone_number}}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Payment Summary</p>
            <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-3">
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Sub Total</p>
                    <p id="subtotal" class="font-semibold text-blue"></p>
                </div>
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Insurance <span class="text-darkGrey">x<span id="total_quantity"></span></span></p>
                    <p id="insurance" class="font-semibold text-blue"></p>
                </div>
                <div class="flex justify-between items-center text-sm tracking-035 leading-[22px]">
                    <p>Tax 10%</p>
                    <p id="tax" class="font-semibold text-blue"></p>
                </div>
            </div>
        </div>
        <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-black rounded-t-[25px] flex items-center justify-between px-6 shadow-[-6px_-8px_20px_0_#00000008]">
            <div class="flex flex-col justify-center gap-1">
                <p class="text-white text-sm tracking-035 leading-[22px]">Grand Total</p>
                <p id="grandtotal" class="text-[#EED202] font-semibold text-lg leading-[26px] tracking-[0.6px]"></p>
            </div>
            <button type="submit" class="p-[16px_24px] rounded-xl bg-blue w-fit text-white hover:bg-[#06C755] transition-all duration-300">Booking</button>
        </div>
    </form>
</section>
@endsection

@push('after-scripts')
<script src="{{asset('js/booking.js')}}"></script>
@endpush