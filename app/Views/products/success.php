<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url('assets/img/bg-header.jpg') ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        You paid for the products successfully
                    </h1>
                    <a class="btn btn-primary" href="<?= url_to('shop') ?>">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>


<?= $this->endSection(); ?>