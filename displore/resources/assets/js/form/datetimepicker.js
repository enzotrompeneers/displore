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

		this.activate();
	}

	activate()
	{
		for (let pickerIndex = this.instance.length - 1; pickerIndex >= 0; pickerIndex--) {
			let datetimepicker = this.instance[pickerIndex];

			if(datetimepicker.classList.contains("timepicker")){
				datetimepicker.flatpickr({
					enableTime: true,
					noCalendar: true,
					time_24hr: true,
					dateFormat: "H:i", 
				    defaultHour: 12,
				    defaultMinute: 0   
				});
			}else if(datetimepicker.classList.contains("datepicker")){
				datetimepicker.flatpickr({
					enableTime: false,
					minDate: "today",
					locale: Dutch
				});
			}
			
		}
	}
}