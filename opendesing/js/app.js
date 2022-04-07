function addToCart(id) {
    let panier = parseInt(document.getElementById("nombre-articles").textContent);
    panier = 1;
    document.getElementById("nombre-articles").innerHTML = panier;

    // enregistrer les infos de l'achat dans les cookies
    let article = 'quantite-' + id;
    let quantite = parseInt(document.getElementById(article).value);
    let temp = [id + '-' + quantite]
    cookie = JSON.stringify(temp);
    document.cookie = 'achat=' + cookie;
    document.cookie = 'panier=' + panier;
    console.log(document.cookie);
}

function ajouter() {
    Swal.fire({
        icon: 'success',
        title: 'Ajoute au panier',
        //footer: '<a href>Why do I have this issue?</a>'
        timer: 2000,
        toast: true,
        position: 'bottom',
        showConfirmButton: false
    })
}

function panierVide() {
    console.log('ok');
    Swal.fire({
        icon: 'error',
        title: 'Sélection vide!',
        text: 'Revenez à la page principale pour effectuer votre achat',
        footer: '<a href="index.php">Page Principal</a>'
    })
}

function eraser() {
    Swal.fire({
        icon: 'error',
        title: 'Supprimé!',
        text: 'Votre choix a été éliminé!',
        timer: 70000

    })
}

function vide() {
    Swal.fire({
        icon: 'error',
        title: 'Sélection vide!',
        text: 'Revenez à la page principale pour effectuer votre achat',
        footer: '<a href="index.php">Page Principal</a>'
    })
}

function hola() {
    Swal.fire({
        title: 'Inscrivez vous!',
        text: 'BEST VIDEO PROGRAMMING CONFERENCE',
        imageUrl: 'img/ads.jpg',
        imageWidth: 400,
        imageHeight: 265,
        imageAlt: 'Custom image',
    })
}