@extends('../layout/' . $layout)

@section('subhead')
    <title>Dashboard - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    <a href="" class="ml-auto flex text-theme-1">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $data['item_sales'] }}</div>
                                <div class="text-base text-gray-600 mt-1">Menu Sales</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $data['orders'] }}</div>
                                <div class="text-base text-gray-600 mt-1">Total Report</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $data['items'] }}</div>
                                <div class="text-base text-gray-600 mt-1">Stock Available</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">Rp.{{ number_format($data['revenue']) }}, -
                                </div>
                                <div class="text-base text-gray-600 mt-1">Total Income</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                        {{-- <div class="text-base text-gray-600 mt-1">40%</div> --}}
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">
                                    Rp.{{ number_format($data['revenue'] * 0.4) }},
                                    -
                                </div>
                                <div class="text-base text-gray-600 mt-1">Total Pendapatan Modal</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">
                                    Rp.{{ number_format($data['revenue'] * 0.36) }}, -
                                </div>
                                <div class="text-base text-gray-600 mt-1">Total Profit Tukang</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="dollar-sign" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">

                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">
                                    Rp.{{ number_format($data['revenue'] * 0.24) }}, -
                                </div>
                                <div class="text-base text-gray-600 mt-1">Total Profit Dani</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
    @endsection
