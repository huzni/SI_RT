@extends('layouts.app')

@section('title')
Siakad
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
        <b>SIAKAD</b>
      </header>
      <div class="panel-body">
        <div class="adv-table editable-table ">
          <div class="clearfix">
            <div class="btn-group">
              <button id="editable-sample_new" class="btn green" data-toggle="modal" href="#tambahModal">
                Tambah <i class="icon-plus"></i>
              </button>
            </div>
            <div class="btn-group pull-right">
              <button class="btn green" data-toggle="modal" href="#siakadModal" onclick="siakadForm('{{ route('admin.siakad.create') }}')">
                Tambahkan Data ke Sistem <i class="icon-download-alt"></i>
              </button>
            </div>
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
                <td align="center"><b>IPK</b></td>
                <td align="center"><b>Jumlah SKS</b></td>
                <td align="center"><b>Status Pembekalan</b></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
            </thead>
            <tbody>
              <?php $i =1; ?>
              @foreach($siakads as $siakad)
                <tr class="">
                  <td><?php echo $i++ ?></td>
                  <td>{{ $siakad->nim }}</td>
                  <td>{{ $siakad->nama_mahasiswa }}</td>
                  <td>{{ $siakad->nama_prodi }}</td>
                  <td align="center">
                    {{ HTML::image('uploads/images/'.$siakad->foto, '',  array('width' => '50px')) }}
                  </td>
                  <td align="center">{{ $siakad->ipk }}</td>
                  <td align="center">{{ $siakad->jumlah_sks }}</td>
                  <td align="center">{{ $siakad->status }}</td>
                  <td align="center">
                    <button type="button" class="btn btn-success btn-xs" data-toggle="modal" href="#editModal" onclick="editForm('{{ route('admin.siakad.edit', $siakad->id) }}')" >
                      <i class="icon-edit"></i>
                    </button>
                  </td>
                  <td align="center">
                    {{ Form::model($siakad, ['route' => ['admin.siakad.destroy', $siakad->id], 'method'=>'DELETE', 'class' => 'form-inline', 'id' => 'form-hapus-'.$i, 'onsubmit' => 'return confirmHapus()']) }}
                    <a href="#" class="red" onclick="confirmHapus('{{ $i }}','{{ $siakad->nama_mahasiswa }}')">
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
      {{ Form::open(array('route' => 'admin.siakad.store', 'class' => 'cmxform form-horizontal tasi-form', 'method' => 'POST', 'onsubmit' => 'pesanTunggu()', 'enctype'=>'multipart/form-data')) }}
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
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="ipk" type="text" placeholder="IPK" required />
            </div>
          </div>
          <div class="form-group ">
            <div class="col-lg-12">
              <input class="form-control" name="jumlah_sks" type="text" placeholder="Jumlah SKS" required />
            </div>
          </div>
          <div class="form-group">
            <div class="col-lg-12">
              <select name="status" required class="form-control">
                <option value="">-Pilih Status Pembekalan-</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
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
        <h4 class="modal-title">Edit Mahasiswa</h4>
      </div>
      <div id="edit-form">

      </div>
    </div>
  </div>
</div>
<!-- modal -->

<!-- Modal -->
<div class="modal fade" id="siakadModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Tambahkan Data ke Sistem</h4>
      </div>
      <div id="siakad-form">

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

  function siakadForm(alamat) {
    document.getElementById('siakad-form').innerHTML = "";
    $.ajax({
      url: alamat ,
      success: function(msg) {
        $('#siakad-form').html(msg);
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
