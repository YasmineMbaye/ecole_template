//afficher un message si le nombre de caractére saisi est plus petit que 8
document.getElementById("inscrit").addEventListener('click', function(){
    if(document.getElementById("input").value.length<8 ){
       
        document.getElementById("msg").innerHTML= "<p>Votre mot de passe doit contenir au au moins 8 caractéres.</p>"; 

    }
    
});

const buttons = document.querySelectorAll('.open-modal');
    const liste = document.querySelectorAll('.imagee');
    const confirmBtn = document.getElementById('confirmDelete'); // Le bouton "OK"
    let itemIdToDelete = null; // Variable pour stocker l'ID
    const n = buttons.length;
    for(let i=0; i<n; i++){
        buttons[i].addEventListener("click", () => {
            document.getElementById("deleteDialog").showModal();
            itemIdToDelete = buttons[i].getAttribute('data-id'); //stock l'attribut data-id dans ce variable

    });
    confirmBtn.addEventListener('click', function() {
    if (itemIdToDelete) {
      // Rediriger ou effectuer l'action de suppression avec l'ID       window.location est un objet JavaScript qui contient des informations sur l'URL actuelle de la page.     href est une propriété de window.location qui représente l'URL complète de la page actuelle.        En modifiant la valeur de window.location.href, vous pouvez rediriger l'utilisateur vers une nouvelle page ou URL. C'est l'équivalent d'un clic sur un lien dans une page web.
      window.location.href = `delete.php?id=${itemIdToDelete}`; // Exemple de redirection
    }
  });

}
