{{ Form::model($industri, ['route' => ['admin.industri.update', $industri->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()', 'enctype'=>'multipart/form-data']) }}
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="nama_industri" type="text" placeholder="Nama Industri" value="{{ $industri->nama_industri }}" required />
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<textarea name="deskripsi" placeholder="Deskripsi" class="form-control">{{ $industri->deskripsi }}</textarea>
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<textarea name="alamat" placeholder="Alamat" class="form-control">{{ $industri->alamat }}</textarea>
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="lat" type="text" placeholder="Latitude" value="{{ $industri->lat }}" required />
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="lng" type="text" placeholder="Longitude" value="{{ $industri->lng }}" required />
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="foto" type="text" placeholder="Foto" value="{{ $industri->foto }}" required />
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="jumlah_karyawan" type="text" placeholder="Jumlah Karyawan" value="{{ $industri->jumlah_karyawan }}" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="provinsi_id" required class="form-control" onselect="kabupaten($(this).val(),'2')" onchange="kabupaten($(this).val(),'2')">
				@foreach($provinsis as $provinsi)
				<option value="{{ $provinsi->id }}"
				@if($provinsi->id==$kabupaten->provinsi_id) selected @endif
				>{{ $provinsi->nama_provinsi }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="kabupaten_id" id="kabupaten_id2" class="form-control">
				@foreach($kabupatens as $kabupaten) 
				<option value="{{ $kabupaten->id }}"
					@if($kabupaten->id==$industri->kabupaten_id) selected @endif
					>{{ $kabupaten->nama_kabupaten }}</option>
					@endforeach
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			{{ HTML::image($industri->foto, '',  array('width' => '90px','class'=>'center')) }}
			<br>
			<input class="form-control" name="foto" type="file" />
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