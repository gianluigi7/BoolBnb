{{--? HEADER COMPONENT --}}
<header class="sticky-top">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <div class="logo_boolbnb">
                        {{--? SVG --}}
                        <?xml version="1.0" encoding="UTF-8" standalone="no"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg width="80%" height="75%" viewBox="0 0 4000 1459" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.5;">
                            <g>
                                <path d="M1066.52,396.369l0,665.167c0,134.087 -108.861,242.949 -242.949,242.949l-485.897,-0c-134.087,-0 -242.949,-108.862 -242.949,-242.949l-0,-665.167c-0,-134.087 108.862,-242.949 242.949,-242.949l485.897,0c134.088,0 242.949,108.862 242.949,242.949Z" style="fill:none;stroke:#00d9a6;stroke-width:37.5px;"/>
                                <path d="M401.636,809.954l0.592,-158.897l250.701,-0c55.849,-0 103.01,-46.348 103.01,-102.627l0,-14.346c0,-55.175 -47.161,-102.626 -103.01,-102.626l-249.963,-0l0.611,-171.045l282.861,0c150.172,0 251.942,92.695 251.942,229.531l-0,76.142c-0,59.59 -28.546,121.387 -74.466,163.32l1.241,0c60.814,39.727 86.877,101.524 86.877,163.32l-0,58.487c-0,156.699 -104.252,248.29 -251.942,248.29l-299.868,0l2.006,-173.251l263.112,-0c57.09,-0 104.251,-46.348 104.251,-103.731l0,-9.931c0,-56.28 -47.161,-102.627 -104.251,-102.627" style="fill:#00d9a6;"/>
                                <path d="M386.418,260.413l-5.362,939.09c-34.665,0 -95.452,-23.792 -124.22,-52.787c-28.769,-28.994 -48.389,-85.022 -48.389,-121.18l-0,-598.829c-0,-37.459 24.238,-88.805 53.9,-116.521c29.662,-27.716 85.59,-49.773 124.071,-49.773Z" style="fill:#00d9a6;"/><g transform="matrix(0.868493,0,0,1,-64.7444,0)"><g transform="matrix(823.376,0,0,823.376,4619.49,1073.99)">
                            </g>
                            <text x="1397.62px" y="1073.99px" style="font-family:'BMDoHyeon-OTF', 'BM Dohyeon', sans-serif;font-size:823.376px;fill:#00d9a6;">boolbnb</text></g></g>
                        </svg>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>

                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.homes.index') }}">{{ __('Lista Case') }}</a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>