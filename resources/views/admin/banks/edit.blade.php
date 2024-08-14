<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Bank') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                <form method="POST" action=" {{route('admin.package_banks.update', $packageBank)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <x-input-label for="bank_name" :value="__('bank_name')" />
                        <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" value=" {{$packageBank->bank_name}}" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_name" :value="__('bank_account_name')" />
                        <x-text-input id="bank_account_name" class="block mt-1 w-full" type="text" name="bank_account_name" value="{{$packageBank->bank_account_name}} " required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_account_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_number" :value="__('bank_account_number')" />
                        <x-text-input id="bank_account_number" class="block mt-1 w-full" type="number" name="bank_account_number" value="{{$packageBank->bank_account_number}} " required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('bank_account_number')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="logo" :value="__('logo')" />
                        <img src="{{Storage::url($packageBank->logo)}} " alt="" class="rounded-2xl object-cover w-[90px] h-[90px]">
                        <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" autofocus autocomplete="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Update Bank
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>