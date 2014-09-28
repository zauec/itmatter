<div class="container">
	<h3>Добавить работу (ресайза нет, обрезай ручками)</h3>
	<br>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Название работы</label>
			<input type="text" class="form-control" name="header" placeholder="Название работы">
		</div>
		<br>
		<div class="form-group">
			<label>Ссылка</label>
			<input type="text" class="form-control" name="link" placeholder="Ссылка">
		</div>
		<br>
		<div class="form-group">
			<label>Описание работы</label>
			<br>
			<textarea rows="7" cols="50" class="form-control" name="description"></textarea>
		</div>
		<br>
		<div class="form-group">
			<label>Превью</label>
			<br>
			<input type="file" name="preview">
		</div>
		<br>
		<div class="form-group">
			<label>Слайды (мультизагрузка)</label>
			<br>
			<input type="file" name="files[]" multiple="multiple" accept="image">
		</div>
		<br>
		<div class="form-group">
			<label>Теги</label>
			<br>
			<textarea rows="7" cols="50" class="form-control" name="tags"></textarea>
		</div>
		<br>
		<div class="form-group">
			<label>Категория</label>
			<select name="category">
                <?php foreach ($categories as $category):?>
                <option value="<?=$category['id'];?>"><?=$category['name'];?></option>
                <?php endforeach;?>
			</select>
		</div>
		<br>
		<input class="btn btn-primary" name="add" type="submit" value="Добавить работу">
	</form>
</div>