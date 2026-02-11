<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>
<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url('assets/img/bg-header.jpg'); ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        Your Cart
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <?php if(session()->getFlashdata('danger')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('danger') ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th width="15%">Quantity</th>
                                        <!-- <th width="15%">Update</th> -->
                                        <th>Subtotal</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(count($cartItem)) : ?>
                                        <?php foreach($cartItem as $item) : ?>
                                        <tr>
                                            <td>
                                                <img src="<?= base_url('assets/img/'.$item->image.''); ?>" width="60">
                                            </td>
                                            <td>
                                                <?= $item->name; ?><br>
                                                <small>1000g</small>
                                            </td>
                                            <td>
                                            USD <?= $item->price; ?>
                                            </td>
                                            <td>
                                                <?= $item->qty; ?>
                                            </td>
                                            <!-- <td>
                                                <a href="#" class="btn btn-primary">UPDATE</a>
                                            </td> -->
                                            <td>
                                                <?= $item->subtotal; ?>
                                            </td>
                                            <td>
                                                <a href="<?= url_to("cart.delete", $item->id); ?>" class="text-danger"><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p class="alert alert-success">There are no products added to the cart</p>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col">
                        <a href="<?= url_to('shop'); ?>" class="btn btn-default">Continue Shopping</a>
                    </div>
                    <div class="col text-right">
                        <?php if(count($cartItem)) : ?>
                            <div class="clearfix"></div>
                            <h6 class="mt-3">Total: USD. <?= $totalPrice->whole_price; ?> </h6>
                            <a href="checkout.html" class="btn btn-lg btn-primary">Checkout <i class="fa fa-long-arrow-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection(); ?>


