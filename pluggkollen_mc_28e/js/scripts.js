function buttonPopup() {
    window.open('registrering.php', '_blank', 'width=500, height=700');
}

function closePopup() {
    window.close();   
}

function load_villkor() {
    document.getElementById("villkor").innerHTML='<object type="text/html" data="vilkor.php" ></object>';
}

function toggleVillkor() {
    var x = document.getElementById("villkor");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}