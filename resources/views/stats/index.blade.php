<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fishings') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: fit-content;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 md:items-center" id="div_trawler"  >  
                  <h1>Trawler table</h1>
                    <table id="trawler_table" aria-labelledby="dropdownMenuButton">
                        <tr>
                            <th onclick="sortTable(0)">Firstname</th>
                            <th onclick="sortTable(1)">Lastname</th>
                            <th onclick="sortTable(2)">Email</th>
                            <th onclick="sortTable(3)">Trawler ID</th>
                            <th onclick="sortTable(4)">Pêches</th>
                            @if(Auth::user()->type == "manager")
                              <th>Actions</th>
                            @endif
                        </tr>
                            @foreach ($allTrawler as $user)
                                <tr>
                                    <td>
                                        {{$user->first_name}}
                                    </td>
                                    <td>
                                        {{$user->last_name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {{$user->registration_trawler}}
                                    </td>
                                    <td>
                                        @php
                                            $count = count(App\Models\Fishing::where('id_user', $user->id)->get());
                                        @endphp
                                        {{$count}}
                                    </td>
                                    <td>
                                      @if(Auth::user()->is_admin == 1 && $user->id != Auth::user()->id)
                                        <form class="grid grid-cols-12 gap-4 w-full" method="post" action="{{ route('user.delete', $user->id) }}">
                                          @csrf
                                            <button>Delete [❌]</button>
                                        </form>
                                      @endif
                                      <form class="grid grid-cols-12 gap-4 w-full" method="post" action="{{ route('stats.details', $user->id) }}">
                                        @csrf
                                          <button>Details [🔍]</button>
                                      </form>
                                    </td>
                                </tr>
                            @endforeach
                        
                    </table>              
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="width: fit-content;">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200 md:items-center">  
                <h1>Manager table</h1>
                  <table id="trawler_table">
                      <tr>
                          <th onclick="sortTable(0)">Firstname</th>
                          <th onclick="sortTable(1)">Lastname</th>
                          <th onclick="sortTable(2)">Email</th>
                          @if(Auth::user()->is_admin == 1)
                            <th>Actions</th>
                          @endif
                      </tr>
                          @foreach ($allManager as $user)
                              <tr>
                                  <td>
                                      {{$user->first_name}}
                                  </td>
                                  <td>
                                      {{$user->last_name}}
                                  </td>
                                  <td>
                                      {{$user->email}}
                                  </td>

                                  <td>
                                    @if(Auth::user()->is_admin == 1 && $user->id != Auth::user()->id)
                                      <form class="grid grid-cols-12 gap-4 w-full" method="post" action="{{ route('user.delete', $user->id) }}">
                                        @csrf
                                          <button>Delete [❌]</button>
                                      </form>
                                    @endif
                                  </td>
                              </tr>
                          @endforeach
                      
                  </table>              
              </div>
          </div>
      </div>
  </div>
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

  .dropdown div {
    display:hidden;
  }
  
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

  h1 {
    font-weight: bold;
    font-size: 150%;
  }

  
</style>