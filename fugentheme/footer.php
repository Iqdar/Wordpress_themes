<?php
/*
 * Will be used to call footer
 */
?>
</div>
        <footer id="footer">
            <div class="row">
                <div class="col-md-6 col-lg-5 col-xl-4 order-1">
                    <?php dynamic_sidebar( 'primary1' ); ?>
                </div>
                <div class="col-md-0 col-lg-2 col-xl-4 order-12 order-lg-6"></div>
                <div class="col-md-6 col-lg-5 col-xl-4 order-6 order-lg-12">
                    <?php dynamic_sidebar( 'primary2' ); ?>
                </div>
            </div>
        </footer>
    </body>
    <?php wp_footer() ?>
    <script src="https://kit.fontawesome.com/f880bffb31.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</html>