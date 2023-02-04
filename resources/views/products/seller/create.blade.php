<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
        <a href="{{route('products.seller.create')}}"
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-2 px-2npm run dev rounded-full text-sm">Create
            Product</a>
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
            <div class="w-full">
                <h1 class="mb-4 text-xl font-semibold text-gray-700">
                    Create account
                </h1>

                <form method="POST" action="{{ route('products.seller.store') }}">
                    @csrf

                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input type="text"
                                      id="name"
                                      name="name"
                                      class="block w-full"
                                      value="{{ old('name') }}"
                                      required
                                      autofocus/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="from_price" :value="__('From Price')"/>
                        <x-text-input name="from_price"
                                      type="number"
                                      class="block w-full"
                                      value="{{ old('from_price') }}"/>
                        <x-input-error :messages="$errors->get('from_price')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="to_price" :value="__('To Price')"/>
                        <x-text-input name="to_price"
                                      type="number"
                                      class="block w-full"
                                      value="{{ old('to_price') }}"/>
                        <x-input-error :messages="$errors->get('to_price')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-input-label for="status" :value="__('New')"/>
                        <x-text-input name="status"
                                      type="radio"
                                      class="block w-1/12"
                                      value="{{ \App\Enums\ProductStatus::NEW }}"/>
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="status" :value="__('Old')"/>
                        <x-text-input name="status"
                                      type="radio"
                                      class="block w-1/12"
                                      value="{{ \App\Enums\ProductStatus::OLD }}"/>
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block w-full">
                            {{ __('Create') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        </div>

    </div>
</x-app-layout>
