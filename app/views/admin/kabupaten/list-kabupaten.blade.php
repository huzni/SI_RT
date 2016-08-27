<select name="kabupaten_id" id="kabupaten_id" class="form-control">
	<option value="">-Pilih Kabupaten-</option>
	@foreach($kabupatens as $kabupaten) 
	<option value="{{ $kabupaten->id }}">{{ $kabupaten->nama_kabupaten }}</option>
	@endforeach
</select>