
<div class="modal-body">
	<div class="form-group ">
		<div class="col-lg-12">
			<p align="center">Jumlah Mahasiswa yang Memenuhi Syarat Praktik Industri : </p>
			<h2 align="center">{{ $siakad }}</h2>
		</div>
	</div>
</div>

<div class="modal-footer">
	<a href="{{ route('admin.siakad.tambahkan') }}">
	<button class="btn btn-sm btn-primary" type="submit">
		<i class="ace-icon fa fa-save"></i>
		Tambahkan
	</button>
	</a>
	<button class="btn btn-sm btn-danger pull-right" data-dismiss="modal">
		<i class="ace-icon fa fa-times"></i>
		Batal
	</button>
</div>