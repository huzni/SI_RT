{{ Form::model($siakad, ['route' => ['admin.siakad.update', $siakad->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()', 'enctype'=>'multipart/form-data']) }}
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" autofocus name="nim" type="text" placeholder="NIM" value="{{ $siakad->nim }}" required />
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="nama_mahasiswa" type="text" placeholder="Nama Mahasiswa" value="{{ $siakad->nama_mahasiswa }}" required />
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="jenis_kelamin" required class="form-control">
				<option value="Laki-laki"
				@if($siakad->jenis_kelamin=='Laki-laki') selected @endif 
				>Laki-laki</option>
				<option value="Perempuan"
				@if($siakad->jenis_kelamin=='Perempuan') selected @endif
				>Perempuan</option>
			</select>
		</div>
	</div>
	<div class="form-group ">
		<div class="col-lg-12">
			<textarea name="alamat" placeholder="Alamat" class="form-control">{{ $siakad->alamat }}</textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<select name="jurusan_id" required class="form-control" onselect="prodi($(this).val(),'2')" onchange="prodi($(this).val(),'2')">
				@foreach($jurusans as $jurusan)
				<option value="{{ $jurusan->id }}"
					@if($jurusan->id==$prodi->jurusan_id) selected @endif
					>{{ $jurusan->nama_jurusan }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-12">
				<select name="prodi_id" id="prodi_id2" class="form-control">
					@foreach($prodis as $prodi) 
					<option value="{{ $prodi->id }}"
						@if($prodi->id==$siakad->prodi_id) selected @endif
						>{{ $prodi->nama_prodi }}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-12">
					{{ HTML::image('uploads/images/'.$siakad->foto, '',  array('width' => '90px','class'=>'center')) }}
					<br>
					<input class="form-control" name="foto" type="file" />
				</div>
			</div>
			<div class="form-group ">
				<div class="col-lg-12">
				<input class="form-control" name="ipk" type="text" placeholder="IPK" value="{{ $siakad->ipk }}" required />
				</div>
			</div>
			<div class="form-group ">
				<div class="col-lg-12">
					<input class="form-control" name="jumlah_sks" type="text" placeholder="Jumlah SKS" value="{{ $siakad->jumlah_sks }}" required />
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-12">
					<select name="status" required class="form-control">
						<option value="yes"
						@if($siakad->status=='yes') selected @endif
						>Yes</option>
						<option value="no"
						@if($siakad->status=='no') selected @endif
						>No</option>
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