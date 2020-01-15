var allverbs = [];
var intValue = 0;
var seconds = 0;
var id;
//az a popup ami elindítja a timer-t az elején rejtett
$('#start').css('display', 'none');
//csakúgy mint az a popup ami majd kiírja a százalékos eredményt
$('.percent').css('display', 'none');
 
 //kiválasztjuk, hogy 5 vagy 10 darab ige az alapján töltődik be az oldal
 function NumberClick(num){
     
   intValue = num;
    for(var i = 0; i < intValue; i++){
        $('#test').append("<div class='myBorder py-3 my-3'><div class='row mx-2'>\n\
                                <div class='col-md'></div>\n\
                                <div class='col-md-6 myCenter'>\n\
                                    <span class='inf'></span>\n\
                                </div>\n\
                                <div class='col-md'></div>\n\
                            </div>\n\
                            <div class='row mx-2'>\n\
                                <div class='col-md'></div>\n\
                                <div class='col-md-6'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Jelentés:</label>\n\
                                     </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='meaning' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md'></div>\n\
                            </div>\n\
                            <div class='row mx-2'>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Ich:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Ich' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Du:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Du' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Er/sie/es:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Ese' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                            <div class='row mx-2'>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Wir:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Wir' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Ihr:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Ihr' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Sie/sie:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Sie' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                            </div>\n\
                            <div class='row mx-2 my-2'>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Präteritum:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Prat' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Segédige:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Aux' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                                <div class='col-md-4'>\n\
                                    <div class='myCenter'>\n\
                                        <label>Prefekt:</label>\n\
                                    </div>\n\
                                    <div class='myCenter'>\n\
                                        <input type='text' name='Perf' class='input'/>\n\
                                    </div>\n\
                                </div>\n\
                            </div></div>\n\
");
    }
    
    $.post("../includes/test.inc.php",{
        number: intValue
    }, function(res, status){
    var data = JSON.parse(res);
    console.log(data);
    //array ception...
    for(var i = 0; i< data.length;i++){
        for(var j = 1; j < data[i].length; j++){
            //console.log(data[i][0][j]);
            //itt kapja meg  ahelyes válaszokat az allverbs array
            allverbs.push(data[i][j]);
        }
    }
    //kiadja a főnévi igeneveket
    var htwo = $('.inf');
    for(var i = 0; i< htwo.length; i++){
       htwo.eq(i).text(data[i][0]);
        
    
    }

        }).fail(function(jqXHR){
        if (jqXHR.status === 404) {
            console.log("A fájl nem található");
        } 
            });
            //A kezdő kérdés elrejtése
    $('#startQ').css('display', 'none');
    //A timer indító megjelenítése
    $('#start').css('display', 'block');
   
    //a teszt maga még ne jelentjen meg
    $('#test').css('display', 'none');

    
   
 }

//ezzel indítjuk a timer-t
function StartClick(){
//a timer indító elrejtése
$('#start').css('display', 'none');
//a teszt megjelenítése
$('#test').css('display', 'block');
 //a submit button megjelenítése
$('#submit').css('display', 'block');
$('#background').css('display', 'block');
Timer(intValue);
}
function Timer(intValue){
        var minutes = intValue-1;
       var seconds = 59;
      function redirect(){
         
          id = setTimeout(redirect,1000); 
          $("#minutes").html(minutes);
          $("#seconds").html(seconds);
          $("#semicolon").html(":");
          $("#remainedTime").html("Hátralévő idő: ")
            if (seconds === 0) {
                minutes--; //the time decrease, from time to 0
                seconds = 59;
            }
            seconds--;
            if (minutes === 0 && seconds === 0) {
                seconds = 0;
               
                clearTimeout(id);
                SubmitButton();
            }
            
      } 
      redirect();
}




function SubmitButton(){
    clearTimeout(id);
     $("#text").append("<span id='percent'>%</span>");
   //array a válaszoknak
   var answers = [];
   var infinitives = [];
  $('.inf').each(function(){
     infinitives.push($(this).text()); 
  });
  console.log(infinitives);
   var inputArray = $('.input');
   var correctedArray = CorrectedArray(inputArray, allverbs);
   var percent = CalculatePercent(correctedArray);
   
   for(var i = 0; i < inputArray.length; i++){
             answers.push(inputArray.eq(i).val());   
            
             
             inputArray.eq(i).val("");           
    }
   
         $.post("../includes/testanswers.inc.php", {
          'answers[]': answers, 'infinitives[]': infinitives, result: percent}).fail(function(jqXHR){
          if (jqXHR.status === 404) {
            console.log("A fájl nem található");
            }
          });
        //percent popup és eredmény megjelenítése
         $('#percent').text(percent +"%");
         $('.percent').css('display', 'flex');
         //teszt, timer és submit button elrejtése
         $('#test').css('display', 'none');
         $('#timer').css('display', 'none');
         $('#submit').css('display', 'none');
         $('#background').css('display', 'none');
}

function CalculatePercent(correctedArray){
    var points = 0;
for(var i = 0; i < correctedArray.length; i++){
        if (correctedArray[i] === 1) {
            points++;
        }
}

    var result = (points / correctedArray.length) * 100;
    return result;
    
}

//amikor a százalákos popupot bezárja
function ClosetoRefresh(){
    
    Refresh();
}

//amikor a numbers és start popupot bezárja visszadoja az index oldalra
function CloseToIndex(){
    
    IndexPage();
}


  





