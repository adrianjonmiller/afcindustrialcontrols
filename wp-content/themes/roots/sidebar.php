<?php dynamic_sidebar('roots-sidebar'); ?>


<?php if (is_front_page()): ?>
<?php the_featured_panel(); ?>
<?php endif; ?>


<?php if (is_product()): ?>
<?php the_products_sidebar(); ?>
<?php endif; ?>


<?php // Contact page ?>
<?php if (is_page_id(11)): ?>
<h4>Mailing Address</h4>
<p><?php echo AFC_ADDRESS; ?><br />
<?php echo AFC_CSZ; ?></p>

<h4>Sales &amp; Customer Support</h4>
<p><?php echo AFC_PHONE; ?></p>
<?php endif; ?>

<?php // About ?>
<?php if (is_page_id(13)): ?>
<figure>
	<img src="/assets/facility.jpg" alt="AFC's manufacturing facility in Oroville, CA" />
</figure>
<?php endif; ?>