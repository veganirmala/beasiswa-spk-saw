  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/dashboard" class="brand-link">
          <img src="{{ asset('/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">DSS Beasiswa</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <li class="nav-item">
                      <a href="/berkasmahasiswa" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>
                              Data Berkas Mahasiswa
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="/berkasmahasiswa/detail" class="nav-link">
                          <i class="far fa fa-users nav-icon"></i>
                          <p>
                              Pengajuan Berkas Mahasiswa
                          </p>
                      </a>
                  </li>
                  @role('admin')
                      <li class="nav-item">
                          <a href="/role" class="nav-link">
                              <i class="nav-icon fa fa-id-card"></i>
                              <p>
                                  Data Role
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/permission" class="nav-link">
                              <i class="nav-icon fa fa-lock"></i>
                              <p>
                                  Data Permission
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/user" class="nav-link">
                              <i class="nav-icon far fa-user"></i>
                              <p>
                                  Data User
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/jurusan" class="nav-link">
                              <i class="nav-icon far fa fa-desktop"></i>
                              <p>
                                  Data Jurusan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/prodi" class="nav-link">
                              <i class="nav-icon far fa fa-chalkboard-teacher"></i>
                              <p>
                                  Data Prodi
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/jenisbeasiswa" class="nav-link">
                              <i class="nav-icon far fa fa-book"></i>
                              <p>
                                  Data Jenis Beasiswa
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/jenisprestasi" class="nav-link">
                              <i class="nav-icon far fa fa-book"></i>
                              <p>
                                  Data Jenis Prestasi
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/tahunusulan" class="nav-link">
                              <i class="nav-icon far fa fa-calendar"></i>
                              <p>
                                  Data Tahun Usulan
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/bobotkriteria" class="nav-link">
                              <i class="nav-icon far fa fa-clipboard-list"></i>
                              <p>
                                  Data Bobot Kriteria
                              </p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="/dashboard" class="nav-link">
                              <i class="nav-icon far fa fa-users"></i>
                              <p>
                                  Mahasiswa
                                  <i class="fas fa-angle-left right"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="/mahasiswa" class="nav-link">
                                      <i class="far fa fa-users nav-icon"></i>
                                      <p>Data Mahasiswa</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/nilaiprestasi" class="nav-link">
                                      <i class="far fa fa-book nav-icon"></i>
                                      <p>Data Nilai Prestasi</p>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a href="/ipk" class="nav-link">
                                      <i class="far fa fa-award nav-icon"></i>
                                      <p>Data IPK</p>
                                  </a>
                              </li>
                          </ul>
                      <li class="nav-item">
                          <a href="/rekapanbeasiswa" class="nav-link">
                              <i class="nav-icon far fa fa-graduation-cap"></i>
                              <p>
                                  Data Rekapan
                              </p>
                          </a>
                      </li>
                      </li>
                  @endrole
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
