@extends('layouts.layout')

@section('title', 'Patient/list')
@section('content')
<h2>Patients</h2>
  <p>Voici ici la liste des consultation</p>

  <input class="w3-input w3-border w3-padding" type="text" placeholder="Recherche par code patient.." id="myInput" onkeyup="myFunction()">

  <table class="w3-table-all w3-striped w3-margin-top" id="myTable">
    <tr>
      <th>Patient</th>
      <th>Date consultation</th>
      <th>Dossier Médical</th>
    </tr>
    <tr>
      <td>Ajo Codjo</td>
      <td>12/01/2024</td>
      <td><a href="#" class="w3-bar-item w3-button w3-white w3-border-bottom">DossierMédical</a></td>
    </tr>
    <tr>
      <td>Berglunds Blaise</td>
      <td>12/04/2024 </td>
      <td><a href="#" class="w3-bar-item w3-button w3-white w3-border-bottom">DossierMédical</a></td></td>

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
</script>

@endsection