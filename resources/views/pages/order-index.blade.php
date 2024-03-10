@extends('../layout/side-menu')

@section('subhead')
    <title>Sales Report</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Laporan Penjualan</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="javascript:;" data-toggle="modal" data-target="#new-order-modal"
                class="button text-white bg-theme-1 shadow-md mr-2">Make New
                Order</a>

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
                                <th class="whitespace-no-wrap">DATE</th>
                                <th class="whitespace-no-wrap">ORDER ID</th>
                                <th class="whitespace-no-wrap">NAME</th>
                                <th class="text-center whitespace-no-wrap">INCOME</th>
                                <th class="text-center whitespace-no-wrap">STATUS</th>
                                <th class="text-center whitespace-no-wrap">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr class="intro-x">
                                    <td class="w-40 content-center h-20 font-bold">
                                        {{ date('d-M-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td class="w-40 content-center h-20">
                                        {{ $item->code }}
                                    </td>
                                    <td>
                                        <div class="font-medium
                                        whitespace-no-wrap">
                                            {{ $item->nama_customer }}
                                        </div>
                                    </td>
                                    @if (!$item->transaksi)
                                        <td class="text-center font-medium">Rp.0, -</td>
                                    @else
                                        <td class="text-center font-medium">
                                            Rp.{{ number_format($item->transaksi->total_harga) }}, -</td>
                                    @endif

                                    <td
                                        class="w-56 text-center  {{ $item->status == 'UNPAID' ? 'text-red-500' : 'text-green-400' }}">
                                        {{ $item->status }}
                                    </td>
                                    <td class="table-report__action w-56 text-center">
                                        <a href="{{ route('make-order', $item->id) }}"
                                            class="button text-white bg-theme-1 shadow-md ml-2 py-2 px-5">Details</a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- END: Data List -->
            </div>
        </div>
    </div>
    <!-- END: Item List -->

    <!-- BEGIN: New Order Modal -->
    <div class="modal" id="new-order-modal">
        <div class="modal__content">
            <form action="{{ route('store-order') }}" method="POST">
                @csrf
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">New Order</h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12">
                        <label>Nama</label>
                        <input type="text" name="nama_customer" class="input w-full border mt-2 flex-1"
                            placeholder="Masukan Nama Anda">
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal"
                        class="button w-32 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-32 bg-theme-1 text-white">Create Order</button>
                </div>
            </form>

        </div>
    </div>

    <!-- END: New Order Modal -->

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
