<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

  <!-- Brand Logo Light -->
  <a href="index.html" class="logo logo-light">
      <span class="logo-lg">
          <img src="{{asset('assets/images/logo.png')}}" alt="logo">
      </span>
      <span class="logo-sm">
          <img src="{{asset('assets/images/logo-sm.png')}}" alt="small logo">
      </span>
  </a>

  <!-- Brand Logo Dark -->
  <a href="index.html" class="logo logo-dark">
      <span class="logo-lg">
          <img src="{{asset('assets/images/logo-dark.png')}}" alt="dark logo">
      </span>
      <span class="logo-sm">
          <img src="{{asset('assets/images/logo-dark-sm.png')}}" alt="small logo">
      </span>
  </a>

  <!-- Sidebar Hover Menu Toggle Button -->
  <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
      <i class="ri-checkbox-blank-circle-line align-middle"></i>
  </div>

  <!-- Full Sidebar Menu Close Button -->
  <div class="button-close-fullsidebar">
      <i class="ri-close-fill align-middle"></i>
  </div>

  <!-- Sidebar -left -->
  <div class="h-100" id="leftside-menu-container" data-simplebar>
      <!-- Leftbar User -->
      <div class="leftbar-user">
          <a href="pages-profile-2.html">
              <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42"
                  class="rounded-circle shadow-sm">
              <span class="leftbar-user-name mt-2">{{Auth::user()->user_name}}</span>
          </a>
      </div>

      <!--- Sidemenu -->
      <ul class="side-nav">

          <li class="side-nav-title">Navigation</li>

          <li class="side-nav-item">
              <a href="index.php?view=dashboard" class="side-nav-link">
                  <i class="uil-home-alt"></i>
                  <span> Dashboards </span>
              </a>
              <div class="collapse" id="sidebarDashboards">
                  <ul class="side-nav-second-level">
                      <li>
                          <a href="dashboard-analytics.html">Analytics</a>
                      </li>
                  </ul>
              </div>
          </li>

          <li class="side-nav-title">Transaction</li>

          <li class="side-nav-item">
              <a href="{{route('trx-tindakan')}}" class="side-nav-link">
                  <i class="uil-calender"></i>
                  <span> Pelayanan/Tindakan </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="{{route('trx-case-report')}}" class="side-nav-link">
                  <i class="uil-clipboard-alt"></i>
                  <span> Case Report </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="{{route('trx-karya-ilmiah')}}" class="side-nav-link">
                  <i class="uil-copy-alt"></i>
                  <span> Karya Ilmiah </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="{{route('trx-extrakulikuler')}}" class="side-nav-link">
                  <i class="uil-window"></i>
                  <span> Extrakurikuler </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="index.php?view=dashboard" class="side-nav-link">
                  <i class="uil-table"></i>
                  <span> Penilaian Supervisor </span>
              </a>
          </li>


          <li class="side-nav-title">Setup</li>


          <li class="side-nav-item">
          <a href="{{url('stase')}}" class="side-nav-link">
                  <i class="uil-calender"></i>
                  <span> Stase/Kegiatan </span>
              </a>
          </li>

          <li class="side-nav-item">
          <a href="?view=stp_pp" class="side-nav-link">
                  <i class="uil-clipboard-alt"></i>
                  <span> Profile PPDS </span>
              </a>
          </li>
          <li class="side-nav-item">
              <a href="?view=stp_sp" class="side-nav-link">
                  <i class="uil-window"></i>
                  <span> Supervisor </span>
              </a>
          </li>

          <li class="side-nav-item">
          <a href="{{url('hospital')}}" class="side-nav-link">
                  <i class="uil-table"></i>
                  <span> Hospital </span>
              </a>
          </li>

          <li class="side-nav-item">
          <a href="?view=stp_sy" class="side-nav-link">
                  <i class="uil-intercom"></i>
                  <span> System </span>
              </a>
          </li>

          <li class="side-nav-title">Reports</li>


          <li class="side-nav-item">
              <a href="{{route('nilai-ppds')}}" class="side-nav-link">
                  <i class="uil-clipboard-alt"></i>
                  <span> Daftar Nilai PPDS </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="index.php?view=dashboard" class="side-nav-link">
                  <i class="uil-copy-alt"></i>
                  <span> Daftar Kegiatan PPDS </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="index.php?view=dashboard" class="side-nav-link">
                  <i class="uil-window"></i>
                  <span> Photo Kegiatan </span>
              </a>
          </li>

          <li class="side-nav-item">
              <a href="index.php?view=dashboard" class="side-nav-link">
                  <i class="uil-table"></i>
                  <span> Data Ilmiah </span>
              </a>
          </li>

          <!-- Help Box -->
          <div class="help-box text-white text-center">
              <img src="assets/images/svg/help-icon.jpg" height="90" alt="Helper Icon Image" />
              <h5 class="mt-3">Download Apps</h5>
              <p class="mb-3">Klik Tombol Download untuk PPDS LOGBOOK</p>
              <a href="javascript: void(0);" class="btn btn-secondary btn-sm">Download</a>
          </div>
          <!-- end Help Box -->


      </ul>
      <!--- End Sidemenu -->

      <div class="clearfix"></div>
  </div>
</div>
<!-- ========== Left Sidebar End ========== -->