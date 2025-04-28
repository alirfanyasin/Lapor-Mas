<!-- Page Title Start -->
<div class="flex items-center md:justify-between flex-wrap gap-2 mb-5">
  <h4 class="text-default-900 text-lg font-semibold">{{ $title ?? 'Lapor Mas' }}</h4>

  <div class="md:flex hidden items-center gap-3 text-sm font-semibold">
    <a href="#" class="text-sm font-medium text-default-700">{{ env('APP_NAME') }}</a>

    <i class="i-tabler-chevron-right text-lg flex-shrink-0 text-default-500 rtl:rotate-180"></i>

    <a href="#" class="text-sm font-medium text-default-700">{{ $title ?? 'title' }}</a>

    {{-- <i class="i-tabler-chevron-right text-lg flex-shrink-0 text-default-500 rtl:rotate-180"></i>

    <a href="#" class="text-sm font-medium text-default-700" aria-current="page">@@title</a> --}}
  </div>
</div>
<!-- Page Title End -->
