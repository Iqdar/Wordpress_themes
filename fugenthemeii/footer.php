<?php
/*
 * Will be used to call footer
 */
?>

   <!-- scroll down bar header ended  -->
   <div class="footer">
   <div class="container"> 
    <div class="row" style="padding-top: 50px;">
        <div class="col-lg-10"><h5>Copyright © <?php echo date("Y"); ?>. All Rights Reserved.</h5>
        <h5>Privacy Policy | Full Disclaimer</h5></div>
        <div class="col-lg-2 img" id="img">
        <img src="<?php echo wp_get_attachment_url(get_theme_mod('lwp-footer-callout-image'))?>" class="img-fluid" alt="cover" width="100%" height="100%"/>
        </div>
        </div>
</div>
<section class="call-to-action" style="padding-top: 50px;">
    <div class="container text-center">
       <div class="row text-center">
           <div class="col-lg-12">
               <p><?php echo wpautop(get_theme_mod('lwp-footer-callout-text')) ?>
               </p>
           </div>  
   </div>
</div>
</section>
</div>
<?php wp_footer() ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>