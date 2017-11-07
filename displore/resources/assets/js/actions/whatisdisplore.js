import {Modal} from "../ui/modal";

var disploreWat = document.getElementById("wat-is-displore");

disploreWat.addEventListener('click', (event) => {
	event.preventDefault();
	new Modal("displore-modal", "Wat is displore?", '<iframe width="850" height="478" src="https://www.youtube.com/embed/I0Ktmdj41KE?autoplay=1" frameborder="0" gesture="media" allowfullscreen></iframe>').show();
}, false);