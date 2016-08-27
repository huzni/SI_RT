<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">

      <li>
        <a href="{{ route('admin.dashboard') }}" {{ (Request::is('admin/dashboard') ? 'class=active' : '') }}>
          <i class="icon-home"></i>
          <span>Home</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.jurusan.index') }}" {{ (Request::is('admin/jurusan') ? 'class=active' : '') }}>
          <i class="icon-tag"></i>
          <span>Warga</span>
        </a>
      </li>
      <!-- <li>
        <a href="{{ route('admin.prodi.index') }}" {{ (Request::is('admin/prodi') ? 'class=active' : '') }}>
          <i class="icon-tags"></i>
          <span>Prodi</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.mahasiswa.index') }}" {{ (Request::is('admin/mahasiswa') ? 'class=active' : '') }}>
          <i class="icon-male"></i>
          <span>Mahasiswa</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.provinsi.index') }}" {{ (Request::is('admin/provinsi') ? 'class=active' : '') }}>
          <i class="icon-th-list"></i>
          <span>Provinsi</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.kabupaten.index') }}" {{ (Request::is('admin/kabupaten') ? 'class=active' : '') }}>
          <i class="icon-list"></i>
          <span>Kabupaten</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.kategori.index') }}" {{ (Request::is('admin/kategori') ? 'class=active' : '') }}>
          <i class="icon-folder-close-alt"></i>
          <span>Kategori</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.industri.index') }}" {{ (Request::is('admin/industri*') ? 'class=active' : '') }} >
          <i class="icon-cogs"></i>
          <span>Industri</span>
        </a>
      </li>
      <li>
        <a href="{{ route('admin.siakad.index') }}" {{ (Request::is('admin/siakad') ? 'class=active' : '') }} >
          <i class="icon-desktop"></i>
          <span>Siakad</span>
        </a>
      </li> -->
  </ul>
</li>
</ul>

</div>
</aside>
      <!--sidebar end-->