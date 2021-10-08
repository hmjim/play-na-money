<div class="item item-news-wrap">
	<div class="item-news">
		<a href="<?php the_permalink(); ?>" class="item-news-img">
			<img src="<?= kama_thumb_src( "w=510 &h=418" ) ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
		</a>
		<div class="item-news-text">
			<a class="item-news-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<div class="item-news-descr"><?php the_excerpt(); ?></div>
		</div>
	</div>
</div>
