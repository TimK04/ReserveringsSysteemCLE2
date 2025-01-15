// Functie om een PHP-bestand dynamisch in te laden
function loadnavPHP(fileUrl) {
    fetch(fileUrl)
        .then(response => response.text())
        .then(data => {
            document.getElementById('contentnav').innerHTML = data; // Toon de inhoud in een container
        })
        .catch(error => console.error('Error loading PHP file:', error));
}

// Controleer de schermbreedte
if (window.matchMedia('(max-width: 480px)').matches) {
    // Laad PHP-bestand voor max-width: 480px
    loadnavPHP('include/navmobile.php');
} else {
    // Laad PHP-bestand voor min-width: 480px
    loadnavPHP('include/nav.php');
}

function burger() {
    let navLinks = document.querySelector("#nav_links");

    if (navLinks.style.display === "block") {
        navLinks.style.display = "none";
    } else {
        navLinks.style.display = "block";
    }
}

function loadfooterPHP(fileUrl) {
    fetch(fileUrl)
        .then(response => response.text())
        .then(data => {
            document.getElementById('contentfooter').innerHTML = data; // Toon de inhoud in een container
        })
        .catch(error => console.error('Error loading PHP file:', error));
}

// Controleer de schermbreedte
if (window.matchMedia('(max-width: 480px)').matches) {
    // Laad PHP-bestand voor max-width: 480px
    loadfooterPHP('include/footermobile.php');
} else {
    // Laad PHP-bestand voor min-width: 480px
    loadfooterPHP('include/footer.php');
}
