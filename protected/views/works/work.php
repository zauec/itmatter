<div class="categories">
    <div class="container">
        <ul>
            <li><a href="/works">Все работы <span>(<?=$list['all'];?>)</span></a> </li>
            <li><a href="/works?category=sv">Сайты визитки <span>(<?=$list['categories']['1'];?>)</span></a> </li>
            <li><a href="/works?category=kp">Корпоративные сайты <span>(<?=$list['categories']['2'];?>)</span></a> </li>
            <li><a href="/works?category=im">Интернет-магазины <span>(<?=$list['categories']['3'];?>)</span></a> </li>
            <li><a href="/works?category=lp">Landing-page <span>(<?=$list['categories']['4'];?>)</span></a> </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="full">
        <div class="slider" style="visibility: hidden;">
            <ul class="bxslider">
                <? foreach($work->images as $image): ?>
                <li><img src="/static/img/works/<?=$image['image'];?>" /></li>
                <? endforeach; ?>
            </ul>
        </div>
        <div class="description">
            <h3><?=$work['header'];?></h3>
            <a target="_blank" href="<?=$work['link'];?>"><?=$work['link'];?></a>
            <p class=""><?=$work['description'];?></p>
            <p class="tags"><?=$work['tags'];?></p>
        </div>
        <div class="pagination">
            <a class="prev" href="/works/<?=$buttons['previous']; if(@$_GET['category']) echo '?category='.$_GET['category'];?>">Предыдущая работа</a>
            <a class="next" href="/works/<?=$buttons['next']; if(@$_GET['category']) echo '?category='.$_GET['category'];?>">Следующая работа</a>
        </div>
    </div>
	
</div>
<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            pager: false,
            auto: true,
			onSliderLoad: function(){
				$(".slider").css("visibility", "visible");
			  }
        });
		<?php if(@$_GET['category']):?>
			$('.categories li').removeClass('active');
			$('.categories a[href="/works?category=<?=$_GET['category'];?>"]').parent('li').addClass('active');
		<?php else:?>
			$('.categories li').eq(0).addClass('active');
		<?php endif;?>
		//$('.categories li').eq(<?=$work->workscategory[0]['category_id'];?> ).addClass('active');
    });
</script>