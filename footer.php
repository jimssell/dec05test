
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="masterslider/masterslider.min.js"></script> 
    <script type="text/javascript">
        (function ($) {
            "use strict";
            var slider = new MasterSlider();

            // adds Arrows navigation control to the slider.
            slider.control('arrows');
            slider.control('timebar', {insertTo: '#masterslider'});
            slider.control('bullets');

            slider.setup('masterslider', {
                width: 1400, // slider standard width
                height: 600, // slider standard height
                space: 0,
                layout: 'fullwidth',
                loop: true,
                preload: 0,
                instantStartLayers: true,
                autoplay: true
            });
        })(jQuery);
    </script>    
</body>
</html>