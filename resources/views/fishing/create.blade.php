@php
    $fish_json = json_encode($fish);
@endphp

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
                            <x-input id="date" type="date" name="date[0]"  style="background: transparent; border: none;" />
                        </div>
                    </div>
                    <div id="fish-div">
                        <div class="main-div">
                            <div class="label-modify">
                                <x-label for="type">Type :</x-label>
                                <select name="type[0]" id="type">
                                    @foreach ($fish as $fish_item)
                                            <option value="{{$fish_item}}">{{$fish_item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="main-div">
                            <div class="label-modify">
                                <x-label for="quantity">Quantity :</x-label> 
                                <x-input id="quantity" type="number" name="quantity[0]" placeholder="Quantity in kg" style="background: transparent; border: none;" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="main-div">
                        <x-button type="button" style="margin-top:10px;" onclick="clickHandler()">➕</x-button>
                    </div>

                    <div class="main-div">
                        <div class="button-modify" style="background-color: transparent">
                            <x-button type="submit" >Ajouter</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>


<script>
    function clickHandler()
    {
        let target = document.querySelector("#fish-div");
        let countChild = (target.childElementCount/2);
        let labelToAdd = createFishLabel(countChild);
        let quantityLabelTOAdd = createQuantityLabel(countChild);
        target.appendChild(labelToAdd);
        target.appendChild(quantityLabelTOAdd);
    }

    function createFishLabel(countChild) 
    {
        let toAdd = document.createElement("div");
        toAdd.classList.add("main-div")

        let labelAdd = document.createElement("div");
        labelAdd.classList.add("label-modify")

        let xLabelAdd = document.createElement("label");
        xLabelAdd.htmlFor = 'type'
        xLabelAdd.innerText = 'Type :'
        xLabelAdd.className = "block font-medium text-sm text-gray-700"
        
        let selectAdd = document.createElement("select");
        selectAdd.setAttribute('id','type')
        selectAdd.setAttribute('name','type['+ countChild.toString() +']')
        
        let fish =  {!! $fish_json !!};
        fish.forEach($fish_item=> {
            let optionAdd = document.createElement("option");
            optionAdd.value = $fish_item
            optionAdd.innerText = $fish_item
            selectAdd.appendChild(optionAdd)
        });

        labelAdd.appendChild(xLabelAdd);
        labelAdd.appendChild(selectAdd);
        toAdd.appendChild(labelAdd);

        return toAdd;
    }

    function createQuantityLabel(countChild)
    {
        let toAdd = document.createElement("div");
        toAdd.classList.add("main-div")

        let labelAdd = document.createElement("div");
        labelAdd.classList.add("label-modify")

        let xLabelAdd = document.createElement("label");
        xLabelAdd.className = "block font-medium text-sm text-gray-700"
        xLabelAdd.htmlFor = 'quantity'
        xLabelAdd.innerText = 'Quantity :'
        
        let xInputAdd = document.createElement("input");
        xInputAdd.setAttribute('id','quantity')
        xInputAdd.setAttribute('name','quantity['+ countChild.toString() + ']')
        xInputAdd.setAttribute('type','number')
        xInputAdd.setAttribute('placeholder','Quantity in kg')
        xInputAdd.className = "rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
        xInputAdd.style.background = "transparent"
        xInputAdd.style.border = "none"

        labelAdd.appendChild(xLabelAdd);
        labelAdd.appendChild(xInputAdd);
        toAdd.appendChild(labelAdd);

        return toAdd;
    }
</script>