@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover object-center" alt="photo" />
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-xs tracking-035">Welcome!</p>
                <p class="font-semibold">{{Auth::user()->name}}</p>
            </div>
        </div>
        <a href="">
            <div class="w-12 h-12 rounded-full bg-white overflow-hidden flex shrink-0 items-center justify-center shadow-[6px_8px_20px_0_#00000008]">
                <img src="{{asset('assets/icons/bell.svg')}}" alt="icon" />
            </div>
        </a>
    </nav>
    <div class="px-4 flex flex-col gap-6">
        <div class="flex flex-col items-center gap-4">
            <div class="w-24 h-24 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover object-center" alt="photo" />
            </div>
        </div>
        <div class="bg-white p-8 rounded-lg shadow-md w-full mt-8">
            <table class="w-full text-left">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 font-semibold">Name</td>
                        <td class="py-2 text-right">{{Auth::user()->name}}</td>
                    </tr>
                    <tr class="border-bx">
                        <td class="py-2 font-semibold">Phone Number</td>
                        <td class="py-2 text-right">{{Auth::user()->phone_number}}</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-4 font-semibold">Email</td>
                        <td class="py-2 text-right">{{Auth::user()->email}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex justify-center mt-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-blue text-white py-2 px-6">Logout</button>
                </form>
            </div>
            <br />
        </div>
    </div>
    <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-evenly py-[45px]">
        <a href="{{route('front.index')}}" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/home.svg')}}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Home</p>
            </div>
        </a>
        <a href="" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/search.svg')}}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Search</p>
            </div>
        </a>
        <a href="{{route('dashboard.bookings')}}" class="menu opacity-25">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/calendar-blue.svg')}}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Schedule</p>
            </div>
        </a>
        <a href="" class="menu">
            <div class="flex flex-col justify-center w-fit gap-1">
                <div class="w-4 h-4 flex shrink-0 overflow-hidden mx-auto text-[#4D73FF]">
                    <img src="{{asset('assets/icons/user-flat.svg')}}" alt="icon" />
                </div>
                <p class="font-semibold text-xs leading-[20px] tracking-[0.35px]">Profile</p>
            </div>
        </a>
    </div>
</section>
@endsection

@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="js/flickity-slider.js"></script>
<script src="js/two-lines-text.js"></script>
@endpush