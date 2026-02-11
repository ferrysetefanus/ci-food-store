<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url('assets/img/bg-header.jpg') ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        Checkout
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-7">
                        <h5 class="mb-3">BILLING DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="<?= url_to("process.checkout"); ?>" method="POST" class="bill-detail">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" name="name" placeholder="Name" type="text">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="last_name" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <input class="form-control" placeholder="Company Name" type="text">
                                </div> -->
                                <div class="form-group">
                                    <textarea class="form-control" name="address" placeholder="Address"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="town" placeholder="Town / City" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="state" placeholder="State / Country" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="zip_code" placeholder="Postcode / Zip" type="text">
                                </div>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" name="email" placeholder="Email Address" type="email">
                                    </div>
                                    <div class="col">
                                        <input class="form-control" name="phone" placeholder="Phone Number" type="tel">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" name="price" type="hidden" value = "<?= $subtotalPrice->whole_price; ?>">
                                    </div>
                                    <!-- <div class="col">
                                        <input class="form-control" placeholder="Phone Number" type="tel">
                                    </div> -->
                                </div>
                              
                                <div class="form-group">
                                    <textarea name="order_notes" class="form-control" placeholder="Order Notes"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="submit" class="form-control btn btn-primary">Checkout</button>
                                </div>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                    <div class="col-xs-12 col-sm-5">
                        <div class="holder">
                            <h5 class="mb-3">YOUR ORDER</h5>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th class="text-right">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($cartItem as $item) : ?> 
                                            <tr>
                                                <td>
                                                    <?= $item->name; ?> x<?=  $item->qty; ?>
                                                </td>
                                                <td class="text-right">
                                                    USD <?= $item->subtotal; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <td>
                                                <strong>Cart Subtotal</strong>
                                            </td>
                                            <td class="text-right">
                                                USD <?= $subtotalPrice->whole_price; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Shipping</strong>
                                            </td>
                                            <td class="text-right">
                                                USD 10
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>ORDER TOTAL</strong>
                                            </td>
                                            <td class="text-right">
                                                <strong>USD <?= $subtotalPrice->whole_price + 10; ?></strong>
                                            </td>
                                        </tr>
                                    </tfooter>
                                </table>
                            </div>

                         
                        </div>
                        <!-- <p class="text-right mt-3">
                            <input checked="" type="checkbox"> I’ve read &amp; accept the <a href="#">terms &amp; conditions</a>
                        </p>
                        <a href="#" class="btn btn-primary float-right">PROCEED TO CHECKOUT <i class="fa fa-check"></i></a>
                        <div class="clearfix"> -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection(); ?>


