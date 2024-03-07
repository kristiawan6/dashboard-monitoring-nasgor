@extends('../layout/' . $layout)

@section('subhead')
    <title>Point of Sale - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Orders </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="orders"class="button text-white bg-theme-1 shadow-md mr-2">Make New Order</a>

        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Item List -->
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="lg:flex intro-y">

            </div>

            <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t border-theme-5">
                <!-- BEGIN: Data List -->
                <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                    <table class="table table-report -mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-no-wrap">PRODUCT NAME</th>
                                <th class="whitespace-no-wrap">QUANTITY</th>
                                <th class="whitespace-no-wrap">TOTAL PRICE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($order as $item)
                                <tr class="intro-x">
                                    <td class=" content-center h-20">
                                        @if ($item->produk)
                                            {{ $item->produk->nama }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-medium whitespace-no-wrap">{{ $item->qty }}</div>
                                    </td>
                                    <td>Rp. {{ $item->produk->harga * $item->qty }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- END: Data List -->
            </div>
        </div>
        <!-- END: Item List -->
        
        <script>
            function incrementValue(itemId) {
                var input = document.getElementById('itemQuantity_' + itemId);
                var value = parseInt(input.value, 10);
                value = isNaN(value) ? 0 : value;
                value++;
                input.value = value;
            }

            function decrementValue(itemId) {
                var input = document.getElementById('itemQuantity_' + itemId);
                var value = parseInt(input.value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 0) {
                    value--;
                    input.value = value;
                }
            }
        </script>
    @endsection