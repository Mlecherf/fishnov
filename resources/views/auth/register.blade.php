

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fishnov - Register</title>
        <style>
            body {
                background-color: #ABBBCC;
            }
            .sub-div {
                margin: auto;
                width: fit-content;
                padding: 10px;
                margin-top: 50px;
                display: flex;
                position: relative;
                align-items: middle;
                text-align: center;
            }

            .sub-div-regis {
                margin: auto;
                width: fit-content;
                padding: 10px;
                margin-top: 50px;
                position: relative;
                align-items: middle;
                text-align: center;
            }

            .sub-div-regis input {
                background-color: #DBDEE2; /* Green */
                color: white;
                padding: 0px 128px;
                font-size: 39px;    
                text-align: center;
                color: #12507C;
                text-decoration: none;
                border-radius: 8px;
            }

            
            .sub-div button {
                background-color: #DBDEE2; 
                padding: 0px 128px;
                font-size: 39px;
                color: #12507C;
                text-decoration: none;
                border-radius: 8px;
            }



            .sub-div button:hover {
                background-color: #12507C;
                color:#DBDEE2;
            }

            .sub-div input {
                background-color: #DBDEE2; /* Green */
                color: white;
                padding: 0px 128px;
                font-size: 39px;    
                text-align: center;
                color: #12507C;
                text-decoration: none;
                border-radius: 8px;
            }

            .sub-div.edit input {
                padding: 0px 64px;
                background-color:red;
            }

            .sub-div a {
                font-size: 20px;
                font-family: Arial, sans-serif;
                color: #12507C;
            }

            .sub-div select {
                background-color: #DBDEE2; /* Green */
                color: white;
                padding: 0px 128px;
                font-size: 39px;    
                text-align: center;
                color: #12507C;
                text-decoration: none;
                border-radius: 8px;
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

    </head>
    <body class="antialiased">
        <div class="main-div">
            <a href="{{ route('home') }}" ><img src="{{ asset('img/fish.png') }}" alt="tag" /></a>
            <div class="text-div">
                <h1>Register</h1>
            </div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}">
                @csrf


                <div class="sub-div">
                    <x-input id="first_name" class="block mt-1 w-full" type="text" style="padding: 0px;" 
                                    name="first_name" 
                                    :value="old('first_name')" 
                                    placeholder="Firstname" 
                                    required autofocus />
                    
                    <x-input id="last_name" class="block mt-1 w-full" type="text"  style="padding: 0px;"
                                    name="last_name" 
                                    :value="old('last_name')" 
                                    placeholder="Lastname" 
                                    required autofocus />
                </div>

                <div class="sub-div">
                    <x-input id="email" class="block mt-1 w-full" type="email" 
                                    name="email" 
                                    :value="old('email')" 
                                    placeholder="Email" 
                                    required autofocus />
                </div>
                
                <div class="sub-div">
                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password"
                                    placeholder="Password" />
                </div>

                <div class="sub-div">
                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation"
                                    required autocomplete="password_confirmation"
                                    placeholder="Password Confirmation" />
                </div>

                <!-- Type -->
                <div class="sub-div">
                    <x-input for="type" value="" id="type" name="type" hidden />
                    <x-button class="ml-3" onclick="changeRegistrationVisibility(this)" type="button" >
                        Manager
                    </x-button>
                    <x-button class="ml-3" onclick="changeRegistrationVisibility(this)" type="button">
                        Trawler
                    </x-button>
                </div>

                <!-- Registration trawler -->
                <div class="sub-div-regis" id="registration_trawler_div" hidden="true">
                    <x-input id="registration_trawler_input" class="block mt-1 w-full" 
                                    type="text" 
                                    name="registration_trawler" 
                                    :value="old('registration_trawler')"
                                    placeholder="Registration trawler"/>
                </div>
                
                <div class="sub-div">
                    <x-button class="ml-3">
                        {{ __('Register') }}
                    </x-button>
                </div>

                @if (Route::has('password.request'))
                    <div class="sub-div">
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                @endif
            </form>
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

<script type="text/javascript" language="javascript">
    let reverseTrawler=false;
    let reverseManager=false;
        
    function changeRegistrationVisibility(caller){
        let element = document.getElementById("registration_trawler_div");
        let typeElement = document.getElementById("type");
        if(caller.innerText == "Trawler") {
            if(reverseManager == false) {
                if(reverseTrawler == false) {
                    reverseTrawler=true;
                    caller.style.background = "#12507C";
                    caller.style.color = "#DBDEE2";
                    element.hidden = false;
                    typeElement.value = "trawler";
                } else {
                    reverseTrawler=false;
                    element.hidden = true;
                    caller.style.background = "#DBDEE2";
                    caller.style.color = "#12507C";
                    typeElement.value = "";            
                }
            }
        } else {
            if(reverseTrawler==false) {
                if(reverseManager == false) {
                    typeElement.value = "manager";
                    reverseManager=true;
                    caller.style.background = "#12507C";
                    caller.style.color = "#DBDEE2";
                    element.hidden = true;
                } else {
                    typeElement.value = "";
                    reverseManager=false;
                    caller.style.background = "#DBDEE2";
                    caller.style.color = "#12507C";
                }
            }
        }
    }
</script>