<div id="lottie-container"></div>

<script src="{{ asset('path-to-your-js-file/lottie.js') }}"></script>
<script>
    // Load and display the Lottie animation
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('lottie-container'),
        renderer: 'svg', // or 'canvas', choose the renderer you prefer
        loop: true,
        autoplay: true,
        path: '{{ asset('path-to-your-animation.json') }}' // Path to your Lottie animation JSON file
    });
</script>
