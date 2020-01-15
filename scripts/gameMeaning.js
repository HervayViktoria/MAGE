  //az összes ige belekerül egy tömbbe
     var verbs = $('.meaning');
     //ide kerülnek majd a rossz megoldások
    var incorrect = [];
    
    //ez a ciklus tölti fel a rossz megoldások tömbböt
    for(var i = 0; i< verbs.length; i++){
        if (verbs.eq(i).attr('data-value') !== $('#randomVerb').text()) {
           incorrect.push(verbs.eq(i));
        }
    }


$('.meaning').on('click', function(){
		if ($(this).attr('data-value') == $('#randomVerb').text()) {
                    $(this).addClass('correct');
                    //ha megvan a jó megoldás, akkor végigmegyünk a rossz megoldások tömbbön
                    for(var i = 0; i< incorrect.length; i++){
                        //piros lesz
                        incorrect[i].css("background-color", "red");
                        //és eltűnik
                        incorrect[i].css("opacity", "0");
                    }
                    $('#success').css('display', 'block');
                    $('#sign').css('display', 'none');
			
		}else{
			$(this).css("background-color", "red");
			$(this).css("opacity", "0");
		}
	});
        

        
