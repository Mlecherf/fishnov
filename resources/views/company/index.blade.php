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
                    <table id="company_table">
                        <tr>
                            @if($user->id_company === Null)
                                <div>
                                    <a type="button" style="background-color: #DBDEE2" href="{{ route('company.create.get') }}">Create</a>
                                </div>
                                
                                <div>
                                    <a type="button" style="background-color: #DBDEE2" href="{{ route('company.join.get') }}">Join</a>
                                </div>                              
                            @else
                                <tr>{{$company->name_company}}</tr><br>
                                <tr>{{$company->token_company}}</tr>
                            @endif
                            
                        </tr>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
