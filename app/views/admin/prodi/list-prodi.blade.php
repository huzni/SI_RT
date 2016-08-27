<select name="prodi_id" id="prodi_id" class="form-control">
	<option value="">-Pilih Prodi-</option>
	@foreach($prodis as $prodi) 
	<option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
	@endforeach
</select>