<section class="py-6 mt-n5">
	<div class="container max-w-800 mx-auto">
		<?php if (has_post_thumbnail()): ?>
		<div class="thumbnail mb-5">
			<?php the_post_thumbnail('full', ['class' => 'img-fluid radius-10', 'alt' => get_the_title()]); ?>
		</div>
		<?php endif; ?>

		<?php the_content(); ?>
	</div>
</section>