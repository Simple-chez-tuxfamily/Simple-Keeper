$('#note').focus(function(){
    $('#note').height(50);
    $('#titre').show();
    $('#note').css('min-height', '50px');
    $('#note').css('resize', 'vertical');
    $('#valider').show();
});

$('body').click(function(event){
  if(!$(event.target).is('input')){
        if($('#titre').val() == '' && $('#note').val() == ''){
        $('#titre').hide();
        $('#note').height(17);
        $('#note').css('min-height', '17px');
        $('#note').css('resize', 'none');
        $('#valider').hide();
    }
  }
});

$('.note').click(function(e){
    if($(e.target).is('a'))
        return;
    
    $('#masque').show();
    $('#edit_id').val($(this).attr('id').replace('n', ''));
    $('#edit_titre').val($(this).children('h1').eq(0).text());
    $('#edit_note').val($(this).children('p').eq(0).text());
});

$('#masque').click(function(e){
    if($(e.target).is('#editeur') || $(e.target).is('input') || $(e.target).is('textarea'))
        return;
    
    $('#masque').hide();
});

/*
 * Fonction importante: permet de garder la session de l'utilisateur en vie
*/
function staying_alive(){
    var xhr = getXMLHttpRequest();
    xhr.open('GET', 'core/interact.php?action=stay_alive&token=[PHP_ADD_TOKEN]', true);
    xhr.send(null);
    setTimeout('staying_alive',  30000);
}