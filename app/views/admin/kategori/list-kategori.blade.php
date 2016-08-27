<select name="kategori_id" id="kategori_id" class="form-control">
	<option value="">-Pilih Kategori-</option>
	@foreach($kategoris as $kategori) 
	<option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
	@endforeach
</select>