<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url('assets/img/bg-header.jpg') ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        Pay with PayPal
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
    <?php $session = session(); ?> 
    <div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AVz6U0r2_X8v0bx0FjP1D4sLyYNChF_E5BoNj41GkjCE6Cu2YJyfWpdDRT1AB-VEq7WeZdA-nfA1a8Rz&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '<?= $session->get('full_price') ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='<?= base_url('products/success'); ?>';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>

<?= $this->endSection(); ?>