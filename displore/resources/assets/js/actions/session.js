import {Modal} from '../ui/modal';
const DOM = require('../general/dom');

var sessionChooser = document.getElementById("session-chooser");

if(sessionChooser !== null)
{
	sessionChooser.addEventListener('click', function(){

		new Modal("session-modal", "Kies een sessie", null, {}).show();

	}, false);

	DOM.setListeners('click', 'choose-button', function(){
		let button = event.target;

		let date = document.getElementById("choose-date-" + button.dataset.id).innerHTML;

		sessionChooser.value = date;

	});

}