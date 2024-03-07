@extends('../layout/' . $layout)

@section('head')
    <title>Login - Saintek</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Login Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <div class="my-auto">
                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="-intro-x w-1/2 -mt-16"
                        src="/user/images/logo.png">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">Sisiliiaa Kitchen</div>
                    <div class="-intro-x mt-5 text-lg text-white">IPA x RPL</div>
                </div>
            </div>
            <!-- END: Login Info -->
            <!-- BEGIN: Login Form -->
            <form action="{{ route('login-proses') }}" method="post">
                @csrf
                <div class="h-screen xl:h-center flex py-5 xl:py-0 my-10 xl:my-0">
                    <div
                        class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">Sign In</h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your
                            account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <input type="text" class="intro-x login__input input input--lg border border-gray-300 block"
                                placeholder="Username" id="username" name="username" required>
                            <input type="password"
                                class="intro-x login__input input input--lg border border-gray-300 block mt-4"
                                placeholder="Password" id="password" name="password" required>
                        </div>
                        {{-- <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                            <div class="flex items-center mr-auto">
                                <input type="checkbox" class="input border mr-2" id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                            </div>
                        </div> --}}
                        <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                            <input type="submit" value="Login"
                                class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3"></input>
                        </div>
                    </div>
                </div>
            </form>

            <!-- END: Login Form -->
        </div>
    </div>
@endsection
