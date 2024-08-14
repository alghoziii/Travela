@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="checkout.html">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
        </a>
        <p class="text-center m-auto font-semibold">Payment</p>
        <div class="w-12"></div>
    </nav>
    <form enctype="multipart/form-data" action=" {{route('front.book_payment_store', $packageBooking->id)}}" class="flex flex-col gap-8" method="POST">
        @csrf
        @method('PATCH')
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Detail Trip</p>
            <div class="bg-white p-4 rounded-[26px] flex items-center gap-3">
                <div class="w-[72px] h-[72px] flex shrink-0 rounded-xl overflow-hidden">
                    <img src="{{Storage::url($packageBooking->tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-1">
                    <p class="font-semibold text-sm tracking-035 leading-[22px]">
                        {{$packageBooking->tour->name}}
                    </p>
                    <div class="flex gap-1 items-center">
                        <div class="w-4 h-4">
                            <img src="{{asset('assets/icons/calendar-grey.svg')}}" class="w-4 h-4" alt="icon">
                        </div>
                        <span class="text-darkGrey text-sm tracking-035 leading-[22px]">{{$packageBooking->start_date->format('M d,Y')}} - {{$packageBooking->end_date->format('M d,Y')}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-4 ">
            <p class="font-semibold">Payment Transfer to</p>
            <div class="bg-white p-[16px_24px] rounded-[26px] flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Bank Name</p>
                    <div class="flex items-center gap-2">
                        <div class="w-[35px] h-[25px] flex shrink-0 overflow-hidden">
                            <img src="{{Storage::url($packageBooking->bank->logo)}}" class="w-full h-full object-contain object-center" alt="logo">
                        </div>
                        <span class="text-sm tracking-035 leading-[22px]">{{$packageBooking->bank->bank_name}}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Bank Account</p>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                            <img src="{{asset('assets/icons/bank.svg')}}" class="w-full h-full object-contain object-center" alt="logo">
                        </div>
                        <span class="text-sm tracking-035 leading-[22px]">{{$packageBooking->bank->bank_account_name}}</span>
                    </div>
                </div>
                <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Account Number</p>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 flex shrink-0 overflow-hidden">
                            <img src="{{asset('assets/icons/moneys.svg')}}" class="w-full h-full object-contain object-center" alt="logo">
                        </div>
                        <span id="bank-number" class="text-sm tracking-035 leading-[22px]" data-value="{{$packageBooking->bank->bank_account_number}}">{{$packageBooking->bank->bank_account_number}}</span>
                        <button type="button" class="font-semibold text-sm tracking-035 leading-[22px] text-blue w-fit ml-auto" data-copy="bank-number" onclick="copyText(this)">Copy</button>
                    </div>
                </div>
                <hr>
                <div class="flex flex-col gap-1">
                    <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Total Payment</p>
                    <div class="flex items-center justify-between">
                        <span id="total-payment" class="font-semibold text-lg tracking-[0.6px] leading-[26px]" data-value="2500000">Rp {{number_format($packageBooking->total_amount, 0, ',', '.')}}</span>
                        <button type="button" class="font-semibold text-sm tracking-035 leading-[22px] text-blue w-fit ml-auto" data-copy="total-payment" onclick="copyText(this)">Copy</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col gap-3 px-4 ">
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Transfer Proof</p>
                <p class="text-xs leading-[20px] tracking-035 text-darkGrey">After you make the transfer, please upload your proof of payment to confirm transaction.</p>
            </div>
            <div class="flex items-center gap-3">
                <button type="button" id="upload-file" class="bg-white border border-[#BFBFBF] p-[16px_0_16px_12px] rounded-[10px] overflow-hidden w-full">
                    <p id="placeholder" class="text-nowrap text-darkGrey text-sm tracking-035 leading-[22px] text-left">Upload transfer proof</p>
                    <div id="file-info" class="hidden flex flex-row flex-nowrap gap-3 items-center">
                        <div class="w-6 h-6 flex shrink-0">
                            <img src="{{asset('assets/icons/gallery.svg')}}" alt="icon">
                        </div>
                        <span id="fileName" class="text-sm text-nowrap">victoria_watson_transfer</span>
                    </div>
                </button>
                <input type="file" name="prof" id="file" class="hidden">
            </div>
            <div class="w-full h-[88px] bg-blue overflow-hidden flex items-center shrink-0 mx-auto rounded-2xl relative">
                <img src="{{asset('assets/backgrounds/reward-left.png')}}" class="object-contain h-full" alt="rewards">
                <div class="flex flex-col -ml-[38px] relative z-10">
                    <p class="text-sm leading-[22px] tracking-035 text-white">Claim Your Reward</p>
                    <p class="text-xs leading-[22px] tracking-035 text-white">Checkout today and get reward!</p>
                </div>
                <img src="{{asset('assets/backgrounds/reward-right.png')}}" class="absolute w-[73px] h-[53px] top-0 right-0" alt="rewards">
            </div>
        </div>
        <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-black rounded-t-[25px] flex items-center justify-between px-6 shadow-[-6px_-8px_20px_0_#00000008]">
            <div class="flex flex-col justify-center gap-1">
                <p class="text-white text-sm tracking-035 leading-[22px]">Total Payment</p>
                <p id="grandtotal" class="text-[#EED202] font-semibold text-lg leading-[26px] tracking-[0.6px]">Rp {{number_format($packageBooking->total_amount, 0, ',', '.')}}</p>
            </div>
            <button type="submit" id="confirm-payment" class="p-[16px_24px] rounded-xl bg-blue w-fit disabled:bg-[#BFBFBF] text-white hover:bg-[#06C755] transition-all duration-300" disabled>Confirm</button>
        </div>
    </form>
</section>
@endsection

@push('after-scripts')
<script src="{{asset('js/payment.js')}}"></script>
</body>
@endpush