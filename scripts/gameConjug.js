    //ellenőrzi, hogy mikor van kész a feladat
		var correct = 0;	
		//a 'hibátlan' üzenet elrejtése
		$('.verb').removeClass('correct');
		$('.verb').removeClass('wrong');
                //$('#success').hide();
		

		//a játék újratöltése
		correct = 0;

		$('.verb').draggable({
			//nem endegi, hogy a szülő elementen kívül legyen húzva
			containment: 'window',
			opacity: 0.5,
			//visszahúzza az eredeti helyére
			revert: true,
			cursor: "grabbing"
		});	

		$('.pron').droppable({
			accept: '.verb',
			drop: HandleDrop
		});

function HandleDrop(event, ui){
	//személyes névmás
	var pronValue = $(this).attr('data-value');
	//ige
	var verb = ui.draggable.text();
	ui.draggable.removeClass('wrong');
	if (pronValue == verb) {
		ui.draggable.addClass('correct');
		ui.draggable.draggable('disable');
		$(this).droppable('disable');
                $(this).css('opacity', '0');
		ui.draggable.position({of: $(this), my:'left top', at: 'left top'});
		ui.draggable.draggable('option', 'revert', false);
		correct++;
		//console.log(correct);

	}else{
		ui.draggable.addClass('wrong');
	}
        //console.log(correct);

	if (correct === 6) {
		
		//$('#success').show();
                $('#success').css('display', 'block');
                $('#sign').css('display', 'none');
			}
}


