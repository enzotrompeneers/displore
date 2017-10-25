import './bootstrap';
import './form/fileupload';
import './form/image';

import './actions/paypal';

import {GoogleMaps} from './googlemaps';
import {DateTimePicker} from './form/datetimepicker';

if(document.getElementById("map") !== null)
{
    var gmaps = new GoogleMaps();
    gmaps.initMap();
}
if(document.getElementById("showMap") !== null)
{
    var gmaps = new GoogleMaps();
    gmaps.showMap();
}

if(document.getElementsByClassName("datetimepicker") !== 0)
{
    new DateTimePicker();
}


// '/js/foundation-datepicker.js'
// '/stylesheets/foundation-datepicker.css'
(function(){
    console.log("app loaded");

    // Rating 
    $('[data-rating] .star').on('click', function() {
        var selectedCssClass = 'selected';
        var $this = $(this);
        $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
        $this
          .addClass(selectedCssClass)
          .parent().addClass('is-voted');
      });
      // End Rating

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
    /** 
    $contact_panel = document.getElementById("contact-panel");
    $login_dropdown_btn = document.getElementById("login_dropdown_btn");
    
    $login_dropdown_btn.onclick = function() {myFunction()};
    function myFunction() {
        $contact_panel.classList.toggle("is-active");
    }
    // End Login Toggle Event
    */
    // implementation of disabled form fields
    
})()




