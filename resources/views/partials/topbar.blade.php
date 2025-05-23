<!-- Topbar Start -->
<header class="sticky top-0 z-50 flex items-center bg-white app-header min-h-topbar">
  <div class="flex items-center justify-between w-full gap-4 px-6">
    <div class="flex items-center gap-5">
      <!-- Sidenav Menu Toggle Button -->
      <button
        class="flex items-center p-2 transition-all bg-white border rounded-full cursor-pointer text-default-500 border-default-200 hover:bg-primary/15 hover:text-primary hover:border-primary/5"
        data-hs-overlay="#app-menu" aria-label="Toggle navigation">
        <i class="text-2xl i-lucide-align-left"></i>
      </button>

      <!-- Topbar Brand Logo -->
      <a href="index.html" class="flex md:hidden">
        <img src="{{ asset('assets/images/logo-sm.png') }}" class="h-5" alt="Small logo">
      </a>

      <!-- Topbar Search -->
      {{-- <div class="relative items-center hidden md:flex">
        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
          <i class="text-base i-tabler-search"></i>
        </div>
        <input type="search"
          class="px-10 border-transparent rounded-lg form-input bg-default-500/10 focus:border-transparent w-80"
          placeholder="Search...">
        <button type="button" class="absolute inset-y-0 flex items-center end-0 pe-3">
          <i class="text-base i-tabler-microphone hover:text-black"></i>
        </button>
      </div> --}}
    </div>

    <div class="flex items-center gap-5">
      <!-- Language Dropdown Button -->
      {{-- <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
        <button type="button"
          class="inline-flex items-center p-2 transition-all bg-white border rounded-full hs-dropdown-toggle border-default-200 hover:bg-primary/15 hover:text-primary">
          <i class="text-2xl i-lucide-globe"></i>
        </button>

        <div
          class="hs-dropdown-menu duration mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 hidden">
          <a href="javascript:void(0);"
            class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-default-100">
            <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image" class="h-4">
            <span class="align-middle">German</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);"
            class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-default-100">
            <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image" class="h-4">
            <span class="align-middle">Italian</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);"
            class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-default-100">
            <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image" class="h-4">
            <span class="align-middle">Spanish</span>
          </a>

          <!-- item-->
          <a href="javascript:void(0);"
            class="flex items-center gap-2.5 py-2 px-3 rounded-md text-sm text-default-800 hover:bg-default-100">
            <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" class="h-4">
            <span class="align-middle">Russian</span>
          </a>
        </div>
      </div> --}}

      <!-- Notification Dropdown Button -->
      <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
        <div class="relative">
          <button type="button"
            class="inline-flex items-center p-2 transition-all bg-white border rounded-full hs-dropdown-toggle border-default-200 hover:bg-primary/15 hover:text-primary">
            <i class="text-2xl i-lucide-bell"></i>
          </button>

          @if ($notifCount > 0)
            <div
              class="absolute top-0 right-0 flex items-center justify-center w-5 h-5 text-xs font-semibold text-white translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
              {{ $notifCount }}
            </div>
          @endif

        </div>

        <!-- Dropdown menu -->
        <div
          class="hs-dropdown-menu duration mt-2 w-full max-w-sm rounded-lg border border-default-200 bg-white opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 hidden">
          <div class="block px-4 py-2 font-medium text-center rounded-t-lg text-default-700 bg-default-50">
            Notifications
          </div>

          <div class="divide-y divide-default-100">
            @foreach ($notifications as $notif)
              <a href="{{ route('report.show.notification', $notif->id) }}" class="flex px-4 py-3 hover:bg-default-100">
                <div class="flex-shrink-0">
                  <img class="rounded-full w-11 h-11"
                    src="https://ui-avatars.com/api/?name={{ $notif->name }}&background=random&color=FFF"
                    alt="Alex image">
                </div>
                <div class="w-full ps-3">
                  <div class="text-default-500 text-sm mb-1.5">
                    {!! $notif->message !!}
                  </div>
                  <div class="text-xs text-primary">{{ $notif->created_at->diffForHumans() }}</div>
                </div>
              </a>
            @endforeach
          </div>


          {{-- <a href="#"
            class="block py-2 text-sm font-medium text-center rounded-b-lg text-default-900 bg-default-50 hover:bg-default-100">
            <div class="inline-flex items-center ">
              <i class="i-tabler-eye size-4 text-default-500"></i>
              View all
            </div>
          </a> --}}
        </div>
      </div>

      <!-- Fullscreen Toggle Button -->
      <div class="hidden md:flex">
        <button data-toggle="fullscreen" type="button"
          class="p-2 transition-all bg-white border rounded-full border-default-200 hover:bg-primary/15 hover:text-primary">
          <span class="sr-only">Fullscreen Mode</span>
          <span class="flex items-center justify-center size-6">
            <i class="i-lucide-maximize text-2xl flex group-[-fullscreen]:hidden"></i>
            <i class="i-lucide-minimize text-2xl hidden group-[-fullscreen]:flex"></i>
          </span>
        </button>
      </div>

      <!-- Profile Dropdown Button -->
      <div class="relative">
        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
          <button type="button" class="hs-dropdown-toggle">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=003b32&color=FFF"
              alt="user-image" class="h-10 rounded-full">
          </button>
          <div
            class="hs-dropdown-menu duration mt-2 min-w-48 rounded-lg border border-default-200 bg-white p-2 opacity-0 shadow-md transition-[opacity,margin] hs-dropdown-open:opacity-100 hidden">
            {{-- <a class="flex items-center px-3 py-2 text-sm rounded-md text-default-800 hover:bg-default-100"
              href="#">
              Profile
            </a>
            <a class="flex items-center px-3 py-2 text-sm rounded-md text-default-800 hover:bg-default-100"
              href="#">
              Settings
            </a> --}}
            {{-- <hr class="my-2 -mx-2"> --}}

            <a class="flex items-center px-3 py-2 text-sm rounded-md text-default-800 hover:bg-default-100"
              href="{{ route('admin.logout') }}">
              Log Out
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- Topbar End -->
