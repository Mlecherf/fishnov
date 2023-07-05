

<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="post" action="{{ route('profile.update', ['id' => auth()->user()->id]) }}">
        @csrf
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="main-div">
                        <div class="label-modify">
                            Firstname :
                            <x-input id="first_name" type="text" name="first_name" value="{{auth()->user()->first_name}}" placeholder="{{auth()->user()->first_name}}" style="background: transparent; border: none;" />
                        </div>
                    </div>
                    <div class="main-div">
                        <div class="label-modify">
                            Lastname :
                            <x-input id="last_name" type="text" name="last_name" value="{{auth()->user()->last_name}}" placeholder="{{auth()->user()->last_name}}" style="background: transparent; border: none;" />
                        </div>
                    </div>
                    <div class="main-div">
                        <div class="label-modify">
                            Email :
                            <x-input id="email" type="email" name="email" value="{{auth()->user()->email}}" placeholder="{{auth()->user()->email}}" style="background: transparent; border: none;" />
                        </div>
                    </div>
                    @if (auth()->user()->type=="trawler")
                        <div class="main-div">
                            <div class="label-modify">
                                Registration :
                                <x-input id="registration_trawler" type="registration_trawler" name="registration_trawler" value="{{auth()->user()->registration_trawler}}" placeholder="{{auth()->user()->registration_trawler}}" style="background: transparent; border: none;" />
                            </div>
                        </div>
                        <div class="main-div">
                            <div class="label-modify">
                                Company Token :
                                @php
                                    $company  = App\Models\Company::where('id_company',auth()->user()->id_company)->first();
                                @endphp
                                @if ($company==null)
                                    <x-input id="token_company" type="token_company" name="token_company" value="" placeholder="" style="background: transparent; border: none;" />
                                @else 
                                    <x-input id="token_company" type="token_company" name="token_company" value="{{$company->token_company}}" placeholder="{{$company->token_company}}" style="background: transparent; border: none;" />       
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="main-div">
                        <div class="button-modify">
                            <x-button type="submit">Modifier</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
