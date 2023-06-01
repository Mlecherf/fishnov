<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
        @if ($user->is_admin)
            <a class="font-semibold  text-gray-800 leading-tight" href="/">
                {{ __('➕ Add a company') }}
            </a>
        @endif
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 md:items-center"> 
                    <table id="company_table">
                        <tr>
                            <th onclick="sortTable(0)">ID</th>
                            <th onclick="sortTable(1)">Company</th>
                            <th onclick="sortTable(2)">Admin</th>
                            @if ($user->is_admin)
                                <th onclick="sortTable(3)">Actions</th>
                            @endif
                        </tr>
                        @foreach ($allCompanies as $company)
                        <tr>
                            <td>
                                {{$company->id_company}}
                            </td>
                            <td>
                                {{$company->name_company}}
                            </td> 
                            <td>
                                {{$company->name_admin_company}}
                            </td>
                            @if ($user->is_admin)
                                <td>
                                    <form method="post" action="{{ route('company.action', $company->id_company  ) }}">
                                        @csrf
                                        <select onchange="this.form.submit()" onfocus="this.selectedIndex = -1;">
                                            <option name="delete" id="delete" value="delete">
                                                {{ __('➖ Delete') }}
                                            </option>
                                            <option name="modify" id="modify" value="edit">
                                                {{ __('⚙️ Modifier') }}
                                            </option>
                                        </select>
                                    </form>
                                </td>
                            @endif
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
      table = document.getElementById("company_table");
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