@extends('layouts.app')

@section('content')
<div class="lottie-background" id="lottie-background"></div>
@endsection

@push('styles')
<style>
.lottie-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}
</style>
@endpush

@push('scripts')
<script>
// Load the Lottie animation
var animation = lottie.loadAnimation({
  container: document.getElementById('lottie-background'),
  renderer: 'svg',
  loop: true,
  autoplay: true,
  path: '{{ asset('animation_raining') }}'
});
</script>
@endpush
