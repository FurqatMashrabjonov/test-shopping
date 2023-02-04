<x-app-layout>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>



        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Product Name</th>
                        <th class="px-4 py-3">Email</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($orders as $order)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $order->product->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{\Illuminate\Support\Carbon::parse($order->created_at)->diffForHumans()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $orders->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
