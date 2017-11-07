import {Modal} from "../ui/modal";
const YTPlayer = require('yt-player');

var disploreWat = document.getElementById("wat-is-displore");

if(disploreWat !== null)
{
	disploreWat.addEventListener('click', (event) => {
		event.preventDefault();
		var player

		let content = '<div id="displore-video"></div>';
		let modalHooks = {
			onLoad: function(){
				player = new YTPlayer('#displore-video', {
					width: 850,
					height: 478
				});
				player.load('I0Ktmdj41KE');
			},
			onHide: function(){
				player.stop();
			},
			onShow: function(){
				player.play();
			}
		};

		new Modal("displore-modal", "Wat is displore?", content, modalHooks).show();
	}, false);
}

