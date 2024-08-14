@extends('front.layouts.app')
@section('content')
<section id="content" class="max-w-[640px] w-full mx-auto bg-[#F9F2EF] min-h-screen flex flex-col gap-8 pb-[120px]">
    <nav class="mt-8 px-4 w-full flex items-center justify-between">
        <a href="{{route('front.index')}}">
            <img src="{{asset('assets/icons/back.png')}}" alt="back">
        </a>
        <p class="text-center m-auto font-semibold">{{$category->name}}</p>
        <div class="w-12"></div>
    </nav>
    <div class="flex flex-col gap-3 px-4">

        @forelse($category->tours as $tour)
        <a href="{{route('front.details', $tour->slug)}}" class="card">
            <div class="bg-white p-4 rounded-[26px] flex flex-col gap-3">
                <div class="flex items-center gap-4">
                    <div class="w-[92px] h-[92px] flex shrink-0 rounded-xl overflow-hidden">
                        <img src="{{Storage::url($tour->thumbnail)}}" class="w-full h-full object-cover object-center" alt="thumbnail">
                    </div>
                    <div class="flex flex-col gap-1">
                        <p class="font-semibold two-lines">{{$tour->name}}</p>
                        <div class="flex items-center gap-1">
                            <div class="w-4 h-4 flex shrink-0">
                                <img src="{{asset('assets/icons/location-map.svg')}}" alt="icon">
                            </div>
                            <span class="text-sm text-darkGrey tracking-035">{{$tour->location}}</span>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-sm leading-[22px] tracking-[0.35px]">4.8</span>
                        <div class="flex items-center gap-1">
                            <img src="{{asset('assets/icons/Star.svg')}}" alt="Star">
                            <img src="{{asset('assets/icons/Star.svg')}}" alt="Star">
                            <img src="{{asset('assets/icons/Star.svg')}}" alt="Star">
                            <img src="{{asset('assets/icons/Star.svg')}}" alt="Star">
                            <img src="{{asset('assets/icons/Star.svg')}}" alt="Star">
                        </div>
                    </div>
                    <p class="text-sm leading-[22px] tracking-035">
                        <span class="font-semibold text-[#4D73FF] text-nowrap">Rp{{number_format($tour->price, 0, ',', '.')}}</span> <span class="text-darkGrey">{{$tour->days}}days</span>
                    </p>
                </div>
            </div>
        </a>
        @empty
        <p>Belum ada paket tour pada kategori ini </p>
        @endforelse

    </div>
</section>
@endsection
@push('after-scripts')
<script src="js/two-lines-text.js"></script>
@endpush