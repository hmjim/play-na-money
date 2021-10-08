<?php get_header(); ?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">

			<div class="content__main">
				<div class="row">
					<?php
					$cpts = [ 'post', 'casino' ];
					if ( have_posts() ) :
						foreach ( $cpts as $cpt ) :
							while ( have_posts() ) : the_post();
								if ( $cpt == get_post_type() ) : ?>
									<?php get_template_part( 'template-parts/loop', $cpt ); ?>
								<?php endif;
							endwhile;
							rewind_posts();
						endforeach;
					else : ?>
						<div class="item">
							<?php get_template_part( 'template-parts/loop', 'none' ); ?>
						</div>
					<?php
					endif;
					?>
				</div>
			</div>

			<?php get_sidebar(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>


