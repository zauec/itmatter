<div class="categories">
    <div class="container">
        <ul>
            <li><a href="/works">Все работы <span>(100+)</span></a> </li>
            <li class="active"><a href="#">Сайты визитки <span>(22)</span></a> </li>
            <li><a href="#">Корпоративные сайты <span>(7)</span></a> </li>
            <li><a href="#">Интернет-магазины <span>(12)</span></a> </li>
            <li><a href="#">Landing-page <span>(9)</span></a> </li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="full">
        <div class="slider">
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
            <a class="prev" href="/works/<?=$buttons['previous'];?>">Предыдущая работа</a>
            <a class="next" href="/works/<?=$buttons['next'];?>">Следующая работа</a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.bxslider').bxSlider({
            mode: 'fade',
            pager: false,
            auto: true
        });
    });
</script>