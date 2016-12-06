<section class="section">
	<div class="col-md-12">
	    <div class="section-description"><?=$menuPage->content?></div>
		<form class="card contactAjax" action="post">
			<div class="card-block">
			    <div class="md-form col-md-6">
			        <i class="fa fa-user prefix"></i> 
			        <input required id="reply-title" name="title" type="text" class="validate">
			        <label for="reply-title">Tên (*)</label>
			    </div>
			    <div class="md-form col-md-6">
			        <i class="fa fa-phone prefix"></i> 
			        <input required id="reply-phone" name="phone" type="text" class="validate">
			        <label for="reply-phone">Số điện thoại (*)</label>
			    </div>
			    <div class="md-form col-md-6">
			        <i class="fa fa-map-marker prefix"></i> 
			        <input required id="reply-address" name="address" type="text" class="validate">
			        <label for="reply-address">Địa chỉ (*)</label>
			    </div>
			    <div class="md-form col-md-6">
			        <i class="fa fa-envelope prefix"></i> 
			        <input id="reply-email" type="email" name="email" type="text" class="validate">
			        <label for="reply-email">Email</label>
			    </div>
			    <div class="md-form col-md-6">
			        <i class="fa fa-building prefix"></i> 
			        <input id="reply-company" name="company" type="text" class="validate">
			        <label for="reply-company">Công ty</label>
			    </div>
			    <div class="md-form col-md-6">
			        <i class="fa fa-share-alt prefix"></i> 
			        <input id="reply-social" name="social" type="text" class="validate">
			        <label for="reply-social">Liên kết Mạng xã hội</label>
			    </div>
			    <div class="md-form col-md-12">
			        <i class="fa fa-exclamation prefix"></i>
			        <textarea required id="reply-des" name="des" class="md-textarea validate"></textarea>
			        <label for="reply-des">Mô tả phốt (*)</label>
			    </div>
			    <div class="col-md-12">
			    	<center>
			        	<button type="submit" class="btn btn-danger waves-effect waves-light">
			        		<i class="fa fa-upload fa-fw"></i> Đăng phốt
			        	</button>
			        </center>
			    </div>
		    </div>
		</form>
	</div>
</section>