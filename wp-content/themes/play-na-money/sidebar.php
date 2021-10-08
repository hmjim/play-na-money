<div class="content__sidebar">

	<?php
	if ( is_home() ) :

		get_template_part( 'template-parts/widgets/top-casino' );

	elseif ( is_page_template( 'template-casino.php' ) ) :

		get_template_part( 'template-parts/widgets/top-slots' );
		get_template_part( 'template-parts/widgets/slot-day' );

	elseif ( is_tax( 'developer' ) ) :

		get_template_part( 'template-parts/widgets/developers' );

	else :

		get_template_part( 'template-parts/widgets/related-slots' );
		get_template_part( 'template-parts/widgets/slot-day' );
		//get_template_part( 'template-parts/widgets/news' );

	endif;
	?>

</div>
