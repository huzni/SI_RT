@extends('layouts.app')

@section('title')
Prodi
@endsection

@section('head')

@endsection

@section('sidebar')
@include('layouts.sidebar')
@endsection

@section('content')
<section id="main-content" style="min-height: 640px">
  <section class="wrapper">
    <!-- page start-->
    <section class="panel">
      <header class="panel-heading">
        <b>PRODI</b>
      </header>
      <div class="panel-body">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#tambahModal">
                Tambah <i class="icon-plus"></i>
              </button>
            </div>
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <td align="center"><b>No</b></td>
                <td align="center"><b>Nama Prodi</b></td>
                <td align="center"><b>Nama Jurusan</b></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($prodis as $prodi)
                <tr class="">
                  <td><?php echo $i++ ?></td>
                  <td>{{ $prodi->nama_prodi }}</td>
                  <td>{{ $prodi->nama_jurusan }}</td>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal"onclick="editForm('{{ route('admin.prodi.edit', $prodi->id) }}')" >
                      <i class="icon-edit"></i>
                    </button>
                  </td>
                  <td align="center">
                    {{ Form::model($prodi, ['route' => ['admin.prodi.destroy', $prodi->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $prodi->nama_prodi }}')">
                      <button type="button" class="btn btn-danger btn-xs">
                        <i class="icon-trash btn-danger btn-xs"></i>
                      </button>
                    </a>
                    {{ Form::close() }}
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- page end-->
  </section>
</section>
<!--main content end-->

<!-- Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambah Prodi</h4>
      </div>
      {{ Form::open(array('route' => 'admin.prodi.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()')) }}
        <div class="modal-body">
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" autofocus name="nama_prodi" type="text" placeholder="Nama Prodi" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="jurusan_id" required class="form-control">
                <option value="">-Pilih Jurusan-</option>
                @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit Jurusan</h4>
      </div>
      <div id="edit-form">

      </div>
    </div>
  </div>
</div>
<!-- modal -->

@endsection

@section('js')
  <script type="text/javascript">
  function confirmHapus(id,data) {
    bootbox.confirm("Hapus Prodi '" + data + "' ?", function(result) {
      if(result) {
        pesanTunggu();
        document.getElementById('form-hapus-'+id).submit();
      }
    }); 
  }


  function editForm(alamat) {
    document.getElementById('edit-form').innerHTML = "";

    $.ajax({
      url: alamat ,
      success: function(msg) {
        $('#edit-form').html(msg);
      },
      dataType: "html"
      });
  }
</script>
@endsection
