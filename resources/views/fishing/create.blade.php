

<x-app-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <form method="post" action="{{ route('fishing.create.post', auth()->user()->id) }}">
        @csrf
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="">
                    <div class="main-div">
                        <div class="label-modify">
                            <x-label for="date">Date :</x-label>
                            <x-input id="date" type="date" name="date"  style="background: transparent; border: none;" />
                        </div>
                    </div>
                    <div id="fish-div">
                        <div class="main-div">
                            <div class="label-modify">
                                <x-label for="type">Type :</x-label>
                                <select name="type" id="type">
                                    @foreach ($fish as $fish_item)
                                            <option value="{{$fish_item}}">{{$fish_item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="main-div">
                            <div class="label-modify">
                                <x-label for="quantity">Quantity :</x-label> 
                                <x-input id="quantity" type="number" name="quantity" placeholder="Quantity in kg" style="background: transparent; border: none;" />
                            </div>
                        </div>
                    </div>
                    <div class="main-div">
                        <div class="button-modify">
                            <x-button type="submit">Ajouter</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
