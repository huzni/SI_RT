@extends('layouts.app')

@section('title')
Industri
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
        <b>INDUSTRI</b>
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
                <td align="center"><b>Nama Industri</b></td>
                <td align="center"><b>Alamat</b></td>
                <td align="center"><b>Kabupaten</b></td>
                <td align="center"><b>Foto</b></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($industris as $industri)
                <tr class="">
                  <td>{{ $i++ }}</td>
                  <td>{{ $industri->nama_industri }}</td>
                  <td>{{ $industri->alamat }}</td>
                  <td>{{ $industri->nama_kabupaten }}</td>
                  <td align="center">
                    {{ HTML::image($industri->foto_url, '',  array('width' => '50px')) }}
                  </td>
                  <td align="center">
                    <a href="{{ route('admin.industri.show', $industri->id) }}">
                      <button type="button" class="btn btn-primary btn-xs">
                        Detail
                      </button>
                    </a>
                  </td>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal"onclick="editForm('{{ route('admin.industri.edit', $industri->id) }}')" >
                      <i class="icon-edit"></i>
                    </button>
                  </td>
                  <td align="center">
                    {{ Form::model($industri, ['route' => ['admin.industri.destroy', $industri->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $industri->nama_industri }}')">
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
        <h4 class="modal-title">Tambah Industri</h4>
      </div>
      {{ Form::open(array('route' => 'admin.industri.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()', 'enctype'=>'multipart/form-data')) }}
        <div class="modal-body">
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="nama_industri" type="text" placeholder="Nama Industri" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <textarea name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="lat" type="text" placeholder="Latitude" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="lng" type="text" placeholder="Longitude" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="jumlah_karyawan" type="text" placeholder="Jumlah Karyawan" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="provinsi_id" required class="form-control" onselect="kabupaten($(this).val(),'1')" onchange="kabupaten($(this).val(),'1')">
                <option value="">-Pilih Provinsi-</option>
                @foreach($provinsis as $provinsi)
                <option value="{{ $provinsi->id }}">{{ $provinsi->nama_provinsi }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="kabupaten_id" id="kabupaten_id" required class="form-control">
                
              </select>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="foto" type="file"required />
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
        <h4 class="modal-title">Edit Industri</h4>
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
    bootbox.confirm("Hapus Industri '" + data + "' ?", function(result) {
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

  function kabupaten(id,kabupaten_id) {
    var alamat = '{{ url('admin/getKabupaten') }}'+ '/' +id + '/' +kabupaten_id;

    if(kabupaten_id==1) {
      $.ajax({
        url: alamat ,
        success: function(msg) {
          $('#kabupaten_id').html(msg);
        },
        dataType: "html"
      });
    } else {
      $.ajax({
        url: alamat ,
        success: function(msg) {
          $('#kabupaten_id2').html(msg);
        },
        dataType: "html"
      });
    }
    
    
  }
</script>
@endsection
