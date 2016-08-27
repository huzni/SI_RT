{{ Form::model($prodi, ['route' => ['admin.prodi.update', $prodi->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()']) }}
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" value="{{ $prodi->nama_prodi }}" name="nama_prodi" type="text" placeholder="Nama Prodi" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="jurusan_id" required class="form-control">
				@foreach($jurusans as $jurusan)
				<option value="{{ $jurusan->id }}"
				@if($jurusan->id==$prodi->jurusan_id) selected @endif
				>{{ $jurusan->nama_jurusan }}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>

<div class="modal-footer">
	<button class="btn btn-sm btn-primary" type="submit">
		<i class="ace-icon fa fa-save"></i>
		Simpan
	</button>
	<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
		<i class="ace-icon fa fa-times"></i>
		Batal
	</button>
</div>
{{ Form::close() }}