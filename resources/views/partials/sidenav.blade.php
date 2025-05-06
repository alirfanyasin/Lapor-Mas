<!-- Start Sidebar -->
<aside id="app-menu"
  class="hs-overlay fixed inset-y-0 start-0 z-60 hidden w-sidenav min-w-sidenav overflow-y-auto -translate-x-full transform transition-all duration-200 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--body-scroll:true] [--overlay-backdrop:true] lg:[--overlay-backdrop:false]"
  style="background: #003b32;">

  <div class="flex flex-col h-full">
    <!-- Sidenav Logo -->
    {{-- <div class="sticky top-0 flex items-center justify-center px-6 h-topbar">
      <a href="index.html">
        <img src="{{ asset('assets/images/logo-light.png') }}" alt="logo" class="flex h-5">
      </a>
    </div> --}}

    <div class="p-4 h-[calc(100%-theme('spacing.topbar'))] flex-grow" data-simplebar>
      <!-- Menu -->
      <ul class="flex flex-col w-full gap-1 admin-menu hs-accordion-group">
        <li class="px-3 py-2 text-xs font-medium uppercase text-default-500 te">Menu</li>

        <li class="menu-item">
          <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
            href="{{ route('dashboard') }}">
            <i class="i-lucide-airplay size-5"></i>
            Dashboard
          </a>
        </li>


        <li class="px-3 py-2 text-xs font-medium uppercase text-default-500">Apps</li>

        <li class="menu-item hs-accordion">
          <a href="javascript:void(0)"
            class="hs-accordion-toggle group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5 hs-accordion-active:bg-default-100/5 hs-accordion-active:text-default-100">
            <i class="i-lucide-layout size-5"></i>
            <span class="menu-text"> Laporan </span>
            <span class="menu-arrow"></span>
          </a>

          <div class="hs-accordion-content hidden w-full overflow-hidden transition-[height] duration-300">
            <ul class="mt-1 space-y-1">
              <li class="menu-item">
                <a class="flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                  href="{{ route('report.index') }}">
                  <i class="menu-dot"></i>
                  Laporan Masuk
                </a>
              </li>
              <li class="menu-item">
                <a class="flex items-center gap-x-3.5 rounded-md px-3 py-1.5 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
                  href="ui-alerts.html">
                  <i class="menu-dot"></i>
                  Arsip Laporan
                </a>
              </li>
            </ul>
          </div>
        </li>


        {{-- <li class="menu-item">
          <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
            href="{{ route('app-calendar') }}">
            <i class="i-lucide-calendar size-5"></i>
            Calendar
          </a>
        </li>

        <li class="menu-item">
          <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
            href="{{ route('app-gallery') }}">
            <i class="i-lucide-image size-5"></i>
            Images Gallery
          </a>
        </li>

        <li class="menu-item">
          <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
            href="{{ route('app-plans') }}">
            <i class="i-lucide-circle-dollar-sign size-5"></i>
            Pricing Plans
          </a>
        </li>

        <li class="menu-item">
          <a class="group flex items-center gap-x-3.5 rounded-md px-3 py-2 text-sm font-medium text-default-400 transition-all hover:bg-default-100/5"
            href="{{ route('app-contact') }}">
            <i class="i-lucide-user-circle size-5"></i>
            Contacts
          </a>
        </li> --}}

    </div>
</aside>
<!-- End Sidebar -->
