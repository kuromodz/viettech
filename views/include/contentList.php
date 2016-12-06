<div class="col-lg-3 col-md-6 mb-r">
    <div class="card card-cascade narrower wow fadeInUp" data-wow-delay="0.<?=$key+1?>s">
        <div class="view overlay hm-white-slight">
            <img class="img-fluid" <?=srcImg($data)?> >
            <a <?=linkId($data,$menuParent->name)?> >
                <div class="mask"></div>
            </a>
        </div>
        <div class="card-block text-xs-center">
            <h4 class="card-title"><strong><a <?=linkId($data,$menuParent->name)?> ><?=$data->title?></a></strong></h4>
            <ul class="rating">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star-o"></i></li>
            </ul>
            <p class="card-text"><?=$data->des?></p>
            <div class="card-footer">
                <span class="left">49$</span>
                <span class="right">
                    <a data-toggle="tooltip" data-placement="top" title="Add to Cart"><i class="fa fa-shopping-cart"></i></a>
                    <a data-toggle="tooltip" data-placement="top" title="Share"><i class="fa fa-share-alt"></i></a>
                    <a class="active" data-toggle="tooltip" data-placement="top" title="Added to Wishlist"><i class="fa fa-heart"></i></a>
                </span>
            </div>
        </div>
    </div>
</div>