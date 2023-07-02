<style>
    nav {
        background-color: #ABBBCC;
    }

    .main-div {
        display: flex;
        align-items: center;
        justify-content: center
    }
    .label-modify {
        margin-top: 2%;
        background-color: #DBDEE2; /* Green */
        color: white;
        padding: 10px 15px;
        font-size: 20px;
        width: fit-content;
        color: #12507C;
        text-decoration: none;
        border-radius: 8px;
        
    }
    .button-modify {
        margin-top: 2%;
        background-color: #DBDEE2; /* Green */
        color: white;
        padding: 10px 15px;
        font-size: 20px;
        width: fit-content;
        color: #12507C;
        text-decoration: none;
        border-radius: 8px;
    }

    .nav-link {
        margin-top: 10%;
        background-color: #DBDEE2; /* Green */
        color: white;
        padding: 10px 15px;
        font-size: 20px;
        text-align: center;
        color: #12507C;
        text-decoration: none;
        border-radius: 8px;
    }

    .right {
        margin-left: 100%;
    }

    ::selection{background-color: salmon; color: white;}
    .parallax > use{
        animation:move-forever 12s linear infinite;
        &:nth-child(1){animation-delay:-2s;}
        &:nth-child(2){animation-delay:-2s; animation-duration:5s}
        &:nth-child(3){animation-delay:-4s; animation-duration:3s}
    }

    @keyframes move-forever{
        0%{transform: translate(-90px , 0%)}
        100%{transform: translate(85px , 0%)} 
    }

    .editorial {
        display: block;
        bottom: 0;
        margin-top: 9%;
    }

    .login-errors-label {
        background-color: #a11300; /* Green */
        padding: 15px 128px;
        font-size: 30px;
        font-family: Arial, sans-serif;
        text-align: center;
        color: rgb(35, 35, 35);
        text-decoration: none;
        border-radius: 8px;
    }

    .login-errors {
        background-color: #a11300; /* Green */
        padding: 15px 128px;
        font-size: 30px;
        font-family: Arial, sans-serif;
        text-align: center;
        color: rgb(0, 0, 0);
        text-decoration: none;
        border-radius: 8px;
    }

    a { color: inherit; } 
    a:link { text-decoration: none; }
    a:visited { text-decoration: none; }
    a:hover { text-decoration: none; }
    a:active { text-decoration: none; }
    
    span {
        display:block;
    }
</style>
    
<nav>
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="main-div">
                    <a href="{{ route('dashboard') }}" >
                        <img src="{{ asset('img/fish.png') }}" alt="tag" />
                    </a>
                </div> --}}


                <!-- Navigation Links -->

                @manager
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="nav-link" :href="route('company.index')" :active="request()->routeIs('company.index')">
                        {{ __('Company') }}
                    </x-nav-link>
                </div>  

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="nav-link" :href="route('stats.index')" :active="request()->routeIs('stats.index')">
                        {{ __('Stats') }}
                    </x-nav-link>
                </div> 
                @endmanager
                   
                @trawler
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="nav-link" :href="route('fishing.index')" :active="request()->routeIs('fishing.index')">
                        {{ __('Fishings') }}
                    </x-nav-link>
                </div> 
                @endtrawler

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex right">
                    <x-nav-link class="nav-link" :href="route('profile')" :active="request()->routeIs('profile')">
                        {{ __('Profile') }}
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link class="nav-link" :href="route('logout')"
                                onclick="event.preventDefault();
                                        document.getElementById('form_logout').submit();">
                        <form method="POST" action="{{ route('logout') }}" id="form_logout">
                            @csrf
                            {{ __('Logout') }}
                        </form>
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('profile')" :active="request()->routeIs('profile')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
