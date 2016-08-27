@extends('layouts.app')

@section('title')
Kategori
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
        <b>KATEGORI</b>
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
                <td align="center"><b>Nama Kategori</b></td>
                <td align="center"><b>Prodi</b></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($kategoris as $kategori)
                <tr class="">
                  <td>{{ $i++ }}</td>
                  <td>{{ $kategori->nama_kategori }}</td>
                  <td>{{ $kategori->nama_prodi }}</td>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal"onclick="editForm('{{ route('admin.kategori.edit', $kategori->id) }}')" >
                      <i class="icon-edit"></i>
                    </button>
                  </td>
                  <td align="center">
                    {{ Form::model($kategori, ['route' => ['admin.kategori.destroy', $kategori->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $kategori->nama_kategori }}')">
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
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      {{ Form::open(array('route' => 'admin.kategori.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()')) }}
        <div class="modal-body">
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="nama_kategori" type="text" placeholder="Nama Kategori" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="jurusan_id" required class="form-control" onselect="prodi($(this).val(),'1')" onchange="prodi($(this).val(),'1')">
                <option value="">-Pilih Jurusan-</option>
                @foreach($jurusans as $jurusan)
                <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="prodi_id" id="prodi_id" required class="form-control">
                
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
        <h4 class="modal-title">Edit Kategori</h4>
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
    bootbox.confirm("Hapus Kategori '" + data + "' ?", function(result) {
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

  function prodi(id,prodi_id) {
    var alamat = '{{ url('admin/getProdi') }}'+ '/' +id + '/' +prodi_id;

    if(prodi_id==1) {
      $.ajax({
        url: alamat ,
        success: function(msg) {
          $('#prodi_id').html(msg);
        },
        dataType: "html"
      });
    } else {
      $.ajax({
        url: alamat ,
        success: function(msg) {
          $('#prodi_id2').html(msg);
        },
        dataType: "html"
      });
    }
    
    
  }
</script>
@endsection
