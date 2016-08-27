{{ Form::model($kategori, ['route' => ['admin.kategori.update', $kategori->id], 'class' => 'form-horizontal', 'method'=>'PATCH', 'onsubmit'=>'pesanTunggu()']) }}
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<input class="form-control" name="nama_kategori" type="text" placeholder="Nama Kategori" value="{{ $kategori->nama_kategori }}" required />
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
						@if($prodi->id==$kategori->prodi_id) selected @endif
						>{{ $prodi->nama_prodi }}</option>
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