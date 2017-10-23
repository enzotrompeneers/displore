import {Modal} from "../ui/modal";

if(document.getElementById("paypal-button-container") !== null)
{
   var price = parseInt(document.getElementById("reservation-price").innerHTML);
   var reservation = parseInt(document.getElementById("reservation-id").value);  
   
   renderPaypal()
}


//renders the paypal button
function renderPaypal()
{
    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // Specify the style of the button

        style: {
            label: 'checkout',
            size:  'small',    // small | medium | large | responsive
            shape: 'pill',     // pill | rect
            color: 'gold'      // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AfwH7wX1XMl9S4ccjBff33AOcpU5tSVAII8uDPXWKH7ElAwOHetAV66ijqnLhgV9ZbllVi-Ut68pFj0T',
            production: '<insert production client id>'
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: price, currency: 'EUR' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                new Modal("paypal-modal", "Betaling voltooid!", "Dankje voor je betaling, geniet van de ervaring!").show();
                axios.post("/reservatie/betalen/" + reservation + "/compleet");
            });
        }

    }, '#paypal-button-container');

}

