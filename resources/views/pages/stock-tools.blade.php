@extends('../layout/' . $layout)

@section('subhead')
<title>CRUD Data List - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">Stock Management</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <button class="button text-white bg-theme-1 shadow-md mr-2">Add New Product</button>
        <div class="dropdown relative">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-feather="plus"></i>
                </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                        <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                    </a>
                </div>
            </div>
        </div>
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">IMAGES</th>
                    <th class="whitespace-no-wrap">PRODUCT NAME</th>
                    <th class="text-center whitespace-no-wrap">STOCK</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($data as $item)
                <tr class="intro-x">
                    <td class="w-40">
                        <div class="flex">
                            <div class="w-10 h-10 image-fit zoom-in">
                                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="tooltip rounded-full" src="/user/images/product{{ $no++ }}.png">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-no-wrap">{{ $item->nama }}</a>
                        <div class="text-gray-600 text-xs whitespace-no-wrap">Makanan</div>
                    </td>
                    <td class="text-center">{{ $item->stok }}</td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex items-center text-theme-11" href="javascript:;" data-toggle="modal" data-target="#edit-confirmation-modal{{ $item->id }}">
                                <i data-feather="edit-3" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->

</div>
<!-- BEGIN: edit Confirmation Modal -->
@foreach ($data as $item)
<div class="modal" id="edit-confirmation-modal{{ $item->id }}">
    <div class="modal__content">
        <form action="{{ route('edit-stock', $item->id) }}" method="POST">
            @csrf
            <div class="p-5 text-center">
                <div class="flex mt-2 flex-1">
                    <button type="button" class="button w-12 border bg-gray-200 text-gray-600 mr-1" onclick="decrementValue('{{ $item->id }}')">-</button>
                    <input type="text" name="stok" class="input w-full border text-center" id="itemQuantity_{{ $item->id }}" placeholder="Item quantity" value="{{ $item->stok }}">
                    <button type="button" class="button w-12 border bg-gray-200 text-gray-600 ml-1" onclick="incrementValue('{{ $item->id }}')">+</button>
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <input type="submit" value="Edit" class="button w-24 bg-theme-11 text-white"></input>
            </div>
        </form>
    </div>
</div>
@endforeach
<!-- END: edit Confirmation Modal -->
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