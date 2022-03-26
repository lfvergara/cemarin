<div class="qodef-e qodef-portfolio-date">
	<h6>
		<?php esc_html_e( 'Date: ', 'stal-core' ); ?>
	</h6>
	<p itemprop="dateCreated" class="entry-date updated">
		<?php the_time(get_option('date_format')); ?>
	</p>
	<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number( get_the_ID() ); ?>"/>
</div>