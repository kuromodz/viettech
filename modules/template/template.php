<?php if($config->showPhoneFixed){ ?>
<div class="phoneFixed buttonFixed">
    <a href="tel:<?=$infoPage->phone?>">
        <i class="fa fa-phone"></i>
        <?=$infoPage->phone?>
    </a>
</div>
<?php } ?>

<div id="scrollPage" >
  <button id="#backTop" onclick="goToTop();" class="btn btn-primary">
  	<i class="fa fa-angle-up fa-2x"></i>
  </button>
</div>

<div id="infoPage" data-file="<?=$menuPage->file?>" data-img="<?=baseUrl.'upload/'.$image ?>" data-url="<?=pageUrl()?>" data-title="<?=$title?>" data-name="<?=$name?>" data-description="<?=$des?>" data-keywords="<?=$keywords?>" >&nbsp;</div>

<style type="text/css">
	#infoPage{display: none;}
	#scrollPage {
	    position: fixed;
	    right: 10px;
	    bottom: 30px;
	    z-index:999;
	}
	form.buttonFixed{
		top:110px;
		left:5px;
	}
	.iconFixed{
		border: solid 1px #ccc;
		padding: 9px 10px 9px 32px;
		width: 0;
		
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		
		-webkit-transition: all .5s;
		-moz-transition: all .5s;
		transition: all .5s;
	}
	.phoneFixed{
		left:5px;
		bottom:5px;
	}
	.shopFixed{
		right:5px;
		top:110px;
	}
	.buttonFixed a,{
		color:white;
	}
	.buttonFixed{
		position:fixed;
		z-index:9999;
		border-radius:5px;
		top:100px;
		right:15px;
		min-width: 50px;
	}

	input {
		outline: none;
	}
	input[type=search] {
		-webkit-appearance: textfield;
		-webkit-box-sizing: content-box;
		font-family: inherit;
		font-size: 100%;
	}
	input::-webkit-search-decoration,
	input::-webkit-search-cancel-button {
		display: none; 
	}


	input[type=search] {
		background: #ededed url(http://static.tumblr.com/ftv85bp/MIXmud4tx/search-icon.png) no-repeat 9px center;
	}
	input[type=search]:focus {
		width: 130px;
		background-color: #fff;
		border-color: #66CC75;
		
		-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
		-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
		box-shadow: 0 0 5px rgba(109,207,246,.5);
	}


	input:-moz-placeholder {
		color: #999;
	}
	input::-webkit-input-placeholder {
		color: #999;
	}

	/* Demo 2 */
	#search input[type=search] {
		width: 15px;
		padding-left: 10px;
		color: transparent;
		cursor: pointer;
	}
	#search input[type=search]:hover {
		background-color: #fff;
	}
	#search input[type=search]:focus {
		width: 130px;
		padding-left: 32px;
		color: #000;
		background-color: #fff;
		cursor: auto;
	}
	#search input:-moz-placeholder {
		color: transparent;
	}
	#search input::-webkit-input-placeholder {
		color: transparent;
	}
	.contentAjax img {
	    max-width: 100%;
	}
</style>
