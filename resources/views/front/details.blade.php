@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="{{route('front.index')}}">
            <img src="{{asset('assets/icons/back.png')}} " alt="back">
        </a>
        <p class="text-center m-auto font-semibold">Details</p>
        <a href="">
            <img src="{{asset('assets/icons/more-dots.svg')}} " alt="more">
        </a>
    </nav>
    <div id="image-details" class="px-4 flex flex-col gap-3">
        <div class="w-full h-[345px] flex shrink-0 rounded-xl overflow-hidden">
            <img id="image-thumbnail" src="{{Storage::url($packageTour->thumbnail)}} " class="w-full h-full object-cover object-center" alt="thumbnail">
        </div>
        <div class="grid grid-cols-4 gap-4 w-fit mx-auto">
            <a href="{{Storage::url($packageTour->thumbnail)}} " class="thumbnail-option w-[74px] h-[74px] flex shrink-0 rounded-xl border-2 overflow-hidden mx-auto border-blue">
                <img src="{{Storage::url($packageTour->thumbnail)}} " class="w-full h-full object-cover object-center" alt="thumbnail">
            </a>
            @foreach($latestPhotos as $photo)
            <a href="{{Storage::url($photo->photo)}} " class="thumbnail-option w-[74px] h-[74px] flex shrink-0 rounded-xl border-2 overflow-hidden mx-auto opacity-50">
                <img src="{{Storage::url($photo->photo)}} " class="w-full h-full object-cover object-center" alt="thumbnail">
            </a>
            @endforeach
        </div>
    </div>
    <div class="mx-4 flex flex-col gap-3 bg-white p-[16px_24px] rounded-[22px]">
        <h1 class="font-semibold">{{$packageTour->name}}</h1>
        <div class="flex justify-between gap-2">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 flex items-center shrink-0">
                    <img src="{{asset('assets/icons/location-map.svg')}} " class="w-full h-full object-contain" alt="icon">
                </div>
                <div class="flex flex-col gap-1">
                    <p class="text-sm leading-[22px] tracking-[0.35px] text-darkGrey">Location</p>
                    <p class="font-semibold text-sm tracking-035">{{$packageTour->location}}</p>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <p class="text-sm leading-[22px] tracking-[0.35px] text-darkGrey">Rating</p>
                <div class="flex items-center gap-2">
                    <span class="font-semibold text-sm leading-[22px] tracking-[0.35px]">4.8</span>
                    <div class="flex items-center gap-1">
                        <img src="{{asset('assets/icons/Star.svg')}} " alt="Star">
                        <img src="{{asset('assets/icons/Star.svg')}} " alt="Star">
                        <img src="{{asset('assets/icons/Star.svg')}} " alt="Star">
                        <img src="{{asset('assets/icons/Star.svg')}} " alt="Star">
                        <img src="{{asset('assets/icons/Star.svg')}} " alt="Star">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-4 flex flex-col gap-3 bg-white p-[16px_24px] rounded-[22px]">
        <h2 class="font-semibold">About Destination</h2>
        <p id="readMore" class="text-sm leading-[22px] tracking-035 text-darkGrey">
            {{substr($packageTour->about, 0, 67)}}
            <button class="font-semibold text-blue" onclick="document.getElementById('readMore').classList.toggle('hidden'); document.getElementById('seeLess').classList.toggle('hidden');">Read More</button>
        </p>
        <p id="seeLess" class="hidden text-sm leading-[22px] tracking-035 text-darkGrey">
            {{$packageTour->about}}

            <button class="font-semibold text-blue" onclick="document.getElementById('readMore').classList.toggle('hidden'); document.getElementById('seeLess').classList.toggle('hidden');">See Less</button>
        </p>
    </div>
    <div class="mx-4 flex flex-col gap-3 bg-white p-[16px_24px] rounded-[22px]">
        <h2 class="font-semibold">Testimonial</h2>
        <div class="flex flex-col gap-1">
            <div class="flex items-center justify-between gap-2">
                <div class="flex items-center gap-1">
                    <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008]">
                        <img src="{{asset('assets/photos/pfp2.png')}} " class="w-full h-full object-cover object-center" alt="photo">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-bold text-sm leading-[22px] tracking-035">James Sullivan</p>
                        <p class="text-darkGrey text-xs leading-[20px] tracking-035">1 week ago</p>
                    </div>
                </div>
                <div class="flex gap-1 items-center">
                    <img src="{{asset('assets/icons/Star.svg')}} " alt="icon">
                    <img src="{{asset('assets/icons/Star.svg')}} " alt="icon">
                    <img src="{{asset('assets/icons/Star.svg')}} " alt="icon">
                    <img src="{{asset('assets/icons/Star.svg')}} " alt="icon">
                    <img src="{{asset('assets/icons/Star.svg')}} " alt="icon">
                </div>
            </div>
            <p class="text-sm leading-[22px] tracking-035 text-darkGrey">The view was good, also I really love the weather. It’s very warm and good for healing</p>
        </div>
        <hr>
        <div class="flex gap-4">
            <div class="flex flex-col gap-3">
                <p class="font-semibold">2.547 <span class="font-normal text-sm leading-[22px] tracking-035 text-darkGrey">Reviews</span></p>
                <div class="flex items-center">
                    <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                        <img src="{{asset('assets/photos/pfp2.png')}} " class="w-full h-full object-cover object-center" alt="photo">
                    </div>
                    <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                        <img src="{{asset('assets/photos/pfp3.png')}} " class="w-full h-full object-cover object-center" alt="photo">
                    </div>
                    <div class="w-12 h-12 border-4 border-white rounded-full overflow-hidden flex shrink-0 shadow-[6px_8px_20px_0_#00000008] -ml-2 first-of-type:-ml-1">
                        <img src="{{asset('assets/photos/pfp4.png')}} " class="w-full h-full object-cover object-center" alt="photo">
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-3">
                <p class="font-semibold">Photo & Video</p>
                <div class="flex gap-1">
                    <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                        <img src="{{asset('assets/thumbnails/nusa-penida.jpg')}} " class="w-full h-full object-cover object-center" alt="thumbnail">
                    </div>
                    <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                        <img src="{{asset('assets/thumbnails/raja.jpg')}} " class="w-full h-full object-cover object-center" alt="thumbnail">
                    </div>
                    <div class="w-12 h-12 flex shrink-0 rounded-lg overflow-hidden relative">
                        <img src="{{asset('assets/thumbnails/santorini.jpg')}} " class="w-full h-full object-cover object-center" alt="thumbnail">
                        <div class="w-12 h-12 flex items-center justify-center bg-[#1c273080] absolute">
                            <span class="font-semibold text-white">101+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="" class="flex items-center justify-between py-2 text-blue">
            <span class="font-semibold text-sm leading-[22px] tracking-035">Read 2.546 more review</span>
            <div>
                <img src="{{asset('assets/icons/arrow-circle-right.svg')}} " alt="icon">
            </div>
        </a>
    </div>
    <div class="navigation-bar fixed bottom-0 z-50 max-w-[640px] w-full h-[85px] bg-white rounded-t-[25px] flex items-center justify-between px-6">
        <div class="flex flex-col justify-center gap-1">
            <p class="text-darkGrey text-sm tracking-035 leading-[22px]">Total Price</p>
            <p class="text-blue font-semibold text-lg leading-[26px] tracking-[0.6px]">Rp {{number_format($packageTour->price, 0, ',', '.')}}<span class="font-normal text-sx leading-[20px] tracking-035 text-darkGrey">/pack</span></p>
        </div>
        <a href="{{Route('front.book', $packageTour->slug)}}" class="p-[16px_24px] rounded-xl bg-blue w-fit text-white hover:bg-[#06C755] transition-all duration-300">Book Now</a>
    </div>
</section>
@endsection

@push('after-scripts')
<script src="{{asset('js/details.js')}}"></script>
@endpush