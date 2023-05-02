<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- First Name -->
            <div>
                <x-label for="first_name" :value="__('First Name')" />

                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
            </div>

            <!-- Last Name -->
            <div class="mt-4">
                <x-label for="last_name" :value="__('Last Name')" />

                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Type -->
            <div class="mt-4">
                <x-label for="type" :value="__('Type')" />
                <select name="type" id="type" onchange="changeRegistrationVisibility()">
                    <option value="manager">Manager</option>
                    <option value="trawler">Trawler</option>
                </select>
            </div>

            <!-- Registration trawler -->
            <div class="mt-4" id="registration_trawler_div" hidden="true">
                <x-label for="registration_trawler" :value="__('Registration Trawler')" />
                <x-input id="registration_trawler_input" class="block mt-1 w-full" type="text" name="registration_trawler" :value="old('registration_trawler')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script>
    function changeRegistrationVisibility(caller){
        let element = document.getElementById("registration_trawler_div");
        let value = document.getElementById("type").value;
        if(value == "trawler") {
            element.hidden = false;
        } else {
            document.getElementById("registration_trawler_input").value = "";
            element.hidden = true;
        }
    }
</script>