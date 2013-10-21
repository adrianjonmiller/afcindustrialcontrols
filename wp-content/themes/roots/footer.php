  </div><!-- /#wrap -->
  
    <?php roots_footer_before(); ?>
    <footer id="content-info" role="contentinfo" class="clearfix">
	    <section>
	      <?php roots_footer_inside(); ?>
	      <?php dynamic_sidebar('roots-footer'); ?>
	      <section id="certs">
	      	<a href="http://etlwhidirectory.etlsemko.com/WebClients/ITS/DLP/products.nsf/4c8700f3b75987a08525777700583333/55468c679cc47b058525749b005c29bb?OpenDocument"><img src="<?php bloginfo('template_url'); ?>/img/etl.png" title="All our panels are ETL&reg; certified - ETL#53993" alt="ETL Logo" /></a>
	      	UL 508a
	      </section>
	      <p><?php echo AFC_ADDRESS . ', ' . AFC_CSZ; ?> | <?php echo AFC_PHONE; ?> | <a href="http://g.co/maps/g6s8t" title="Google Map of AFC's facility">Map and Directions</a></p>
	      <p>Copyright &copy; <?php echo date('Y'); ?> <?php echo AFC_NAME; ?></p>
	    </section>
    </footer>
    <?php roots_footer_after(); ?>

  <?php wp_footer(); ?>
  <?php roots_footer(); ?>
  
  <?php if (is_single_product()): ?>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/colorbox/colorbox.css" />
	<script>
		Modernizr.load({
			test:	Modernizr.mq('only all and (min-width: 600px)'),
			yep:	["<?php bloginfo('template_url'); ?>/css/colorbox/colorbox.css","<?php bloginfo('template_url'); ?>/js/libs/jquery.colorbox-min.js","<?php bloginfo('template_url'); ?>/js/product.js"]
		});
	</script>
  <?php endif; ?>
  
  <?php if (is_front_page()): ?>
	<script>
	$(window).load(function() { // Wait until the entire page is finished loading before running. Fixes an image layout bug.
		Modernizr.load({
			test:	Modernizr.mq('only all and (min-width: 992px)'),
			yep:	["<?php bloginfo('template_url'); ?>/js/libs/jquery.cycle.lite.js","<?php bloginfo('template_url'); ?>/js/cycle.js"]
		});
	});
	</script>
  <?php endif; ?>
</body>
</html>