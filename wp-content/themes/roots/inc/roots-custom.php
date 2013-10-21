<?php


// Remove unnecessary menu items. Commented items will show.
function remove_admin_links () {
global $menu;
	$restricted = array(
						__('Dashboard'),
						//__('Posts'),
						__('Media'),
						__('Links'),
						//__('Pages'),
						//__('Appearance'),
						__('Tools'),
						//__('Users'),
						//__('Settings'),
						__('Comments'),
						//__('Plugins')
						);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ',$menu[key($menu)][0]);
		if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
	}
}
add_action('admin_menu', 'remove_admin_links');



// Rename Posts

function posts_menu_renamed() {
global $menu;
	unset($menu[5]);
	$menu[5] = array( __('News'), 'edit_posts', 'edit.php', '', 'open-if-no-js menu-top menu-icon-post', 'menu-posts', 'div' );
}
add_action('_admin_menu','posts_menu_renamed');


// Generate Featured item image and description

function the_featured_panel()
{ ?>
<?php
	query_posts(array(
		'post_type'		=>	'products',
		'posts_per_page'=>	1,
		'post_status'	=>	'publish',
	));
	
	while (have_posts()) : the_post(); ?>

	<h3><a href="<?php the_permalink(); ?>" title="More info about <?php the_title(); ?>"><?php the_title(); ?></a></h3>
	<a href="<?php the_permalink(); ?>"><?php the_responsive_featured_image('medium'); ?></a>
	<?php the_excerpt(); ?>
	
	<?php endwhile; wp_reset_query(); ?>
<?php } // End function 


// Generate secondary homepage panel

function the_secondary_content($num_posts = -1, $offset = 1)
{
$args = array(
	'posts_per_page'		=> $num_posts,
	'post_status'			=> 'publish',
	'post_type'				=> 'products',
	'offset'				=> $offset // Sidebar gets the first product, this gets the second.
);
query_posts($args);
while (have_posts()): the_post(); ?>
<?php echo ($num_posts < 0) ? '' : '<div id="sec-cont">'; ?>
	<section class="sec">
	<section id="featured-image" style="max-height: 350px;">	
		<a href="<?php the_permalink(); ?>" title="More info about <?php the_title(); ?>"><?php the_featured_image('full'); ?></a>
	</section>
<section class="text-box" id="secondary-content">
	<h2><a href="<?php the_permalink(); ?>" title="More info about <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<?php the_excerpt(); ?>
</section>
</section>
<?php echo ($num_posts < 0) ? '' : '</div>'; ?>
<?php endwhile; wp_reset_query(); ?>
<?php } // End function


// Get all secondary photos for slideshow

function the_secondary_photos()
{
	global $post;
	$args = array(
		'posts_per_page'		=> 1,
		'post_status'			=> 'publish',
		'post_type'				=> 'products',
		'offset'				=> 1 // Sidebar gets the first product, this gets the second.
	);
	query_posts($args);
	while (have_posts()): the_post();
        // Get all attachments
        $att = array(
          'post_type'   => 'attachment',
          'numberposts' => -1,
          'post_status' => null,
          'post_parent' => $post->ID,
          'offset'		=> 1 // Don't load the picture that's already loaded
        );
        $attachments = get_posts($att);

      	foreach ($attachments as $attachment) :?>
      		<a href="<?php the_permalink(); ?>" title="More info about <?php the_title(); ?>">
      			<figure class="featured-image">
      				<img src="<?php echo wp_get_attachment_url($attachment->ID); ?>" alt="<?php echo $attachment->post_name; ?>" />
      			</figure>
      		</a>
		<?php endforeach; ?>
	<?php endwhile; wp_reset_query(); ?>
	<?php
}


// Get post thumbnail responsively

function the_responsive_featured_image($size = 'medium', $class = '')
{
	global $post;
	$image = get_the_post_thumbnail($post->ID, $size, array(
		'class'			=> 'featured-image',
		'title'			=> 'More info about ' . get_the_title($post->ID),
		'alt'			=> 'Photo of ' . get_the_title($post->ID)
	));
	echo '<figure>' . responsify($image) . '</figure>';
	return true;
}

// Output placeholder product image

function the_product_image_placeholder()
{
	echo '<figure><img src="' . home_url() . '/assets/photo-coming-soon.jpg" class="featured-image" alt="Photo Coming Soon" /></figure>';
	return true;
}

// Strip height and width attributes from img tag

function responsify($img)
{
	return preg_replace('/(width="[0-9]*"|height="[0-9]*")/i', '', $img);
}


// Insert featured image if present

function the_featured_image($size = 'full')
{
	if (has_post_thumbnail())
	{
		echo '<figure class="featured-image">';
		$img = get_the_post_thumbnail($post->ID, $size);
		echo responsify($img);
		echo '</figure>';
		return true;
	}
	else
	{
		the_product_image_placeholder();
		return true;
	}
}


// Products footer

function the_product_footer()
{ ?>
	<footer class="product-footer">
		<p><span class="phone"><?php echo AFC_PHONE; ?></span></p>
		<p>Speak with an AFC representative today. Get a free quote on your own custom industrial control solution.</p>
		<a href="<?php echo home_url(); ?>/products/" title="All products">&laquo; All products</a>
	</footer>
<?php }


// Conditional for product

function is_product()
{
	return (get_post_type() == 'products') ? true : false;
}


// Conditional for single product

function is_single_product()
{
	return (get_post_type() == 'products' AND is_single()) ? true : false;
}

// Is page ID

function is_page_id($id)
{
	global $post;
	return ($post->ID == $id) ? true : false;
}

// Links to all products for sidebar

function the_products_sidebar()
{
	$args = array(
		'posts_per_page'	=> 15,
		'post_status'		=> 'publish',
		'post_type'			=> 'products',
	);
	
	$products = query_posts($args);
	echo '<h3><a href="' . home_url() . '/products/" title="View all products">Products</a></h3>';
	echo '<ul id="sidebar-products" class="clearfix">';
	while (have_posts()): the_post(); ?>
		<li><a href="<?php echo the_permalink(); ?>" title="More info about <?php the_title(); ?>"><?php the_title(); ?><?php the_responsive_featured_image('thumbnail'); ?></a></li>
	<?php
		endwhile;
		wp_reset_query();
		echo '</ul>';
	?>
	<?php
}