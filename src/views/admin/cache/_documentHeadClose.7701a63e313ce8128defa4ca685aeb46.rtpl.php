<?php if(!class_exists('Rain\Tpl')){exit;}?>
    <!-- Optional JavaScript Scroll-->
    <script>
        var currentScrollPosition = 0;
        var scrollAmount = 320;

        const sCont = document.querySelector(".storys-container");
        const hScroll = document.querySelector(".horizontal-scroll");

        const btnScrollLeft = document.querySelector("#btn-scroll-left");
        const btnScrollRight = document.querySelector("#btn-scroll-right");

        btnScrollLeft.style.opacity = "0";

        var maxScroll = -sCont.offsetWidth + hScroll.offsetWidth;

        function scrollHorizontally(val){
        // body...
        currentScrollPosition += (val * scrollAmount);

        if (currentScrollPosition > 0){
            currentScrollPosition = 0;
            btnScrollLeft.style.opacity = "0";
        }else{
            btnScrollLeft.style.opacity = "1";
        }
        if (currentScrollPosition < maxScroll){
            currentScrollPosition = maxScroll;
            btnScrollRight.style.opacity = "0";
        }else{
            btnScrollRight.style.opacity = "1";
        }

        sCont.style.left = currentScrollPosition + "px";
        }
    </script>
    
    
    <script src="/bioloOnline/src/assets/js/cart.js"></script>
    <script src="/bioloOnline/src/assets/js/upload.js"></script>
    <script src="/bioloOnline/src/assets/js/validate.js"></script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/bioloOnline/src/assets/lib/bootstrap-4.3.1-dist/js/jquery.min.js" ></script>
    <script src="/bioloOnline/src/assets/lib/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
  </body>
</html>