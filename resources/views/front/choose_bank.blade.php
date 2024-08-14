@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-8">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="booking.html">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
        </a>
        <p class="text-center m-auto font-semibold">Checkout</p>
        <div class="w-12"></div>
    </nav>
    <div class="flex flex-1 flex-col h-full justify-center px-4 gap-8">
        <div class="px-[35px] w-full flex shrink-0">
            <img src="{{asset('assets/backgrounds/Bank-Account-Illustration.png')}}" class="object-contain" alt="background">
        </div>

        @if($errors->any())
        @foreach($errors->all() as $error)
        <div class="py-3 w-full rounded-3xl bg-red-500 text-white">
            {{$error}}
        </div>
        @endforeach
        @endif

        <form method="POST" action="{{route('front.choose_bank_store', $packageBooking)}}" class="flex flex-col gap-8">
            @csrf
            @method('PATCH')
            <div class="flex flex-col gap-3">
                <p class="font-semibold">Payment Method</p>
                @foreach($banks as $bank)
                <div class="bg-white p-[16px_24px] rounded-[26px]">
                    <label for="bca" class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-[35px] h-[25px] flex shrink-0 overflow-hidden">
                                <img src="{{Storage::url($bank->logo)}}" class="w-full h-full object-contain object-center" alt="logo">
                            </div>
                            <span class="text-sm tracking-035 leading-[22px]">{{$bank->bank_name}}</span>
                        </div>
                        <input type="radio" value="{{$bank->id}}" name="package_bank_id" id="{{$bank->id}}" class="w-5 h-5 appearance-none checked:border-[3px] checked:border-solid checked:border-white rounded-full checked:bg-[#6E5DE7] ring-2 ring-[#6E5DE7]">
                    </label>
                </div>
                @endforeach

            </div>
            <button type="submit" class="p-[16px_24px] rounded-xl bg-blue w-full text-white text-center hover:bg-[#06C755] transition-all duration-300">Checkout</button>
        </form>
    </div>
</section>
@endsection