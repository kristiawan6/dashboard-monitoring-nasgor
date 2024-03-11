<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
    <a href="{{ route('dashboard') }}" class="flex mr-auto">
                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="w-28"
                    src="{{ asset('dist/images/logoguyub.png') }}">
                {{-- <span class="hidden xl:block text-white text-lg ml-3 font-medium">SISILIIAA KITCHEN</span> --}}
            </a>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul>
                @foreach ($side_menu as $menu)
                    @if ($menu == 'devider')
                        <li class="side-nav__devider my-6"></li>
                    @else
                        <li>
                            <a href="{{ isset($menu['layout']) ? route('page', ['layout' => $menu['layout'], 'pageName' => $menu['page_name']]) : 'javascript:;' }}"
                                class="{{ $first_page_name == $menu['page_name'] ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="{{ $menu['icon'] }}"></i>
                                </div>
                                <div class="side-menu__title">
                                    {{ $menu['title'] }}
                                    @if (isset($menu['sub_menu']))
                                        <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                                    @endif
                                </div>
                            </a>
                            @if (isset($menu['sub_menu']))
                                <ul class="{{ $first_page_name == $menu['page_name'] ? 'side-menu__sub-open' : '' }}">
                                    <li>
                                        <a href="{{ route('order') }}"
                                            class="{{ $first_page_name == $menu['page_name'] ? 'side-menu side-menu--active' : 'side-menu' }}">
                                            <div class="side-menu__icon">
                                                <i data-feather="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Sales Report
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('stok') }}"
                                            class="{{ $first_page_name == $menu['page_name'] ? 'side-menu side-menu--active' : 'side-menu' }}">
                                            <div class="side-menu__icon">
                                                <i data-feather="activity"></i>
                                            </div>
                                            <div class="side-menu__title">
                                                Stock
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            </ul>
</div>
<!-- END: Mobile Menu -->
