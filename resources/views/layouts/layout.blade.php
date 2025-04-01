<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PROJET_AI4CKD</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="cursor: default">

    <!-- Barre de navigation -->
    <div class="w3-sidebar w3-bar-block w3-border-bottom w3-animate-left w3-pink" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Fermer &times;</button>
    <a href="{{ route('accueil') }}" class="w3-bar-item w3-button">Dashboard</a>
    <a href="#" class="w3-bar-item w3-button" onclick="openModal('workflow')">Workflow</a>
    <div class="w3-dropdown-click">
    <button class="w3-button  w3-border-bottom" onclick="toggleDropdown('dropdown1')">Patient <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border" id="dropdown1">
        <a href="{{ route('patients.liste') }}" class="w3-bar-item w3-button">Patient</a>
        <a href="#" class="w3-bar-item w3-button">Dossier Médical</a>
        </div>
  </div>
  <div class="w3-dropdown-click">
    <button class="w3-button w3-border-bottom " onclick="toggleDropdown('dropdown2')">Consultation  <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-border" id="dropdown2">
      <a href="#" class="w3-bar-item w3-button" onclick="openModal('consulte')">Enregistrer une  consultations</a>
      <a href="{{ route('consultation.liste') }}" class="w3-bar-item w3-button">Liste Consultation</a>
      
    </div>
  </div>
    <a href="#" class="w3-bar-item w3-button  w3-border-bottom">NOTIFICATION</a>
    <div class="w3-dropdown-click">
        <button class="w3-button  w3-border-bottom " onclick="toggleDropdown('dropdown3')">Profil  <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border" id="dropdown3">
        <a href="#" class="w3-bar-item w3-button">Mon profil</a>
        <a href="#" class="w3-bar-item w3-button">Deconnecter</a>
        </div>
    </div>

    <div class="w3-dropdown-click">
    <button class="w3-button  w3-border-bottom" onclick="toggleDropdown('dropdown4')">Traitements <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border" id="dropdown4">
        <a href="{{ route('traitement.ajout') }}" class="w3-bar-item w3-button">Ajouter un traitement</a>
        <a href="#" class="w3-bar-item w3-button">Les traitements Prescrits</a>
        </div>
    </div>

    <div class="w3-dropdown-click">
    <button class="w3-button  w3-border-bottom" onclick="toggleDropdown('dropdown5')">Examens <i class="fa fa-caret-down"></i></button>
        <div class="w3-dropdown-content w3-bar-block w3-border" id="dropdown5">
        <a href="{{ route('examen.ajout') }}" class="w3-bar-item w3-button">Registrer un examen</a>
        <a href="#" class="w3-bar-item w3-button">Liste des examens</a>
        </div>
    </div>
</div>


    <!-- Contenu principal -->
    <div class="w3-container w3-padding" id="main">
       <div class="w3-indigo w3-container">
            <button id="openNav" class="w3-button  w3-xlarge" onclick="w3_open()">&#9776;</button>
            <div class="w3-container w3-right">
                <span class="w3-tag w3-spin fa fa-plus w3-jumbo w3-red"></span>
                <span class="w3-tag  ">A</span>
                <span class="w3-tag w3-white">I</span>
                <span class="w3-tag  w3-yellow">4</span>
                <span class="w3-tag ">C</span>
                <span class="w3-tag w3-white">K</span>
                <span class="w3-tag ">D</span>
            </div>

        </div>

        <div class="w3-content w3-section" style="max-width:100%; max-height:200px; overflow:hidden; object-fit: cover;">
            <img class="mySlides" src="{{ asset('images/img_slide1.jpg') }}" style="width:100%; max-height:300px; object-fit:cover;">
            <img class="mySlides" src="{{ asset('images/img_slide2.jpg') }}" style="width:100%; max-height:300px; object-fit:cover;">
            <img class="mySlides" src="{{ asset('images/img_slide4.jpg') }}" style="width:100%; max-height:300px; object-fit:cover;">
        </div>

<!-- fenetre modale pour enregistrer une consultation -->

<div id="consulte" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4 w3-padding-large">
    <span onclick="closeModal('consulte')"
    class="w3-button w3-display-topright">&times;</span>
      <div class="w3-container w3-green">
      <h2>Enregistrer une consultation</h2>
      </div>
      <div class="w3-container">
        <form class="w3-container">
            <p>
            <label>Code personnel du patient</label></p>
            <input class="w3-input" type="text" >
            <p>   
            <label>Allergies</label>  
            <input class="w3-input" type="text">
            </p>
            <p>   
            <label>Antecedents Médicaux</label>  
            <input class="w3-input" type="text">
            </p>
            <p>  
            <label>Raison consultation</label>   
            <input class="w3-input" type="text">
            </p>
            <p>    
            <label>Diagnostic</label> 
            <input class="w3-input" type="text">
            </p>
            <p>   
            <label>Observation</label>  
            <input class="w3-input" type="text">
            </p>
            <p>    
            <label>Status</label> 
            <input class="w3-input" type="text">
            </p>

            <button class="w3-btn w3-blue-grey">Registrer</button>
        
            </form>
      </div>
    </div>
    </div>
    <!-- fin modale consultation -->

    <!-- debut modale workflow -->
    <div id="workflow" class="w3-modal">
    <div class="w3-modal-content w3-animate-top w3-card-4 w3-padding-large">
        <span onclick="closeModal('workflow')" class="w3-button w3-display-topright">&times;</span>
        <div class="w3-container w3-green">
            <h2>Créer workflow</h2>
        </div>
        <div class="w3-container">
            <form class="w3-container">
                <p>
                    <label>Intitulé Workflow</label>
                </p>
                <input class="w3-input" type="text" name="workflow_name">
                <p>
                    <label>Description du Workflow</label>
                </p>
                <input class="w3-input" type="text" name="workflow_description">
                <button class="w3-btn w3-blue-grey">Créer</button>
            </form>
        </div>
    </div>
    </div>
    <!-- fin modale workflow -->
  </div>
  </div>
  <div class="w3-container w3-padding w3-section w3-margin-top" >
        @yield('content')
    </div>

    <!-- Pied de page -->
    <footer class="w3-container w3-purple w3-center w3-padding w3-section" >
        <p>© {{ date('Y') }} HACKATON - Tous droits réservés.</p>
    </footer>
    <script>
        function w3_open() {
            document.getElementById("main").style.marginLeft = "25%";
            document.getElementById("mySidebar").style.width = "25%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }


var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 5000); // Change image every 5 seconds
}

function toggleDropdown(id) {
    // Fermer tous les dropdowns
    var dropdowns = document.getElementsByClassName("w3-dropdown-content");
    for (var i = 0; i < dropdowns.length; i++) {
        if (dropdowns[i].id !== id) {
            dropdowns[i].classList.remove("w3-show");
        }
    }

    // Afficher/Masquer le dropdown cliqué
    var dropdown = document.getElementById(id);
    dropdown.classList.toggle("w3-show");
}

// Fermer les dropdowns si on clique en dehors
window.onclick = function(event) {
    if (!event.target.matches('.w3-button')) {
        var dropdowns = document.getElementsByClassName("w3-dropdown-content");
        for (var i = 0; i < dropdowns.length; i++) {
            dropdowns[i].classList.remove("w3-show");
        }
    }
}

function openModal(id) {
    // Ferme toutes les autres modales avant d'en ouvrir une nouvelle
    var modals = document.getElementsByClassName("w3-modal");
    for (var i = 0; i < modals.length; i++) {
        modals[i].style.display = "none";
    }

    // Ouvre la modale souhaitée
    document.getElementById(id).style.display = 'block';
}

function closeModal(id) {
  var modal = document.getElementById(id);
    if (event.target === modal || event.target.classList.contains('w3-display-topright')) {
        modal.style.display = 'none';
}
}


</script>


</body>
</html>
