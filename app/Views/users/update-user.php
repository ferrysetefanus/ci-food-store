<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url('assets/img/bg-header.jpg'); ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        Settings
                    </h1>
                    <p class="lead">
                        Update Your Account Info
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <?php if(session()->getFlashdata('update')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('update'); ?>
                    </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                        <h5 class="mb-3">ACCOUNT DETAILS</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="<?= url_to('update.user.data'); ?>" method="POST" class="bill-detail">
                            <fieldset>
                                <div class="form-group row">
                                    <div class="col">
                                        <input class="form-control" value="<?= $user->username; ?>" placeholder="Full Name" type="text">
                                    </div>
                                   
                                </div>
                               
                                <div class="form-group">
                                    <textarea class="form-control" name="address" placeholder="Address"><?= $user->address; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="town" value="<?= $user->town; ?>" placeholder="Town / City" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="state" value="<?= $user->state; ?>" placeholder="State / Country" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="zip_state" value="<?= $user->zip_code; ?>" placeholder="Postcode / Zip" type="text">
                                </div>
                                <div class="form-group row">
                                    <!-- <div class="col">
                                        <input class="form-control" placeholder="Email Address" type="email">
                                    </div> -->
                                    <div class="col">
                                        <input class="form-control" name="phone" value="<?= $user->phone; ?>" placeholder="Phone Number" type="tel">
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <input class="form-control" placeholder="Password" type="password">
                                </div> -->
                                <div class="form-group text-right">
                                    <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                                    <div class="clearfix">
                                </div>
                            </fieldset>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection(); ?>
