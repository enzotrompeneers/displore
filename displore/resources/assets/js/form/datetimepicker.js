import 'flatpickr';
import { Dutch } from 'flatpickr/dist/l10n/nl.js'
// flatpickr.l10n.weekdays = {
//     shorthand: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
//     longhand: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi']
// };

export class DateTimePicker{

	constructor()
	{
		this.instance = document.getElementsByClassName("datetimepicker");
		this.productInput = document.getElementById("product_id");

		this.activate();
	}

	makePicker(element, options)
	{
		element.flatpickr(options);
		element.style.display = "block";
	}

	makeDayChecker(datetimepicker, options)
	{
		//globaal zetten
		var datetimepicker = datetimepicker;
		var options = options;

	
		return axios.get('/ervaring/beschikbaar/' + this.productInput.value).then((response) => {
		
			if(response.data.length === 0){
				let noReservationElement = document.createElement("p");
				noReservationElement.className = "white";
				let noReservationText = document.createTextNode("Geen reservaties mogelijk op dit moment");

				noReservationElement.appendChild(noReservationText);
				datetimepicker.parentNode.appendChild(noReservationElement);

				document.getElementById("date-error").remove();
			}else{
				options["enable"] = response.data;
				this.makePicker(datetimepicker, options);
			}				
		});		
	}

	activate()
	{
		for (let pickerIndex = this.instance.length - 1; pickerIndex >= 0; pickerIndex--) {
			let datetimepicker = this.instance[pickerIndex];
			datetimepicker.style.display = "none";

			if(datetimepicker.classList.contains("timepicker")){
				var options = {
					enableTime: true,
					noCalendar: true,
					time_24hr: true,
					dateFormat: "H:i", 
				    defaultHour: 12,
				    defaultMinute: 0   
				}

				this.makePicker(datetimepicker, options);
			}else if(datetimepicker.classList.contains("datepicker")){
				var options = {
					enableTime: false,
					minDate: "today",
					locale: Dutch
				};

				if(datetimepicker.classList.contains("days-check") && this.productInput !== null ){
					this.makeDayChecker(datetimepicker, options);
				} else {
					this.makePicker(datetimepicker, options);
				}
			}
		}
	}
}