<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 md:items-center">  
                  <form method="POST" action={{ route('company.join.post') }}>
                    @csrf
                    <div>
                        <label for="token_company">
                            {{ __('Company Token') }}
                        </label>
                        <input id="token_company" type="text" name="token_company" value="{{ old('token_company') }}" required autofocus>
                    </div>   
                    <div>
                        <button type="submit">
                            {{ __('Join') }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
