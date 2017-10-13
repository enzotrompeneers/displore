<!-- Login -->
<div class="contact-panel" id="contact-panel" data-toggler=".is-active">
    <a class="contact-panel-button" data-toggle="contact-panel">Login</a>
    <form action="">
        <div class="row">
        <label>Email
            <input type="email" name="email" placeholder="E-mail adres">
        </label>
        </div>
        <div class="row">
        <label>Wachtwoord
            <input type="password" name="password" placeholder="Wachtwoord">
        </label>
        </div>
        <div class="contact-panel-actions">
        <input class="login-box-submit-button" type="submit" name="login" value="Login" />
        </div>
    </form>
</div>
<!-- End Login -->

<script>
    // closes the panel on click outside
    $(document).mouseup(function (e) {
    var container = $('#contact-panel');
    if (!container.is(e.target) // if the target of the click isn't the container...
    && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
        container.removeClass('is-active');
        }
    });
</script>