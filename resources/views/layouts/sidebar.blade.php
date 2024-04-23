 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{ asset('picture/logo2.png') }}" alt="SIRUCA Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-bold" style="font-family: Arial;">SIRUCA</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('storage/photo-user/' . auth()->user()->image) }}" class="img-circle elevation-2"
                     alt="User Image">
                 {{-- <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2" alt="User Image"> --}}
             </div>
             <div class="info">
                 <a href="{{ route('admin.user.show', ['id' => Auth::user()->id]) }}"
                     class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">

                 <li class="nav-item">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('admin.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-user"></i>
                         <p>
                             Data Users
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('buku.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-book"></i>
                         <p>
                             Data Buku
                         </p>
                     </a>
                 </li>


                 <li class="nav-item">
                     <form action="{{ route('logout') }}" method="post" class="nav-link">
                         @csrf
                         <button type="submit"
                             class="btn text-left btn-secondary bg-transparent border-0 btn-block p-0"
                             style="color: #c2c7d0">
                             <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Menggunakan ikon logout -->
                             <p>
                                 Logout
                             </p>
                         </button>
                     </form>
                     {{-- <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i> <!-- Menggunakan ikon logout -->
                        <p>
                            Logout
                        </p>
                    </a> --}}
                 </li>

             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
