import './bootstrap';
import './form/fileupload';

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

    // implementation of disabled form fields

    // Datepicker
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    var checkin = $('#dpd1').fdatepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.update(newDate);
        }
        checkin.hide();
        $('#dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('#dpd2').fdatepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
    // End Datepicker
    
})()




