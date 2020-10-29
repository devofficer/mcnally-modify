<form class="form-group" method="POST" action="/admin/news/create" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
		<label for="">Title</label>
		<input type="text" class="form-group" name="title">
	</div>

	 @error('title')
		<p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Slug</label>
		<input type="text" class="form-group" name="slug">
	</div>

	 @error('slug')
        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Subtitle</label>
		<input type="text" class="form-group" name="subtitle">
	</div>

	 @error('subtitle')
      <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Description</label>
		<input type="text" class="form-group" name="description">
	</div>

	 @error('description')
       <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Date</label>
		<input type="date" class="form-group" name="date">
	</div>

	 @error('date')
        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Visibility</label>
		<input type="text" class="form-group" name="visibility">
	</div>

	 @error('visibility')
        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Images</label>
		<input type="file" class="form-group" name="image">
	</div>

	 @error('image')
        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror

	<div class="form-group">
		<label for="">Epigraph</label>
		<input type="text" class="form-group" name="epigraph">
	</div>

	 @error('epigraph')
        <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
     @enderror
	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</form>