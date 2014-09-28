<div class="categories">
    <div class="container">
        <ul>
            <li class="active"><a href="/works">Все работы <span>(100+)</span></a> </li>
            <li><a href="#">Сайты визитки <span>(22)</span></a> </li>
            <li><a href="#">Корпоративные сайты <span>(7)</span></a> </li>
            <li><a href="#">Интернет-магазины <span>(12)</span></a> </li>
            <li><a href="#">Landing-page <span>(9)</span></a> </li>
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
                    <a class="image" href="/works/<?=$item['id'];?>"><img src="/static/img/works/<?=$item['preview'];?>" alt="" title="<?=$item['header'];?>"></a>
                    <p><?=$item['header'];?></p>
                    <a href="<?=$item['link'];?>" target="_blank"><?=$item['link'];?></a>
                </div>
                <?php
                    $i++;
                    if($i%4 == 1 && $i > 1) echo '</div><div class="line">';
                ?>

        <?php endforeach;?>
        </div>
    </div>
</div>
<div class="pagination">
    <!-- pagination -->

    <!-- end pagination -->
</div>