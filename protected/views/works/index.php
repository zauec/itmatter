<div class="categories">
    <div class="container">

        <ul>
            <li class="active"><a href="/works">Все работы <span>(<?=$list['all'];?>)</span></a> </li>
            <li><a href="/works?category=sv">Сайты визитки <span>(<?=$list['categories']['1'];?>)</span></a> </li>
            <li><a href="/works?category=kp">Корпоративные сайты <span>(<?=$list['categories']['2'];?>)</span></a> </li>
            <li><a href="/works?category=im">Интернет-магазины <span>(<?=$list['categories']['3'];?>)</span></a> </li>
            <li><a href="/works?category=lp">Landing-page <span>(<?=$list['categories']['4'];?>)</span></a> </li>
        </ul>

    </div>
</div>
<div class="container">
    <div class="works">
        <div class="line">
        <?php
        $i = 0;
        foreach($works as $item):?>

                <div class="work">
                    <a class="image" href="/works/<?echo $item['id'];if(@$_GET['category']) echo "?category={$_GET['category']}";?>"><img src="/static/img/works/<?=$item['preview'];?>" alt="" title="<?=$item['header'];?>"></a>
                    <p><?=$item['header'];?></p>
                    <a href="<?=$item['link'];?>" target="_blank"><?=$item['link'];?></a>
                </div>
                <?php
                    $i++;
                    if($i%4 == 0 && $i > 1) echo '</div><div class="line">';
                ?>

        <?php endforeach;?>
        </div>
    </div>
</div>
<div class="pagination">
    <!-- pagination -->

    <!-- end pagination -->
</div>

<script>
    $(document).ready(function(){
		<?php if(@$_GET['category']):?>
			$('.categories li').removeClass('active');
			$('.categories a[href="/works?category=<?=$_GET['category'];?>"]').parent('li').addClass('active');
		<?php else:?>
			$('.categories li').eq(0).addClass('active');
		<?php endif;?>
    });
</script>