<div class="sidebar-area" id="sidebar-area">
    <div class="logo position-relative">
        <a href="index" class="d-block text-decoration-none position-relative">
            <img src="/assets/images/logoskolah.png" alt="logo-icon" class="" style="height: 30px">
            <span class="logo-text fw-bold text-dark ms-2">Pusdiglah</span>
        </a>
        <button
            class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
            id="sidebar-burger-menu">
            <i data-feather="x"></i>
        </button>
    </div>

    <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
        @if (auth()->user()->hasRole('admin'))
            <ul class="menu-inner">
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">MAIN</span>
                </li>

                <!-- Dashboard -->
                <li
                    class="menu-item {{ Request::is('dashboard') ? 'open' : '' }}">
                    <a href="{{ route('admin.dashboard') }}"
                        class="menu-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <span class="material-symbols-outlined menu-icon">dashboard</span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>


                <!-- Kelola Buku -->
                <li
                    class="menu-item {{ Request::is('admin/books*') || Request::is('admin/books-classes*') || Request::is('admin/books-shelf/index') || Request::is('admin/inventory/index') || Request::is('books*') || Request::is('books-classes*') || Request::is('books-shelf*') || Request::is('inventory*') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-link menu-toggle {{ Request::is('books*') || Request::is('books-classes*') || Request::is('books-shelf*') || Request::is('inventory*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined menu-icon">book_2</span>
                        <span class="title">Kelola Buku</span>
                    </a>
                    <ul
                        class="menu-sub {{ Request::is('admin/books/index') || Request::is('admin/books-classes/index') || Request::is('admin/books-shelf/index') || Request::is('admin/inventory/index') || Request::is('books*') || Request::is('books-classes*') || Request::is('books-shelf*') || Request::is('inventory*') ? 'show' : '' }}">
                        <li class="menu-item">
                            <a href="{{ route('admin.books.index') }}"
                                class="menu-link {{ Request::is('admin/books') ? 'active' : '' }}">
                                Book
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.books-classes.index') }}"
                                class="menu-link {{ Request::is('admin/books-classes*') ? 'active' : '' }}">
                                Book Class
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route('admin.books-shelf.index') }}"
                                class="menu-link {{ Request::is('admin/books-shelf*') ? 'active' : '' }}">
                                Book Shelf
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href=""
                                class="menu-link {{ Request::is('inventory*') ? 'active' : '' }}">
                                Inventory
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- Peminjaman Buku -->
                <li class="menu-item {{ Request::is('admin/borrows*') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-link menu-toggle {{ Request::is('admin/borrows*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined menu-icon">bookmark</span>
                        <span class="title">Peminjaman Buku</span>
                    </a>
                    <ul class="menu-sub {{ Request::is('admin/borrows*') ? 'show' : '' }}">
                        <li class="menu-item">
                            <a href="" class="menu-link {{ Request::is('admin/borrows') ? 'active' : '' }}">
                                Peminjaman Buku
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href=""
                                class="menu-link {{ Request::is('admin/borrows/history') ? 'active' : '' }}">
                                History Peminjaman
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href=""
                                class="menu-link {{ Request::is('admin/borrows/return') ? 'active' : '' }}">
                                Pengembalian Buku
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href=""
                                class="menu-link {{ Request::is('admin/borrows/lost') ? 'active' : '' }}">
                                Buku Hilang
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Users -->
                <li class="menu-item {{ Request::is('admin/users*') ? 'open' : '' }}">
                    <a href="javascript:void(0);"
                        class="menu-link menu-toggle {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <span class="material-symbols-outlined menu-icon">group_add</span>
                        <span class="title">Users</span>
                    </a>
                    <ul class="menu-sub {{ Request::is('admin/users*') ? 'show' : '' }}">
                        <li class="menu-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="menu-link {{ Request::is('admin/users') ? 'active' : '' }}">
                                Add User and Role
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <li class="menu-title small text-uppercase">
                <span class="menu-title-text">Rekap Laporan</span>
            </li>
        @elseif (auth()->user()->hasRole('teacher'))
            <li class="menu-item">
                <a href="" class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <span class="material-symbols-outlined menu-icon">dashboard</span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle active">
                    <span class="material-symbols-outlined menu-icon">class</span>
                    <span class="title">Kelola Kelas</span>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="/classes" class="menu-link {{ Request::is('classes') ? 'active' : '' }}">
                            Classes
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/students" class="menu-link {{ Request::is('students') ? 'active' : '' }}">
                            Students
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/" class="menu-link {{ Request::is('') ? 'active' : '' }}">
                            Peminjaman Buku
                        </a>
                    </li>
                </ul>
            </li>
            </ul>
        @elseif (auth()->user()->hasRole('student'))
            <ul class="menu-inner">
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">MAIN</span>
                </li>
                <li class="menu-item">
                    <a href="" class="menu-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <span class="material-symbols-outlined menu-icon">dashboard</span>
                        <span class="title">Dashboard</span>
                    </a>
        @endif
    </aside>
</div>
