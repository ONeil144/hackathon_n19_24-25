@extends('layouts.layout')

@section('title', 'Patient/list')
@section('content')
<a href="{{ route('patients.create') }}" class="w3-bar-item w3-button w3-blue">Enregistrer patient</a>
  <p>Voici ici la liste des patients</p>

  <input class="w3-input w3-border w3-padding" type="text" placeholder="Recherche par code patient.." id="myInput" onkeyup="myFunction()">
  <input class="w3-input w3-border w3-padding" type="text" placeholder="Recherche par  stade.." id="filterstade" onkeyup="filtrerParstade()"></p>
  <p><table class="w3-table-all w3-striped w3-margin-top" id="myTable">
    <tr>
      <th>Code Personnel</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Ville</th>
      <th>Stade</th>
      <th>Option</th>
    </tr>
    <tr>
      <td>A234</td>
      <td>codjo</td>
      <td>Fred</td>
      <td>Cotonou</td>
      <td>2</td>
      <td>
        <a href="#" class=" w3-button w3-blue">
            <i class="fa fa-edit"></i>
        </a>
        <a href="#" class=" w3-button w3-red "><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    <tr>
      <td>B100</td>
      <td>Berglunds </td>
      <td>Blaise</td>
      <td>Savalou</td>
      <td>1</td>
      <td>
        <a href="#" class="w3-bar-item w3-button w3-blue">
            <i class="fa fa-edit"></i>
        </a>
        <a href="#" class="w3-bar-item w3-button w3-red"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
   
  </table>

  
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function filtrerParstade() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterstade");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

@endsection