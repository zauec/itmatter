<script>
	$(document).ready(function(){
		$('.delete').click(function(){
			if(!confirm("Вы уверены?")) return false;
		});
	});
</script>
<div class="container">
	<a href="/admin/add">Добавить работу</a>
	<br>
	<br>
	<ul>
	<?php foreach($works as $item):?>
		<li>
			<a href="/works/<?php echo $item['id'];?>" target="_blank"><?php echo $item['header'];?></a>
			<a class="delete" href="/admin/delete/<?php echo $item['id'];?>">Удалить</a>
		</li>
	<?php endforeach;?>
	</ul>
</div>