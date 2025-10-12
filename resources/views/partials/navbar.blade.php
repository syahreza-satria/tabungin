<div class="navbar bg-base-100 mb-8 shadow-sm">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                <li><a href="{{ route('dashboard.index') }}" class="w-full text-sm">Beranda</a></li>
                <li><a href="#" class="w-full text-sm">Transaksi</a></li>
                <li><a href="{{ route('bills.index') }}" class="w-full text-sm">Hutang</a></li>
                <li><a href="{{ route('savings.index') }}" class="w-full text-sm">Tabungan</a></li>
                <li><a href="{{ route('settings.index') }}" class="w-full text-sm">Akun</a></li>
            </ul>
        </div>
        <a href="{{ route('dashboard.index') }}" class="btn btn-ghost gap-0 text-xl md:text-2xl">Tabung<span
                class="text-indigo-500">In</span></a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="{{ route('dashboard.index') }}"
                    class="text-neutral-500 transition duration-300 hover:text-indigo-500">Beranda</a>
            </li>
            <li><a href="#" class="text-neutral-500 transition duration-300 hover:text-indigo-500">Transaksi</a>
            </li>
            <li><a href="{{ route('bills.index') }}"
                    class="text-neutral-500 transition duration-300 hover:text-indigo-500">Hutang</a></li>
            <li><a href="{{ route('savings.index') }}"
                    class="text-neutral-500 transition duration-300 hover:text-indigo-500">Tabungan</a>
            </li>
            <li><a href="{{ route('settings.index') }}"
                    class="text-neutral-500 transition duration-300 hover:text-indigo-500">Akun</a>
            </li>
        </ul>
    </div>
    <div class="navbar-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            @method('POST')
            <button type="submit"
                class="mr-4 flex cursor-pointer items-center gap-2 text-neutral-500 transition duration-300 hover:text-indigo-500">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
            </button>
        </form>
    </div>
</div>
