/*
 * Messages.js
 * Les fonctions présentes dans ce fichier permettent de contrôler les messages
*/

/* Permet d'afficher un message.
  * message : le message à afficher
  * temps : temps (en secondes) durant lequel le message doit s'afficher. Mettre 0 permet de créer un message persistant.
  * type  : le type de message à afficher (0 = erreur; 1 = confirmation)
*/
function afficher_message(message, temps, type){
    if(!document.getElementById('notification') || message == null || temps == null || type == null)
        return false;
    
    if(type == 0){
        document.getElementById('notification').style.backgroundColor = '#D63535';
        document.getElementById('notification').innerHTML = 'Erreur: ' + message;
    }
    else{
        document.getElementById('notification').style.backgroundColor = '#8BB548';
        document.getElementById('notification').innerHTML = message;
    }
    
    document.getElementById('notification').style.display = 'block';
    
    if(temps > 0){
        temps = temps * 1000;
    
        setTimeout(function(){
            masquer_message();
        }, temps);
    }
    return true;
}

/*
  * Permet de masquer le message actuellement affiché à l'écran
*/
function masquer_message(){
    if(document.getElementById('notification'))
        document.getElementById('notification').style.display = 'none';
}