@php
    $navLinks = [
        ['route' => 'dashboard.index', 'name' => 'Beranda', 'active' => 'dashboard.*'],
        ['route' => 'bills.index', 'name' => 'Hutang', 'active' => 'bills.*'],
        ['route' => 'savings.index', 'name' => 'Tabungan', 'active' => 'savings.*'],
    ];
@endphp

<div class="navbar bg-base-100 mb-8 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                @foreach ($navLinks as $link)
                    <li>
                        <a href="{{ route($link['route']) }}" @class(['active' => request()->routeIs($link['active'])])>
                            {{ $link['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('dashboard.index') }}" class="btn btn-ghost gap-0 text-xl md:text-2xl">
            Tabung<span class="text-primary">In</span>
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            @foreach ($navLinks as $link)
                <li>
                    <a href="{{ route($link['route']) }}" @class(['active' => request()->routeIs($link['active'])])>
                        {{ $link['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="navbar-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost flex items-center gap-2">
                <span>{{ Auth::user()->username ?? Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-40 p-2 shadow">
                <li>
                    <a href="{{ route('accounts.index') }}" class="w-full text-left text-sm">
                        Pengaturan
                    </a>
                </li>
                <li>
                    <a href="{{ route('accounts.index') }}" class="w-full text-left text-sm">
                        Akun
                    </a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="block">
                        @csrf
                        <button type="submit" class="text-error w-full cursor-pointer text-left text-sm">
                            Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
