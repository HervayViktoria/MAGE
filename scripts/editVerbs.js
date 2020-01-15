
var inputs = $('input');
 var buttons = $('button');
 for(var i = 0; i < inputs.length; i++){
     if (inputs.eq(i).prop('disabled') === true) {
        inputs.eq(i).css('color', 'grey');
    }
     
 }
function EditVerb(elm){
    //console.log(elm);
   
    
   for(var i = 0; i < inputs.length; i++){
        if (elm.name === inputs.eq(i).attr('name')) {
           inputs.eq(i).prop('disabled', false);
           inputs.eq(i).css('color', 'white');
           
        }
   }
   
   for(var i = 0; i < buttons.length; i++){
        if (elm.name === buttons.eq(i).attr('name')) {
            buttons.eq(i).attr('style', 'display: none;');
        }
        
        if (elm.name === buttons.eq(i).attr('id')) {
            buttons.eq(i).attr('style', 'display: block; margin: 0 auto;');
        }
   }
   

}

function SaveVerb(elm){
    
  //össze kell szedni a megfelelő inputokat! nézni, hogy üres-e, ha bármelyik üres->hibaüzi
    var updated_userInputs = [];
  
   for(var i = 0; i < inputs.length; i++){
        if (elm.id === inputs.eq(i).attr('name')) {
            if (inputs.eq(i).val().length < 1) {
                //meg kell keresni a megfelelő hibaüzenetes div-et
                     $('.Error[name='+elm.id+']').text("Egyik mező sem lehet üres!");
                     $('.Error[name='+elm.id+']').attr('style', 'display: block;');
                     $('.Error[name='+elm.id+']').fadeOut(2000);
                return;
            }else{
                updated_userInputs.push(inputs.eq(i).val().toLowerCase().trim());
            }
        }
   }
   
    console.log(updated_userInputs);
  //ha okés minden akkor post-al editprofilinc-nek! -> update DB
    $.post("../includes/editProfil.inc.php",{    
        'updated_verbs[]': updated_userInputs, 'input_id': elm.name
    }).fail(function(jqXHR){
        if (jqXhr === 404) {
            console.error("A fájl nem található");
        }
    });
    
     //mentés vissza szerkesztésre + success üzenet
     $('button[id='+elm.id+']').attr('style', 'display: none;');
     $('button[name='+elm.id+']').attr('style', 'display: block; margin: 0 auto;');
     $('.Success[name='+elm.id+']').text("Ige kijavítva!");
     $('.Success[name='+elm.id+']').attr('style', 'display: block;');
     $('.Success[name='+elm.id+']').fadeOut(2000);
     
    //inputs vissza disabledre
      for(var i = 0; i < inputs.length; i++){
        if (elm.id === inputs.eq(i).attr('name')) {
           inputs.eq(i).prop('disabled', true);
           inputs.eq(i).css('color', 'grey');
           
        }
   }
}