<x-app-layout>
    <x-slot name="header">
        {{ __('Products') }}

        @if(auth()->user()->type == \App\Enums\UserType::SELLER)
            <a href="{{route('products.seller.create')}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-2 px-2npm run dev rounded-full text-sm">Create
                Product</a>
        @endif

    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        @if (\Session::has('success'))
            <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
                <div class="flex justify-center items-center w-12 bg-blue-500">
                    <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                    </svg>
                </div>

                <div class="px-4 py-2 -mx-3">
                    <div class="mx-3">
                        <span class="font-semibold text-blue-500">Info</span>
                        <p class="text-sm text-gray-600">{!! \Session::get('success') !!}</p>
                    </div>
                </div>
            </div>
        @endif


        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">From price</th>
                        <th class="px-4 py-3">To price</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Created Date</th>
                        <th class="px-4 py-3">Order</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($products as $product)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $product->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->from_price }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $product->to_price }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if($product->status == \App\Enums\ProductStatus::NEW)
                                    NEW
                                @elseif($product->status == \App\Enums\ProductStatus::OLD)
                                    OLD
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{\Illuminate\Support\Carbon::parse($product->created_at)->diffForHumans()}}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                @if(isset($product->orders))
                                    <x-danger-button disabled class="block w-full">
                                        {{ __('Ordered') }}
                                    </x-danger-button>
                                @else
                                    <form method="POST" action="{{ route('p.customer.order') }}">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{$product->id}}">

                                        <x-primary-button class="block w-full">
                                            {{ __('Order') }}
                                        </x-primary-button>

                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $products->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
