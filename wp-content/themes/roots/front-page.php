<?php 
	if ($_GET['ajax'] === 'true') return the_secondary_content(-1, 2);
?>
<?php get_header(); ?>
  <?php roots_content_before(); ?>
    <div id="content" class="<?php echo CONTAINER_CLASSES; ?>">
    <?php roots_sidebar_before(); ?>
      <aside id="sidebar" class="<?php echo SIDEBAR_CLASSES; ?>" role="complementary">
      <?php roots_sidebar_inside_before(); ?>
        <?php get_sidebar(); ?>
      <?php roots_sidebar_inside_after(); ?>
      </aside><!-- /#sidebar -->
    <?php roots_sidebar_after(); ?>
    <?php roots_main_before(); ?>
      <div id="main" class="<?php echo MAIN_CLASSES; ?>" role="main">
        <?php roots_loop_before(); ?>
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
		  <?php roots_post_before(); ?>
		    <?php roots_post_inside_before(); ?>
		      <section class="text-box" id="primary-content">
			      <h2><?php the_title(); ?></h2>
			      <?php the_content(); ?>
			      <?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
		      </section>
        <div style="float: left; width: 45%; padding-left: 1em; padding-top: 1em;">
          <?php
          $args = array( 'post_type' => 'products', 'order' => 'ASC', 'posts_per_page' => '1');
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php if (has_post_thumbnail()) { ?>
              <div class="thumbnail">
                <a href="<?php echo get_permalink(); ?>" data-behavior="pageloader" style="float: left">
                 <?php echo get_the_post_thumbnail($post_id, 'medium'); ?> 
                </a>
                <?php the_content(); ?>
              </div>
            <?php } ?>
          <?php endwhile; ?>
        </div>
		    <?php roots_post_inside_after(); ?>
		  <?php roots_post_after(); ?>
		<?php endwhile; /* End loop */ ?>
        <?php roots_loop_after(); ?>
      </div><!-- /#main -->
    <?php roots_main_after(); ?>
    </div><!-- /#content -->
  <?php roots_content_after(); ?>
<?php get_footer(); ?>