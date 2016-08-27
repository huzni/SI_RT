{{ Form::model($jurusan, ['route' => ['admin.jurusan.update', $jurusan->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()']) }}
<div class="modal-body">
	<div class="form-group">
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Nama : </label>

		<div class="col-sm-9">
		<input type="text" required name="nama_jurusan" placeholder="Nama Jurusan" class="form-control" value="{{ $jurusan->nama_jurusan }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> No KTP : </label>
		<div class="col-sm-9">
		<input type="text" required name="no_ktp" placeholder="Nomor KTP" class="form-control" value="{{ $jurusan->no_ktp }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Alamat : </label>
		<div class="col-sm-9">
		<input type="text" required name="alamat" placeholder="Alamat" class="form-control" value="{{ $jurusan->alamat }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Jenis Kelamin : </label>
		<div class="col-sm-9">
		<input type="text" required name="jenis_kelamin" placeholder="Jenis Kelamin" class="form-control" value="{{ $jurusan->jenis_kelamin }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Tanggal Lahir : </label>
		<div class="col-sm-9">
		<input type="text" required name="tanggal_lahir" placeholder="Tanggal Lahir" class="form-control" value="{{ $jurusan->tanggal_lahir }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Tempat Lahir: </label>
		<div class="col-sm-9">
		<input type="text" required name="tempat_lahir" placeholder="Tempat lahir" class="form-control" value="{{ $jurusan->tempat_lahir }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Golongan : </label>
		<div class="col-sm-9">
		<input type="text" required name="golongan_darah" placeholder="Golongan darah" class="form-control" value="{{ $jurusan->golongan_darah }}" />
		</div>
		<label class="col-sm-3 control-label no-padding-left" for="form-field-1-1"> Status Perkerjaan : </label>
		<div class="col-sm-9">
		<input type="text" required name="status_pekerjaan" placeholder="Status pekerjaan" class="form-control" value="{{ $jurusan->status_pekerjaan }}" />
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