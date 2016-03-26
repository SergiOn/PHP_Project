<form action="addNews.php" method="post" enctype="multipart/form-data" style="margin: 0 auto; width: 500px">
	  <div class="form-group">
		<label for="title">News</label>
		<input name="title" type="text" class="form-control" id="title" placeholder="Title">

		<input name="cover" type="file" class="form-control">
		
		<textarea name="articletext" type="text" class="form-control" id="articletext" placeholder="Text"></textarea>
	  </div>
	  <button type="submit" class="btn btn-default">Submit</button>
</form>