@extends('layouts.app')

@section('title')
Mahasiswa
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
        <b>MAHASISWA</b>
      </header>
      <div class="panel-body">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <!-- <div class="btn-group">
              <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#tambahModal">
                Tambah <i class="icon-plus"></i>
              </button>
            </div> -->
          </div>
          <div class="space15"></div>
          <table class="table table-striped table-hover table-bordered" id="editable-sample">
            <thead>
              <tr>
                <td align="center"><b>No</b></td>
                <td align="center"><b>NIM</b></td>
                <td align="center"><b>Nama Mahasiswa</b></td>
                <td align="center"><b>Prodi</b></td>
                <td align="center"><b>Foto</b></td>
                <td align="center"><b>Reset Password</b></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($mahasiswas as $mahasiswa)
                <tr class="">
                  <td><?php echo $i++ ?></td>
                  <td>{{ $mahasiswa->nim }}</td>
                  <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                  <td>{{ $mahasiswa->nama_prodi }}</td>
                  <td align="center">
                    {{ HTML::image('uploads/images/'.$mahasiswa->foto, '',  array('width' => '50px')) }}
                  </td>
                  <td align="center">
                    <a href="{{ url('admin/mahasiswa/reset/'.$mahasiswa->id) }}" onclick="pesanTunggu()">
                      <button type="button" class="btn btn-primary btn-xs">
                        <i class="icon-refresh"></i>
                      </button>
                    </a>
                  </td>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal"onclick="editForm('{{ route('admin.mahasiswa.edit', $mahasiswa->id) }}')" >
                      <i class="icon-edit"></i>
                    </button>
                  </td>
                  <td align="center">
                    {{ Form::model($mahasiswa, ['route' => ['admin.mahasiswa.destroy', $mahasiswa->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $mahasiswa->nama_mahasiswa }}')">
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
        <h4 class="modal-title">Tambah Mahasiswa</h4>
      </div>
      {{ Form::open(array('route' => 'admin.mahasiswa.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()', 'enctype'=>'multipart/form-data')) }}
        <div class="modal-body">
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" autofocus name="nim" type="text" placeholder="NIM" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="nama_mahasiswa" type="text" placeholder="Nama Mahasiswa" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="jenis_kelamin" required class="form-control">
                <option value="">-Pilih Jenis Kelamin-</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <textarea name="alamat" placeholder="Alamat" class="form-control"></textarea>
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
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="foto" type="file"required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="password" type="password" placeholder="Password" required />
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
        <h4 class="modal-title">Edit Mahasiswa</h4>
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
    bootbox.confirm("Hapus Mahasiswa '" + data + "' ?", function(result) {
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
