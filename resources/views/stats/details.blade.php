

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fishings') }}
        </h2>
    </x-slot>

    @foreach ($detailedFishings as $fishing)
        @php
            $dFishings = App\Models\DetailedFishing::where('id_fishing',$fishing->id_fishing)->get();
        @endphp
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: fit-content;">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <h1>{{$fishing->created_at}}</h1>
                    <div class="p-6 bg-white border-b border-gray-200 md:items-center">  
                        <table id="fish_table">
                            <tr>
                                <th onclick="sortTable(0)">Type</th>
                                <th onclick="sortTable(1)">Quantity</th>
                            </tr>
                            @foreach ($dFishings as $dFishing)
                                <tr>
                                    <td>
                                        {{$dFishing->type_fish}}
                                    </td>
                                    <td>
                                        {{$dFishing->quantity}}
                                    </td>
                                </tr>
                            @endforeach  
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-app-layout>

<script>
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("fish_table");
      switching = true;
      // Set the sorting direction to ascending:
      dir = "asc";
      /* Make a loop that will continue until
      no switching has been done: */
      while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
          // Start by saying there should be no switching:
          shouldSwitch = false;
          /* Get the two elements you want to compare,
          one from current row and one from the next: */
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /* Check if the two rows should switch place,
          based on the direction, asc or desc: */
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              // If so, mark as a switch and break the loop:
              shouldSwitch = true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /* If a switch has been marked, make the switch
          and mark that a switch has been done: */
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          // Each time a switch is done, increase this count by 1:
          switchcount ++;
        } else {
          /* If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again. */
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }
    </script>
<style>
  td {
    padding-top:20px;
    padding-bottom:20px;
    padding-right:20px;   
  }

  td:first-child {
    padding-left:20px;
    padding-right:0;
  }

  th, td {
    padding: 15px;
  }
</style>
