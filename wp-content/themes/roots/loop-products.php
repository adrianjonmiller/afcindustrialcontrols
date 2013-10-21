<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
  <?php roots_post_before(); ?>
    <?php roots_post_inside_before(); ?>
		<article class="afc-product">
			<?php
			if (has_post_thumbnail())
			{ ?>
			
			<a href="<?php the_permalink(); ?>" title="More info about <?php the_title(); ?>"><?php the_responsive_featured_image('medium'); ?></a>
			<?php }
			else
			{
				the_product_image_placeholder();
			}
			?>
		<h4><a href="<?php the_permalink(); ?>" title="Read more about <?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<?php the_excerpt(); ?>
		</article>
    <?php roots_post_inside_after(); ?>
  <?php roots_post_after(); ?>
<?php endwhile; /* End loop */ ?>
