<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		
		<?php
		// Start the loop.

		/** MODIFICAÇÃO */

		$query = 'posts_per_page=10&' .
		'order=DESC';

		$query2 = 'post_status=draft';

		$query3 = 'tag_id=2';

		$query4 = 'cat=3,4';

		//query_posts($query4);

		//bloginfo();
		//echo "<br>";
		//the_author();


		/**global $wpdb;

		$sql = "
		
			SELECT *
			FROM $wpdb->posts
			WHERE post_status = 'publish'
		
		";

		$listaDados = $wpdb->get_results($sql);

		echo '<pre>';
		print_r($listaDados);
		exit;

		foreach( $listaDados as $value )
		{
			# code...
			echo '<h3>' . $value->post_title . '</h3>';
			echo '<p>' . $value->post_content . '</p>';
			echo '<br><br>';


		}//end foreach */


		/**$query = 'posts_per_page=3&' .
		'orderby=rand';

		$myPosts = new WP_Query($query);

		while( $myPosts->have_posts() ) :  
		
			# code...
			$myPosts->the_post();
			echo '<h3>' . the_title() . '</h3>';
			echo '<p>' . the_content() . '</p>';
			echo '<br><br>';

		endwhile; */

		
				
		while ( have_posts() ) :
			the_post();

			/** MODIFICAÇÃO */
			//the_author();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation(
					array(
						'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
					)
				);
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation(
					array(
						'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
							'<span class="post-title">%title</span>',
					)
				);
			}

			// End of the loop.
		endwhile;

		echo the_meta();
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
