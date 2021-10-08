<?php
$news_posts = get_posts( [
	'numberposts' => 6,
	'post_type'   => 'news'
] );
if ( $news_posts ) : ?>
	<div class="widget-news">
		<div class="widget-title">Новости</div>

		<div class="widget-content">
			<?php foreach ( $news_posts as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<div class="widget-news-item">
					<div class="widget-news-date"><?php echo get_the_date( 'd F Y' ); ?></div>
					<div class="widget-news-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata() ?>
			<div class="widget-news-item widget-news-item-last"><a href="/news/" class="btn btn-more">Все новости</a></div>
		</div>
	</div>
<?php endif; ?>
