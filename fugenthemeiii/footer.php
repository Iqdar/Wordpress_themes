<?php
/*
 * Will be used to call footer
 */
?>

<section class="call-to-collapse" style="background-color: white;">
    <div class="container">
        <div id="accordion">
          <footer class="footer my-5">
            <div class="jumbotron-footer">
              <div class="container-footer">
                <img class="img-fluid" src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-footer-callout-image'))?>" alt="footer-logo">
                <p><?php echo wpautop(get_theme_mod('lwp-footer-callout-text')) ?></p>
                <a class="a-text" href="#">Disclaimer</a>
                <p><?php echo wpautop(get_theme_mod('lwp-footer-callout-text2')) ?></p>
              </div>
            </div>
          </footer>
        </div>
    </div>
</section>
<?php wp_footer() ?>
</body>
</html>