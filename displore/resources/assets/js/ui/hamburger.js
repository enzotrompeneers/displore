
var hamburgerButton = document.getElementById("hamburger-button");

hamburgerButton.addEventListener('click', function(){
    let menu = document.getElementById('hamburger-menu');
	
	if(menu.classList.contains("hidden")){
		menu.classList.remove("hidden");
	}else{
		menu.classList.add("hidden");
	}
}, false);