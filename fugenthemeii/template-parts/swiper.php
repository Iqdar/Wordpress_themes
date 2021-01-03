<div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-1.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-2.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-3.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-4.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-5.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-6.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-7.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-8.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="imgBx">
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/nature-9.jpg"/>
        </div>
        <div class="details">
          <h3>Details</h3>
        </div>
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
  </div>
  <script>
    var swiper = new Swiper('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 'auto',
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
    },
    pagination: {
        el: '.swiper-pagination',
    },
});</script>