<?php defined('ABSPATH') or die("No script kiddies please!"); ?>

<footer id="copyright" class="page-block-small wow fgadeInDown" data-wow-offset="70" data-wow-delay="700ms">
  <div class="container text-center"> 
    <div class="row">
    
      <?php echo apply_filters('the_content',AfterSetupTheme::bautySpa_return_thme_option('copyright'));?>
      
    </div>
  </div>
</footer>

<a href="#tops" class="top"><i class="fa fa-arrow-up fa-lg"></i></a>

<?php wp_footer();?>
</body>
</html>