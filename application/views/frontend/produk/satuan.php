
            <div class="row">
                <div class="col-lg-12">
                    <!--=======  page wrapper  =======-->
                    <div class="page-wrapper">
                        <div class="page-content-wrapper">
                            <!--=======  single product main content area  =======-->
                            <div class="single-product-main-content-area section-space">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!--=======  product details slider area  =======-->

                                        <div class="product-details-slider-area">


                                            <div class="big-image-wrapper">

                                                <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--bottom-space ht-slick-slider" 
                                                >
                                                    <div class="single-image text-center p-5">
                                                        <img src="<?= base_url() ?>assets/upload/images/produk/<?= $produk['produk_foto'] ?>" class="img-fluid" alt="" style="width: 80%; margin:0 auto;">
                                                    </div>
                                                    
                                                </div>
                                            </div>


                                            
                                        </div>

                                        <!--=======  End of product details slider area  =======-->
                                    </div>
                                    <div class="col-lg-6">
                                        <!--=======  single product content description  =======-->
                                        <div class="single-product-content-description">
                                            <p class="single-info"><?= $produk['kategori_nama'] ?></a> </p>
                                            <h4 class="product-title"><?= $produk['produk_nama'] ?></h4>
                                            

                                            <p class="single-grid-product__price"><span class="discounted-price text-success">Rp. <?= nominal($produk['produk_harga']) ?></span></p>

                                            <a href="<?= base_url() ?>pesan/<?= $produk['produk_id'] ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-money"></i> Pesan Sekarang</button></a>

                                            <p class="product-description"><?= $produk['produk_deskripsi'] ?></p>
                                            <p>
                                                <h5>Porduk sudah dipesan pada tanggal :</h5>
                                                <?php 
                                                $no=1;
                                                $pembelian = $this->PembelianModel->cek_pembelian_tgl($produk['produk_id']); ?>
                                                <?php foreach ($pembelian as $va): ?>
                                                    <span class="text-primary"><b><?=  $no.'. '.date_indo($va['pembelian_tgl_acara']); ?> </b></span><br>
                                                <?php $no++; endforeach ?>
                                            </p>
                                            <p>Silahkan pesan di tanggal selain diatas. pemesanan dapat dilakukan 3 hari sesudah tgl acara!</p>
                                
                                            <!-- <div class="product-countdown" data-countdown="2019/09/01"></div> -->


                                        </div>
                                        <!--=======  End of single product content description  =======-->
                                    </div>
                                </div>
                            </div>
                            <!--=======  End of single product main content area  =======-->
                            <!--=======  product description review   =======-->

                            <div class="product-description-review-area">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <!--=======  product description review container  =======-->

                                        <div class="tab-slider-wrapper product-description-review-container  section-space--inner">
                                            <nav>
                                                <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">Description</a>
                                                    
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                                                    <!--=======  product description  =======-->

                                                    <div class="product-description">
                                                        <p>
                                                            <?= $produk['produk_deskripsi'] ?>
                                                        </p>
                                                    </div>

                                                    <!--=======  End of product description  =======-->
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <!--=======  End of product description review container  =======-->
                                    </div>
                                </div>
                            </div>

                            <!--=======  End of product description review   =======-->
                            
                        </div>
                    </div>
                    <!--=======  End of page wrapper  =======-->
                </div>
            </div>
       
    <!--====================  End of page content area  ====================-->