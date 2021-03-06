<aside class="main-sidebar sidebar-dark-primary elevation-4 inverted">
  {{-- <a href="" class="brand-link">
    <img src="{{URL::to('/')}}/image/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
    @php preg_match_all('/(?<=\s|^)[a-z]/i', Auth::user()->getSchool->school_name, $schools); @endphp
    <span class="brand-text font-weight-light">{{strtoupper(implode('', $schools[0]))}} 
    @if(Auth::user()->getBatch)
      ({{Auth::user()->getBatch->name}})
    @endif
  </span>
  </a> --}}
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image pt-1">
        @php 
        $auth_name = Auth::user()->name.' '.Auth::user()->last_name; 
        preg_match_all('/(?<=\s|^)[a-z]/i', $auth_name, $matches); 
        @endphp
        <span class="border border-light rounded-circle py-1 {{count($matches[0]) == 1 ? 'px-2' : 'px-'.(3-count($matches[0]))}} bg-success text-light text-capitalize elevation-3">{{strtoupper(implode('', $matches[0]))}}</span>
      </div>
      <div class="info">
        <a href="{{ route('superadmin.home')}}" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item has-treeview {{ (request()->is('home/main-entry/*')) ? 'menu-open' : '' }}">
              <a href="#" class="nav-link {{ (request()->is('home/main-entry/*')) ? 'active' : '' }}">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Main Entry
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('superadmin.header.index')}}" class="nav-link {{ (request()->is('home/main-entry/header*')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                     Header
                   </p>
                 </a>
               </li>
               <li class="nav-item">
                <a href="{{ route('superadmin.menu.index')}}" class="nav-link {{ (request()->is('home/main-entry/menu*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-list"></i>
                  <p>
                    Menu
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('superadmin.sidemenu.index')}}" class="nav-link {{ (request()->is('home/main-entry/sidemenu*')) ? 'active' : '' }}">
                  <i class="nav-icon fas fa-bars"></i>
                  <p>
                   Side Menu
                 </p>
               </a>
             </li>
             <li class="nav-item">
              <a href="{{ route('superadmin.slider.index')}}" class="nav-link {{ (request()->is('home/main-entry/slider*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-calendar-alt"></i>
                <p>
                  Slider
                </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview {{ (request()->is('home/menu-page/*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (request()->is('home/menu-page/*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Menu Top
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            {{-- <li class="nav-item">
              <a href="{{ route('superadmin.niti.index')}}" class="nav-link {{ (request()->is('home/menu-page/niti*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Niti
                </p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="{{ route('superadmin.notice.index')}}" class="nav-link {{ (request()->is('home/menu-page/notice*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Notice
                </p>
              </a>
            </li> --}}
            <li class="nav-item">
              <a href="{{ route('superadmin.mission.index')}}" class="nav-link {{ (request()->is('home/menu-page/mission*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-bars"></i>

                <p>
                  Mission
                </p>
              </a>
            </li>  
            <li class="nav-item">
              <a href="{{ route('superadmin.vision.index')}}" class="nav-link {{ (request()->is('home/menu-page/vision*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-bars"></i>
                {{-- <i class="nav-icon fas fa-calendar-alt"></i> --}}
                <p>
                  Vision
                </p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('superadmin.coreperson.index')}}" class="nav-link {{ (request()->is('home/menu-page/coreperson*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                 Core Person
               </p>
             </a>
           </li> --}}
           {{-- <li class="nav-item">
              <a href="{{ route('superadmin.department.index')}}" class="nav-link {{ (request()->is('home/menu-page/department*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                 Department
               </p>
             </a>
           </li> --}}
           {{-- <li class="nav-item">
              <a href="{{ route('superadmin.pratibedan.index')}}" class="nav-link {{ (request()->is('home/menu-page/pratibedan*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-file"></i>
                <p>
                 Pratibedan
               </p>
             </a>
           </li> --}}
           {{-- <li class="nav-item">
              <a href="{{ route('superadmin.sangathansanrachana.index')}}" class="nav-link {{ (request()->is('home/menu-page/sangathansanrachana*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                 Sangathan Sanrachana
             </a>
           </li> --}}
           <li class="nav-item">
              <a href="{{ route('superadmin.contactus.index')}}" class="nav-link {{ (request()->is('home/menu-page/contactus*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-address-card"></i>
                <p>
                 Contact Us
               </p>
             </a>
           </li>
           {{-- <li class="nav-item">
              <a href="{{ route('superadmin.aboutus.index')}}" class="nav-link {{ (request()->is('home/menu-page/aboutus*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-info"></i>
                <p>
                 About Us
               </p>
             </a>
           </li> --}}
           {{-- <li class="nav-item">
              <a href="{{ route('superadmin.gallery.index')}}" class="nav-link {{ (request()->is('home/menu-page/gallery*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-images"></i>
                <p>
                 Gallery
               </p>
             </a>
           </li> --}}
          </ul>
        </li>
        <li class="nav-item has-treeview {{ (request()->is('home/sidebar-part/*')) ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ (request()->is('home/sidebar-part/*')) ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Sidebar Menu
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('superadmin.mantralaya.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/mantralaya*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Mantralaya
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.dal.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/dal*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Dal
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.pradeshsabhasadasya.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/pradeshsabhasadasya*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  PradeshSadasya
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.eservice.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/eservice*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Eservice
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.hellocm.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/hellocm*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Hello CM
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.importantplace.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/importantplace*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-map-marker-alt"></i>
                <p>
                  Important Places
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('superadmin.pradeshsarkar.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/pradeshsarkar*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Pradesh Sarkar
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('superadmin.apimantri.index')}}" class="nav-link {{ (request()->is('home/sidebar-part/apimantri*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Api Mantri 
                </p>
              </a>
            </li>
          </ul>
        </li>
       <li class="nav-item">
          <a href="{{ route('superadmin.fiscalyear.index')}}" class="nav-link {{ (request()->is('home/fiscalyear*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
             Fiscal Year
           </p>
         </a>
       </li>
       </li>
        {{-- <li class="nav-item">
          <a href="{{ route('superadmin.office.index')}}" class="nav-link {{ (request()->is('home/office*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-building"></i>
            <p>
             Office
           </p>
         </a>
       </li> --}}  
        <li class="nav-item">
          <a href="{{ route('superadmin.usefullink.index')}}" class="nav-link {{ (request()->is('home/usefullink*')) ? 'active' : '' }}">
            <i class="nav-icon fas  fa-link"></i>
            <p>
             Useful Link
           </p>
         </a>
       </li> 
        {{-- <li class="nav-item">
          <a href="{{ route('superadmin.introduction.index')}}" class="nav-link {{ (request()->is('home/introduction*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
            Introduction
           </p>
         </a>
       </li> --}}
       <li class="nav-item">
          <a href="{{route('superadmin.istaniyataha.index')}}" class="nav-link {{ (request()->is('home/istaniyataha*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>
            GIS Info 
           </p>
         </a>
       </li>
      </ul>
    </nav>
  </div>
</aside>
