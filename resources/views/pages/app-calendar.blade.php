@extends('layouts.template')
@section('content')
  <div class="card">
    <div class="card-body">
      <div id="calendar"></div>
    </div>
  </div>
@endsection

@push('js')
  <!-- plugin js -->
  <script src="{{ asset('assets/libs/fullcalendar/index.global.min.js') }}"></script>

  <!-- calendar init -->
  <script src="{{ asset('assets/js/pages/app-calendar.js') }}"></script>
@endpush
