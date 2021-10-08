<?php
/*
Template Name: Все казино
*/
?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/page-header' ); ?>

<div class="content__wrapper">
	<div class="content container">
		<div class="content__inner">

			<div class="content__main">
				<div class="row casino__items">
					<?php
					$casino_top = get_field( 'casino_rating', 'options' );
					if ( $casino_top ) :
						foreach ( $casino_top as $casino ) :
							$post = get_post( $casino['casino'] );
							setup_postdata( $post );
							get_template_part( 'template-parts/loop-casino' );
						endforeach;
						wp_reset_postdata();
					else :
						get_template_part( 'template-parts/loop-none' );
					endif;
					?>
				</div>
			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_template_part( 'template-parts/anchor-menu' ); ?>

<?php get_footer(); ?>
