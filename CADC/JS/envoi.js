function envoi(){
    var a=6;
    $.post("inscription.php",{aa:a},function(affichage){
        $('#corps').html(affichage);
    });
    
}
function position(id,l,t){
    var elem=document.getElementById(id);
    elem.style.left=l+"%";
    elem.style.top=t+"%";
}
