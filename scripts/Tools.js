function HandleSelect(elm){
     window.location = "/DEMO/pages/" +elm.value+".php";
     
   /* var selected = $('#conjugChoose option:selected').text();
 // console.log("válaszott: " + selected);
    if (selected === "Alap igék") {
        var type = "main";
        DropDownSelector(type);
        
    
    }else if(selected === "Saját igék"){
     var type = "own";  
        DropDownSelector(type);*/
         
       
    }
  //bármiféle refresh here megöli az egészet, nem frissül be a type...????
//    var path = window.location.pathname;
//    var name = path.search("conjugation");
//    if (name > 0) {
//        Refresh();
//    }else{
//         var url = "/DEMO/pages/conjugation.php";
//	$(location).attr('href',url);
//    }



function Refresh(){
    window.location.reload(true);
}

function IndexPage(){
	var url = "/DEMO/index.php";
	$(location).attr('href',url);
}

function EmptyBtn(){
    $('#empty').css('display', 'none');
     
}

//javításhoz használt függvény: kellenek a válaszok (answerArray), kellenek a JÓ válaszok(dataInput),
// és a visszatér egy "correctedArray-el" ami 0kat és 1eseket tartalmaz, 1 ha jó volt a válasz 0 ha rossz
function CorrectedArray(answersArray, dataInput){
    var correctedArray = [];
	for(var i = 0; i < answersArray.length; i++){
				var temp = (answersArray.eq(i).val().toLowerCase()).trim();
                               
				if (temp === dataInput[i]) {
                                    correctedArray.push(1)
					
				}else{
                                    correctedArray.push(0);
                                }
        }
    return correctedArray;

}

//dropdown menüben ha új igét választunk
function SelectVerb(elm){
 console.log(elm.text);

         //kiválasztott ige
	var selectedVerb = elm.text;
        $('#myDropdown').text(elm.text);
        //hidden inputba teszi a kiválasztott igét
        $('#chosenVerb').val(selectedVerb);
        
	$("#noVerb").css("opacity", "0");
	var answers = $(".input");
	var correction = $(".correct");

	for(var i = 0; i < correction.length; i++){
		answers.eq(i).attr('style', 'color: white');
		answers.eq(i).val("");
		correction.eq(i).text("");
	}

}

//Ellenőrzés gomb a jelentés oldalon
function ClickonMeaning(){
    var answers = $(".answers");
    var correction = $(".correct");
    var data = [];
    var hungarianVerbs = $(".hungarian");
    for (var i = 0; i< hungarianVerbs.length; i++) {
           
      data.push(hungarianVerbs.eq(i).attr('data-value'));
         
    }
    
    // Correction(answers, correction, data);
     var corrected = CorrectedArray(answers, data);
    for(var i = 0; i < corrected.length; i++){
        if (corrected[i] === 1) {
            answers.eq(i).addClass("correct");
        }else{
            correction.eq(i).text(data[i]);
            answers.eq(i).addClass("wrong");
        }
    }
    

}


function DropDownSelector(elm){
    
   var path = window.location.pathname;
   var index = path.search("index");
    if (index > 0) {
        $.post("includes/dropdownType.inc.php", {
            'typeOfDropdown': elm
        }).fail(function(jqXHR){
            if (jqXHR.status === 404) {
                console.log("A fájl nem található");
            }
        });
    }else{
        $.post("../includes/dropdownType.inc.php", {
            'typeOfDropdown': elm
        }).fail(function(jqXHR){
            if (jqXHR.status === 404) {
                consele.log("A fájl nem található");
            }
        });
       
    }
//itt se jó hogyha refreshelem, de akkor hol?!
//        var path = window.location.pathname;
//    var name = path.search("conjugation");
//    if (name > 0) {
//        Refresh();
//    }else{
//         var url = "/DEMO/pages/conjugation.php";
//	$(location).attr('href',url);
//    }
      
    

}


