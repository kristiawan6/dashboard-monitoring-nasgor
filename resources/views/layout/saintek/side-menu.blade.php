@extends('layout.main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('layout.saintek.mobile-menu')
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="/" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="w-36"
                    src="{{ asset('dist/images/logoguyub.png') }}">
                {{-- <span class="hidden xl:block text-white text-lg ml-3 font-medium">SISILIIAA KITCHEN</span> --}}
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li class="side-nav__devider my-6"></li>

                <li>
                    <a href="#" class="side-menu side-menu--active">
                        <div class="side-menu__icon">
                            <i data-feather=""></i>
                        </div>
                        <div class="side-menu__title">
                            Pesanan
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>

                        </div>
                    </a>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-feather=""></i>
                        </div>
                        <div class="side-menu__title">
                            Stok
                            <i data-feather="chevron-down" class="side-menu__sub-icon"></i>

                        </div>
                    </a>

                    {{-- <ul class="side-menu__sub-open">
                        <li>
                            <a href="#" class="side-menu">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    tesss
                                    <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                                </div>
                            </a>
                            <ul class="side-menu__sub-open">
                                <li>
                                    <a href="#" class="side-menu">
                                        <div class="side-menu__icon">
                                            <i data-feather="zap"></i>
                                        </div>
                                        <div class="side-menu__title">qwer
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('layout.saintek.top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
