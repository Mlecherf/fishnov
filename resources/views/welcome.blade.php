<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fishnov</title>
        <style>
            body {
                background-color: #ABBBCC;
                overflow: hidden;
            }
            .sub-div {
                margin: auto;
                width: fit-content;
                padding: 10px;
                margin-top: 50px;
                display: flex;
                position: relative;
            }

            .sub-div button {
                background-color: #DBDEE2; /* Green */
                color: white;
                padding: 15px 128px;
                font-size: 39px;
                text-align: center;
                color: #12507C;
                text-decoration: none;
                border-radius: 8px;
            }

            .sub-div button:hover {
                background-color: #12507C;
            }
            .text-div {
                margin: auto;
                width: fit-content;
            }

            .text-div h1 {
                font-size: 64px;
                font-family: Arial, Helvetica, sans-serif;
                text-align: center;
                color: #12507C;
                text-decoration: none;
                display: inline-block;
                border-radius: 8px;
            }
            
            .main-div img {
                width: 10%;
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


            div ul li {
                background-color: #DBDEE2;
            }
            div ul li {
                --c: #12507C;
                color: var(--c);
                font-size: 16px;
                border: 0.3em solid var(--c);
                border-radius: 0.5em;
                width: 12em;
                text-transform: uppercase;
                font-weight: bold;
                font-family: sans-serif;
                letter-spacing: 0.1em;
                text-align: center;
                line-height: 3em;
                position: relative;
                overflow: hidden;
                z-index: 1;
                transition: 0.5s;
                margin: 1em;
            }

            div ul li span {
                position: absolute;
                width: 25%;
                height: 100%;
                background-color: var(--c);
                transform: translateY(150%);
                border-radius: 50%;
                left: calc((var(--n) - 1) * 25%);
                transition: 0.5s;
                transition-delay: calc((var(--n) - 1) * 0.1s);
                z-index: -1;
            }

            div ul li:hover {
                color: black;
            }

            div ul li:hover span {
                transform: translateY(0) scale(2);
            }

            div ul li span:nth-child(1) {
                --n: 1;
            }

            div ul li span:nth-child(2) {
                --n: 2;
            }

            div ul li span:nth-child(3) {
                --n: 3;
            }

            div ul li span:nth-child(4) {
                --n: 4;
            }

            a { color: inherit; } 
            a:link { text-decoration: none; }
            a:visited { text-decoration: none; }
            a:hover { text-decoration: none; }
            a:active { text-decoration: none; }
        </style>

    </head>
    <body class="antialiased">
        
        <div class="main-div">
            <a href="{{ route('home') }}" ><img src="{{ asset('img/fish.png') }}" alt="tag" /></a>
            <div class="text-div">
                <h1>Home</h1>
            </div>
            @if (Route::has('login'))
                @auth
                    <div class="sub-div">
                        <ul>
                            <li>
                                <a href="{{ url('/profile') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                    Dashboard
                                </a>
                                <span></span><span></span><span></span><span></span>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="sub-div">
                        
                        <ul>
                            <li>
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
                                    Login
                                </a>
                                <span></span><span></span><span></span><span></span>
                             </li>
                        </ul>
                        
                        @if (Route::has('register'))
                            <ul>
                                <li>
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">
                                        Register
                                    </a>
                                    <span></span><span></span><span></span><span></span>
                                 </li>
                            </ul>
                        @endif
                    </div>
                @endauth
            @endif


            <svg class="editorial"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 24 150 28"
                preserveAspectRatio="none">
                <defs>
                <path id="gentle-wave"
                d="M-160 44c30 0 
                    58-18 88-18s
                    58 18 88 18 
                    58-18 88-18 
                    58 18 88 18
                    v44h-352z" />
                </defs>
                <g class="parallax">
                <use xlink:href="#gentle-wave" x="50" y="0" fill="#4579e2"/>
                <use xlink:href="#gentle-wave" x="50" y="3" fill="#3461c1"/>
                <use xlink:href="#gentle-wave" x="50" y="6" fill="#2d55aa"/>  
                </g>
            </svg>
        </div>
    </body>
</html>
