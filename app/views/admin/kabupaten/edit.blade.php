{{ Form::model($kabupaten, ['route' => ['admin.kabupaten.update', $kabupaten->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()']) }}
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" value="{{ $kabupaten->nama_kabupaten }}" name="nama_kabupaten" type="text" placeholder="Nama Kabupaten" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="provinsi_id" required class="form-control">
				@foreach($provinsis as $provinsi)
				<option value="{{ $provinsi->id }}"
				@if($provinsi->id==$kabupaten->provinsi_id) selected @endif
				>{{ $provinsi->nama_provinsi }}</option>
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