<div class="page-content">
    <div class="container">
        <div class="main-content">
            <div id="divContent" class="content"><?php echo $menuPage->content?>
				<ul class="nav nav-tabs">
					<?php foreach($children as $key=>$child){ ?>
				  		<li class="<?=returnWhere("active",$key,0) ?>"><a data-toggle="tab" href="#child<?php echo $child->id ?>"><?php echo $child->title ?></a></li>
				  	<?php } ?>
				</ul>

				<div class="tab-content">
					<?php foreach($children as $key=>$child){ ?>
						<div id="child<?php echo $child->id ?>" class="tab-pane fade in <?=returnWhere("active",$key,0) ?>">
							<?php
							$listSlide = $db->list_data_where("data_child","parent",$child->id);
							if(count($listSlide)){ ?>
							<div class="mainslide">
					   			<ul class="bxslider">
								<?php foreach($listSlide as $slide){ ?>
								 <li mytitle='<?php echo $slide->title?>'>
								 	<img class="full-width" title='The Mejor' src='upload/<?php echo $slide->img?>'  />
								 </li>
								<?php } ?>
								</ul>
							    <div id="bx_slide_caption" class="slide-caption "></div>
							</div>
							<?php }

							echo $child->content; ?>

						</div>	
					<?php } ?>
				</div>
			</div>
            <div class='clear'></div>
        </div>
        <div class='clear'></div>
    </div>
</div>

<script type="text/javascript">
	$(function(){
		var slide = $(".active .bxslider li");
		var objSlide = {
            auto: true,
            mode: 'fade',
            captions: false,
            pager: true,
            onSliderLoad:function($i){
                if(slide[$i])
                {	
                    var cap = $(slide[$i]).attr('mytitle');
                    $('#bx_slide_caption').html(cap);
                }
            },
            onSlideBefore: function ($e) {
                var cap = $e.attr('mytitle');
                $('#bx_slide_caption').stop().fadeOut(300).animate({
                    opacity: 0,
                    right: "-500",
                }, 0, 'easeInExpo', function () {
                    // Animation complete.
                });
            },
            onSlideAfter: function ($e) {
                var cap = $e.attr('mytitle');
                $('#bx_slide_caption').html(cap);
                $('#bx_slide_caption').stop().fadeIn(0).animate({
                    opacity: 1,
                    right: "120",
                }, 1500, 'easeOutExpo', function () {
                    
                });;
            }
        };
		$('.active .bxslider').bxSlider(objSlide);

        $('a[data-toggle="tab"]').one('shown.bs.tab', function (e) {
        	var slide = $(".active .bxslider li");
		    $('.active .bxslider').bxSlider(objSlide);
		});
	});

</script>