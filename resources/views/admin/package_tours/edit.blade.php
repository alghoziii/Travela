<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tour') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action="{{route('admin.package_tours.update', $packageTour)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$packageTour->name}}" autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="thumbnail" :value="__('thumbnail')" />
                        <img src="{{Storage::url($packageTour->thumbnail)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" autofocus autocomplete="thumbnail" />
                        <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="category" :value="__('category')" />

                        <select name="category_id" id="category_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose category</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" @selected(old('category_id', $packageTour->category_id) == $category->id)>
                                {{$category->name}}
                            </option>

                            @endforeach
                        </select>



                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="about" :value="__('about')" />
                        <textarea name="about" id="about" cols="30" rows="5" class="border border-slate-300 rounded-xl w-full">{{$packageTour->about}}</textarea>
                        <x-input-error :messages="$errors->get('about')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="location" :value="__('location')" />
                        <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{$packageTour->location}}" required autofocus autocomplete="location" />
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="price" :value="__('price')" />
                        <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{$packageTour->price}}" required autofocus autocomplete="price" />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="days" :value="__('days')" />
                        <x-text-input id="days" class="block mt-1 w-full" type="text" name="days" value="{{$packageTour->days}}" required autofocus autocomplete="days" />
                        <x-input-error :messages="$errors->get('days')" class="mt-2" />
                    </div>

                    <hr class="my-5">
                    @forelse($latestPhotos as $photo)
                    <div class="mt-4">
                        <x-input-label for="photo" :value="__('photo')" />
                        <img src="{{Storage::url($photo->photo)}}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <x-text-input id="photo" class="block mt-1 w-full" type="file" name="photos[]" autofocus autocomplete="photo" />
                        <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                    </div>
                    @empty
                    <p>Belum ada foto terbaru</p>
                    @endforelse



                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Tour
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>