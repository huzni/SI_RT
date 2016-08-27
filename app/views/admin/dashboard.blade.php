@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('head')

@endsection

@section('sidebar')
@include('layouts.sidebar')
@endsection

@section('content')
<section id="main-content" style="min-height: 640px">
  <section class="wrapper">
    <div class="row state-overview">
      <div class="col-lg-3 col-sm-6">
        <section class="panel">
          <div class="symbol terques">
            <i class="icon-tag"></i>
          </div>
          <div class="value">
            <h1 class="count">
              34
            </h1>
            <p><b>Pelajar</b></p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="panel">
          <div class="symbol weather-bg">
            <i class="icon-tags"></i>
          </div>
          <div class="value">
            <h1 class=" count2">
              28
            </h1>
            <p><b>Karyawan</b></p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="panel">
          <div class="symbol yellow">
            <i class="icon-male"></i>
          </div>
          <div class="value">
            <h1 class=" count3">
              109
            </h1>
            <p><b>Mahasiswa</b></p>
          </div>
        </section>
      </div>
      <div class="col-lg-3 col-sm-6">
        <section class="panel">
          <div class="symbol red">
            <i class="icon-cogs"></i>
          </div>
          <div class="value">
            <h1 class=" count4">
              23
            </h1>
            <p><b>Ibu Rumah Tangga</b></p>
          </div>
        </section>
      </div>
    </div>

  </section>
</section>
<!--main content end-->
@endsection

@section('js')

@endsection