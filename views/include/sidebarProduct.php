<div class="col-lg-3">
	<div class="card mb-2">
		<div class="card-header white-text">
			<i class="fa fa-list-alt fa-fw"></i> Danh mục <?=$menuPage->title?>
		</div>
		<div class="card-block">
			<ul class="sidebar-categories-list">
				<li>
					<a <?=linkMenu($menuPage)?>>
						<i class="fa fa-angle-double-right"></i> Tất cả danh mục
					</a>
				</li>
				<?php $listMenuChild = $db->listMenuChild($menuPage->id);
				foreach($listMenuChild as $menuChild){ ?>
				<li>
					<a <?=linkIdList($menuChild,$menuPage->name)?> >
						<i class="fa fa-angle-double-right"></i> <?=$menuChild->title?>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>

	<div class="card mb-2">
		<div class="card-header white-text">
			Hiển thị sản phẩm theo màu
		</div>
		<div class="card-block">
			<fieldset class="form-group">
				<input type="checkbox" id="color-1">
				<label for="color-1">White</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="color-2">
				<label for="color-2">Beige</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="color-3">
				<label for="color-3">Black</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="color-4">
				<label for="color-4">Green</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="color-5">
				<label for="color-5">Pink</label>
			</fieldset>
		</div>
	</div>
	<div class="card mb-2">
		<div class="card-header white-text">
			Filter by Size
		</div>
		<div class="card-block">
			<fieldset class="form-group">
				<input type="checkbox" id="size-xs">
				<label for="size-xs">Extra Small (10)</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="size-s">
				<label for="size-s">Small (14)</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="size-m">
				<label for="size-m">Medium (7)</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="size-l">
				<label for="size-l">Large (18)</label>
			</fieldset>
			<fieldset class="form-group">
				<input type="checkbox" id="size-xl">
				<label for="size-xl">Extra Large (21)</label>
			</fieldset>
			<button type="button" class="btn btn-primary">Apply</button>
		</div>
	</div>
</div>
<div class="col-lg-9">
