require('./bootstrap');

(function(){
	console.log("app loaded");

	// $(document).foundation();
  
  
    // Close Panel Outside Container
    $(document).mouseup(function (e) {
        var container = $('#contact-panel');
        if (!container.is(e.target) // if the target of the click isn't the container...
        && container.has(e.target).length === 0) // ... nor a descendant of the container
          {
            container.removeClass('is-active');
          }
    });
    // End close panel Outside Container

    // Login Toggle Event
    $contact_panel = document.getElementById("contact-panel");
    $login_dropdown_btn = document.getElementById("login_dropdown_btn");
    
    $login_dropdown_btn.onclick = function() {myFunction()};
    function myFunction() {
        $contact_panel.classList.toggle("is-active");
    }
    // End Login Toggle Event

})()


