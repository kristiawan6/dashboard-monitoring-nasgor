@extends('../layout/' . $layout)

@section('subhead')
    <title>Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Tambahkan skrip SweetAlert2 CDN di bawah ini -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- Tambahan tag-tag head lainnya sesuai kebutuhan aplikasi Anda -->
    </head>

    <body>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg border-b font-medium mr-auto">Tanggal :
                {{ $data['order']->created_at->format('l, d-M-Y H:i:s') }}</h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="javascript:;" data-toggle="modal" data-target="#new-order-modal"
                    class="button text-white bg-theme-1 shadow-md mr-2 mt-3">Add New Order</a>
            </div>
        </div>
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Item List -->
            <div class="intro-y col-span-12 lg:col-span-8">
                @if ($data['order']->status == 'UNPAID')
                    <div class="grid grid-cols-12 gap-5 mt-5 pt-5 border-t border-theme-5">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['produk'] as $item)
                            <a href="javascript:;" data-toggle="modal" data-target="#add-item-modal{{ $item->id }}"
                                class="intro-y block col-span-12 sm:col-span-4 xxl:col-span-3">
                                <div class="box rounded-md p-3 relative zoom-in">
                                    <div class="flex-none pos-image relative block">
                                        <div class="pos-image__preview image-fit">
                                            <img alt="Midone Laravel Admin Dashboard Starter Kit"
                                                src="/user/images/nasgor.png">
                                        </div>
                                    </div>
                                    <div class="block font-medium text-center truncate mt-3">{{ $item->nama }}</div>
                                </div>
                            </a>
                        @endforeach

                        @foreach ($data['produk'] as $item)
                            <!-- BEGIN: Add Item Modal -->
                            <div class="modal" id="add-item-modal{{ $item->id }}">
                                <div class="modal__content">
                                    @if ($item->stok > 0)
                                        <form action="{{ route('add-to-cart', $data['order']->id) }}" method="POST">
                                            @csrf
                                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                                <h2 class="font-medium text-base mr-auto">{{ $item->nama }}</h2>
                                            </div>
                                            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                                <div class="col-span-12">
                                                    Stock Available : {{ $item->stok }}
                                                    <br>
                                                    <label>Quantity</label>
                                                    <div class="flex mt-2 flex-1">
                                                        <input type="text" name="id_produk" id="id_produk"
                                                            value="{{ $item->id }}" hidden>
                                                        <button type="button"
                                                            class="button w-12 border bg-gray-200 text-gray-600 mr-1"
                                                            onclick="decrementValue('{{ $item->id }}')">-</button>
                                                        <input type="text" class="input w-full border text-center"
                                                            id="itemQuantity_{{ $item->id }}"
                                                            placeholder="Item quantity" value="1" name="qty">
                                                        <button type="button"
                                                            class="button w-12 border bg-gray-200 text-gray-600 ml-1"
                                                            onclick="incrementValue('{{ $item->id }}')">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-5 py-3 text-right border-t border-gray-200">
                                                <button type="button" data-dismiss="modal"
                                                    class="button w-24 border text-gray-700 mr-1">Cancel</button>
                                                <button type="submit" class="button w-24 bg-theme-1 text-white">Add
                                                    Item</button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="w-full flex items-center h-52 py-14">
                                            <br><br><br><br><br><br><br>
                                            <div class="text-red-500 font-bold text-center w-full text-2xl">Stok Habis
                                            </div>
                                        </div>

                                        <div class="px-5 py-3 text-right border-t border-gray-200">
                                            <button type="button" data-dismiss="modal"
                                                class="button w-24 border text-gray-700 mr-1">Cancel</button>

                                        </div>
                                    @endif

                                </div>
                            </div>
                            <!-- END: Add Item Modal -->
                        @endforeach

                    </div>
                @else
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-no-wrap">#</th>
                                    <th class="whitespace-no-wrap">PRODUK</th>
                                    <th class="whitespace-no-wrap">PRICE</th>
                                    <th class="whitespace-no-wrap text-center">QTY</th>
                                    <th class="text-center whitespace-no-wrap">SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data['cart'] as $item)
                                    <tr class="intro-x">
                                        <td class="w-40 content-center h-20">
                                            {{ $no++ }}
                                        </td>
                                        <td>
                                            <div class="font-medium whitespace-no-wrap">{{ $item->produk->nama }}</div>
                                        </td>
                                        <td class="text-center">Rp.{{ number_format($item->produk->harga) }}</td>
                                        <td class="text-center">{{ $item->qty }}</td>
                                        <td class="text-center">Rp.{{ number_format($item->produk->harga * $item->qty) }},
                                            -</td>
                                    </tr>
                                @endforeach
                                <tr class="intro-x flex justify-end">
                                <tr class="intro-x">
                                    <td class="w-40 content-center h-20 font-medium ">
                                        Grand Total
                                    </td>
                                    <td>
                                        <div class="whitespace-no-wrap"></div>
                                    </td>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-center font-bold">Rp.{{ number_format($data['total']) }}, -</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
            <!-- END: Item List -->
            <!-- BEGIN: Ticket -->
            <div class="col-span-12 lg:col-span-4 mt-10">
                @if ($data['order']->status == 'UNPAID')
                    <div class="intro-y pr-1">
                        <div class="box p-2">
                            <div class="pos__tabs nav-tabs justify-center flex">
                                <a data-toggle="tab" data-target="#ticket" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center active">Pesanan</a>
                                <a data-toggle="tab" data-target="#details" href="javascript:;"
                                    class="flex-1 py-2 rounded-md text-center">Details</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-content__pane active" id="ticket">
                            <div class="pos__ticket box p-2 mt-5">
                                @if ($data['cart']->count() > 0)
                                    @foreach ($data['cart'] as $item)
                                        <a href="javascript:;" data-toggle="modal"
                                            data-target="#edit-item-modal{{ $item->id }}"
                                            class="flex items-center p-3 cursor-pointer transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                                            <div class="pos__ticket__item-name truncate mr-1">{{ $item->produk->nama }}
                                            </div>
                                            <div class="text-gray-600">x {{ $item->qty }}</div>
                                            <i data-feather="edit" class="w-4 h-4 text-gray-600 ml-2"></i>
                                            <div class="ml-auto">Rp.{{ $item->sub_total }}</div>
                                        </a>
                                    @endforeach
                                @else
                                    <div class="text-gray-600 text-center my-4">Belum ada pesanan yang ditambahkan</div>
                                @endif
                            </div>
                            <div class="box p-5 mt-5">

                                <div class="flex mt-2 pt-4 border-t border-gray-200">
                                    <div class="mr-auto font-medium text-base">Total</div>
                                    <div class="font-medium text-base">Rp.{{ !$data['total'] ? '0' : $data['total'] }}, -
                                    </div>
                                </div>
                            </div>

                            <div class="flex mt-5 w-full justify-center">
                                {{-- <form action="{{ route('delete-cart', $data['order']->id) }}" method="POST"
                                    class="mr-6">
                                    @csrf
                                    @method('DELETE') --}}
                                <button type="button" class="button w-32 border border-gray-400 text-gray-600"
                                    id="clearItemsBtn">Clear Items</button>
                                {{-- </form> --}}

                                <form id="checkoutForm" action="{{ route('checkout', $data['order']->id) }}"
                                    method="POST" class="ml-6">
                                    @csrf
                                    <input type="text" hidden value="{{ $data['total'] }}" name="total">
                                    <button type="button" id="checkoutBtn"
                                        class="button w-32 text-white bg-theme-1 shadow-md ml-auto">Submit</button>
                                </form>


                            </div>
                        </div>
                        <div class="tab-content__pane" id="details">
                            <div class="box p-5 mt-5">
                                <div class="flex items-center border-b pb-5">
                                    <div class="">
                                        <div class="text-gray-600">Tanggal</div>
                                        <div>{{ $data['order']->created_at->format('d-M-Y') }}</div>
                                    </div>
                                    <i data-feather="calendar" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Kode Pesanan</div>
                                        <div>{{ $data['order']->code }}</div>
                                    </div>
                                    <i data-feather="code" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Customer</div>
                                        <div>{{ $data['order']->nama_customer }}</div>
                                    </div>
                                    <i data-feather="user" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Status</div>
                                        <div
                                            class="{{ $data['order']->status == 'UNPAID' ? 'text-red-500' : 'text-green-400' }}">
                                            {{ $data['order']->status }}
                                        </div>
                                    </div>
                                    <i data-feather="{{ $data['order']->status == 'UNPAID' ? 'x' : 'check' }}"
                                        class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tab-content">
                        <div class="tab-content__pane active" id="details">
                            <div class="box p-5 mt-5">
                                <div class="flex items-center border-b pb-5">
                                    <div class="">
                                        <div class="text-gray-600">Tanggal</div>
                                        <div>{{ $data['order']->created_at->format('d-M-Y') }}</div>
                                    </div>
                                    <i data-feather="calendar" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Kode Pesanan</div>
                                        <div>{{ $data['order']->code }}</div>
                                    </div>
                                    <i data-feather="code" class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>

                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Status</div>
                                        <div
                                            class="{{ $data['order']->status == 'UNPAID' ? 'text-red-500' : 'text-green-400' }}">
                                            {{ $data['order']->status }}
                                        </div>
                                    </div>
                                    <i data-feather="{{ $data['order']->status == 'UNPAID' ? 'x' : 'check' }}"
                                        class="w-4 h-4 text-gray-600 ml-auto"></i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Modal Toko</div>
                                        <div class="font-bold">Rp.{{ number_format($data['total'] * 0.4) }}, -
                                        </div>
                                    </div>
                                    <i class="w-4 h-4 text-gray-600 ml-auto">$</i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Profit Tukang</div>
                                        <div class="font-bold">Rp.{{ number_format($data['total'] * 0.36) }}, -
                                        </div>
                                    </div>
                                    <i class="w-4 h-4 text-gray-600 ml-auto">$</i>
                                </div>
                                <div class="flex items-center border-b py-5">
                                    <div class="">
                                        <div class="text-gray-600">Profit Dani</div>
                                        <div class="font-bold">Rp.{{ number_format($data['total'] * 0.24) }}, -
                                        </div>
                                    </div>
                                    <i class="w-4 h-4 text-gray-600 ml-auto">$</i>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!-- END: Ticket -->
        </div>
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
                            <label>Nama Customer</label>
                            <input type="text" name="nama_customer" class="input w-full border mt-2 flex-1"
                                placeholder="Customer name">
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

        @foreach ($data['cart'] as $item)
            <!-- BEGIN: Edit Item Modal -->
            <div class="modal pt-56" id="edit-item-modal{{ $item->id }}">
                <form action="{{ route('update-cart', $data['order']->id) }}" method="POST">
                    @csrf
                    <div class="modal__content">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                @if ($item->produk)
                                    {{ $item->produk->nama }}
                                @endif
                            </h2>
                        </div>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12">
                                <label>Jumlah</label>
                                <div class="flex mt-2 flex-1 items-center">
                                    <input type="text" name="id_produk" id="id_produk"
                                        value="{{ $item->id_produk }}" hidden>
                                    <button type="button" class="button w-12 border bg-gray-200 text-gray-600 mr-1"
                                        onclick="decrementValue('{{ $item->id }}')">-</button>
                                    <input type="text" class="input w-full border text-center"
                                        id="itemQuantity_{{ $item->id }}" placeholder="Item quantity"
                                        value="{{ $item->qty }}" name="qty">
                                    <button type="button" class="button w-12 border bg-gray-200 text-gray-600 ml-1"
                                        onclick="incrementValue('{{ $item->id }}')">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="px-5 py-3 flex justify-end items-center border-t border-gray-200">
                            <button type="button" class="button w-24 border text-gray-700 mr-1"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="button w-24 bg-theme-1 text-white">Update</button>
                        </div>
                    </div>
                </form>
            </div>
    </body>
    <!-- END: Add Item Modal -->
    @endforeach

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

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('clearItemsBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Apakah Anda benar-benar ingin menghapus item ini? Proses ini tidak dapat dibatalkan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus saja!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('{{ route('delete-cart', $data['order']->id) }}', {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);

                                if (data.success) {
                                    Swal.fire({
                                        title: 'Item berhasil dihapus!',
                                        icon: 'success',
                                    }).then(() => {
                                        location.reload();
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                        location.reload();
                    }
                });

            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('checkoutBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Anda yakin ingin submit?',
                    text: 'Cek Kembali Total Penjualan hari ini Sebelum Submit',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Submit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Eksekusi aksi checkout secara langsung
                        document.getElementById('checkoutForm').submit();
                    }
                });
            });
        });
    </script>


@endsection
