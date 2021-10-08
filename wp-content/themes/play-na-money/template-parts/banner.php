<?php $banner = get_field( 'banner', 'options' ); ?>
<?php if ( $banner ) : ?>
	<div class="banner__wrapper">
		<div class="banner container">
			<p class="banner__title"><?php the_field( 'banner_title', 'options' ); ?></p>
			<p class="banner__descr"><?php the_field( 'banner_descr', 'options' ); ?></p>
			<div class="banner__inner">
				<?php foreach ( $banner as $item ) : ?>
					<?php
					$item_img_id           = $item['banner_img'];
					$item_img              = get_post( $item_img_id );
					$item_link             = $item['banner_link'];
					$item_label            = $item['banner_label'];
					$item_label_color      = $item['banner_label_color'];
					$item_label_color_text = $item['banner_label_color_text'];
					?>
					<div class="banner__item">
						<a href="<?= $item_link; ?>" class="banner__item-inner" target="_blank">
							<?php if ( $item_label ) : ?>
								<p class="banner__item-label" style="background-color: <?= $item_label_color; ?>; color: <?= $item_label_color_text; ?>;"><?= $item_label; ?></p>
							<?php endif; ?>
							<img src="<?= kama_thumb_src( 'w=170 &h=170', $item_img_id ); ?>" class="banner__item-thumb"
							     title="<?= $item_img->post_title; ?>"
							     alt="<?= get_post_meta( $item_img->ID, '_wp_attachment_image_alt', true ); ?>">
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
