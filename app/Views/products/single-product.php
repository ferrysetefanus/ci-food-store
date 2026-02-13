<?= $this->extend("layouts/app.php"); ?>
<?= $this->section("content"); ?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('<?= base_url("assets/img/bg-header.jpg") ?>');">
                <div class="container">
                    <h1 class="pt-5">
                        <?= $product->name; ?>
                    </h1>
                    <p class="lead">
                        Save time and leave the groceries to us.
                    </p>
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <?php if(session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="slider-zoom">
                            <a href="<?= base_url('assets/img/'.$product->image.'') ?>" class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image" src="<?= base_url('assets/img/'.$product->image.'') ?>" style="width: 100%;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            <strong>Overview</strong><br>
                            <?= $product->description; ?>
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <p>
                                    <strong>Price</strong> (/Pack)<br>
                                    <span class="price">USD $ <?= $product->price; ?></span>
                                    <!-- <span class="old-price">Rp 150.000</span> -->
                                </p>
                            </div>
                           
                        </div>
                        <form action="<?= url_to(('add.to.cart')) ?>" method="POST">

                                <input class="form-control" type="hidden" min="1"  value="<?= $product->id; ?>" name="product_id">
                                <input class="form-control" type="hidden" min="1"  value="<?= $product->price; ?>" name="price">
                                <input class="form-control" type="hidden" min="1"  value="<?= $product->name; ?>" name="name">
                                <input class="form-control" type="hidden" min="1"  value="<?= $product->image; ?>" name="image">
                                                        
                                <p class="mb-1">
                                    <strong>Quantity</strong>
                                </p>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input name="qty" class="form-control" type="number" min="1" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="1" name="vertical-spin">
                                    </div>
                                    <div class="col-sm-6"><span class="pt-1 d-inline-block">Pack (1000 gram)</span></div>
                                </div>
                                <?php if(isset(auth()->user()->id)) : ?>
                                    <?php if($count > 0) : ?>
                                        <button disabled class="mt-3 btn btn-primary btn-lg">
                                            <i class="fa fa-shopping-basket"></i> Added to Cart
                                        </button>
                                    <?php else : ?>
                                        <button name="submit" type="submit" class="mt-3 btn btn-primary btn-lg">
                                            <i class="fa fa-shopping-basket"></i> Add to Cart
                                        </button>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <p class="alert alert-success mt-4">Login to add this product to the cart</p>
                                <?php endif; ?>
                        </form> 
                    </div>
                </div>
            </div>
        </div>

        <section id="related-product">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="title">Related Products</h2>
                        <?php if(count($relatedProducts) > 0) : ?>
                        <div class="product-carousel owl-carousel">
                            <?php foreach($relatedProducts as $singleProduct) : ?>
                            <div class="item">
                                <div class="card card-product">
                                    <div class="card-ribbon">
                                        <div class="card-ribbon-container right">
                                            <span class="ribbon ribbon-primary">SPECIAL</span>
                                        </div>
                                    </div>
                                    <div class="card-badge">
                                        <div class="card-badge-container left">
                                            <span class="badge badge-default">
                                                <?= $singleProduct->exp_date; ?>
                                            </span>
                                            <span class="badge badge-primary">
                                                20% OFF
                                            </span>
                                        </div>
                                        <img src="<?= base_url('assets/img/'.$singleProduct->image.''); ?>" alt="Card image 2" class="card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            <a href="<?= base_url('products/single-product/'.$singleProduct->id.'') ?>"><?= $singleProduct->name; ?></a>
                                        </h4>
                                        <div class="card-price">
                                            <!-- <span class="discount">Rp. 300.000</span> -->
                                            <span class="reguler"><?= $singleProduct->price; ?></span>
                                        </div>
                                        <a href="<?= base_url('products/single-product/'.$singleProduct->id.'') ?>" class="btn btn-block btn-primary">
                                            Add to Cart
                                        </a>

                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php else : ?>
                            <p class="alert alert-warning">there are no related products just yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?= $this->endSection(); ?>