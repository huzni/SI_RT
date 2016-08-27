@extends('layouts.app')

@section('title')
DETAIL INDUSTRI
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
        <b>DETAIL INDUSTRI</b>
      </header>
      <div class="panel-body">
        <div class="col-lg-5">
          <table cellpadding="10">
            <tr>
              <td>Nama Industri</td>
              <td>:</td>
              <td>{{ $industri->nama_industri }}</td>
            </tr>
            <tr>
              <td>Deskripsi</td>
              <td>:</td>
              <td>{{ $industri->deskripsi }}</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>:</td>
              <td>{{ $industri->alamat }}</td>
            </tr>
            <tr>
              <td>Jumlah Karyawan</td>
              <td>:</td>
              <td>{{ $industri->jumlah_karyawan }}</td>
            </tr>
            <tr>
              <td>Kabupaten</td>
              <td>:</td>
              <td>{{ $kabupaten->nama_kabupaten }}</td>
            </tr>
            <tr>
              <td>Provinsi</td>
              <td>:</td>
              <td>{{ $provinsi->nama_provinsi }}</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td>
                {{ HTML::image($industri->foto_url, '',  array('width' => '150px')) }}
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-7">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#tambahModal">
                Tambah <i class="icon-plus"></i>
              </button>
            </div>
          </div>
          <br>
          <table class="table table-striped table-hover table-bordered">
            <thead>
              <tr>
                <td align="center"><b>No</b></td>
                <td align="center"><b>Nama Kategori</b></td>
                <td align="center"><b>Spesifikasi</b></td>
                <td align="center"><b>Tags</b></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($spesifikasis as $spesifikasi)
                <tr>
                  <td align="center">{{ $i++ }}</td>
                  <td align="">{{ $spesifikasi->nama_kategori }}</td>
                  <td align="">{{ $spesifikasi->spesifikasi }}</td>
                  <td align="">{{ $spesifikasi->tags }}</td>
                  <td align="center">
                    {{ Form::model($spesifikasi, ['route' => ['admin.kategori-industri.destroy', $spesifikasi->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $spesifikasi->spesifikasi }}')">
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
        <h4 class="modal-title">Tambah Kategori Industri</h4>
      </div>
      {{ Form::open(array('route' => 'admin.kategori-industri.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()', 'enctype'=>'multipart/form-data')) }}
        <div class="modal-body">
          <div class="form-group">
            <div class="col-lg-12">
              <select name="jurusan_id" required class="form-control" onselect="prodi($(this).val(),'3')" onchange="prodi($(this).val(),'3')">
                <option value="">-Pilih Jurusan-</option>
                @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="prodi_id" id="prodi_id" required class="form-control" onselect="kategori($(this).val())" onchange="kategori($(this).val())">
                
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="kategori_id" id="kategori_id" required class="form-control">
                
              </select>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="spesifikasi" type="text" placeholder="Spesifikasi" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="tags" type="text" placeholder="Tags" required />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Tutup</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
        <input type="hidden" name="industri_id" value="{{ $industri->id }}">
      {{ Form::close() }}
    </div>
  </div>
</div>
<!-- modal -->

@endsection

@section('js')
<script type="text/javascript">
  function prodi(id,prodi_id) {
    var alamat = '{{ url('admin/getProdi') }}'+ '/' +id + '/' +prodi_id;

      $.ajax({
        url: alamat ,
        success: function(msg) {
          $('#prodi_id').html(msg);
        },
        dataType: "html"
      });
  }

  function kategori(id) {
    var alamat = '{{ url('admin/getKategori') }}'+ '/' +id;

    $.ajax({
      url: alamat ,
      success: function(msg) {
        $('#kategori_id').html(msg);
      },
      dataType: "html"
    });
    
  }

  function confirmHapus(id,data) {
    bootbox.confirm("Hapus Kategori Industri '" + data + "' ?", function(result) {
      if(result) {
        pesanTunggu();
        document.getElementById('form-hapus-'+id).submit();
      }
    }); 
  }
</script>
@endsection