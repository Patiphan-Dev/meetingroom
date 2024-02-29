@php
    $current_route = request()
        ->route()
        ->getName();
@endphp
<style>
    .drg{
        align-items-center
    }
</style>
<div class="d-flex d-none d-md-block flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
    <div class="text-center align-items-center">
    <a class="navbar-brand" href="{{ URL('/') }}">
        <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width:10vw">
    </a><br>
    <a href="/" class="align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">ระบบจองสนามกีฬา</span>
    </a></div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
                class="nav-link text-white {{ $current_route == 'dashboard' ? 'active' : '' }}" aria-current="page">
                <i class="fa-solid fa-gauge"></i>
                แดชบอร์ด
            </a>
        </li>
        <li>
            <a href="{{ route('room') }}"
                class="nav-link text-white {{ $current_route == 'room' ? 'active' : '' }}">
                <i class="fa-solid fa-medal"></i>
                สนามกีฬา
            </a>
        </li>
        <li>
            <a href="{{ route('reserve') }}"
                class="nav-link text-white {{ $current_route == 'reserve' ? 'active' : '' }}">
                <i class="fa-solid fa-bookmark"></i>
                รายงานการจอง
            </a>
        </li>
        <li>
            <a href="{{ route('rule') }}" class="nav-link text-white {{ $current_route == 'rule' ? 'active' : '' }}">
                <i class="fa-solid fa-scale-balanced"></i>
                กฎกติกา
            </a>
        </li>
    </ul>
    <hr>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>{{ Auth::user()->username }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">ออกจากระบบ <i
                                class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>