<?php

$show_related_posts = stal_core_get_post_value_through_levels( 'qodef_portfolio_enable_related' );

if($show_related_posts === 'yes') {
	$post_id = get_the_ID();
	$related_posts = stal_core_get_portfolio_single_related_posts($post_id); ?>
	<div class="qodef-ps-related-posts-holder">
		<div class="qodef-ps-related-posts">
			<h3 class="qodef-ps-related-title"><?php echo esc_html__('Related projects','stal-core'); ?></h3>
			<div class="qodef-ps-related-posts-holder-inner">
				<div class="qodef-ps-related-inner">
					<?php
					if ( $related_posts && $related_posts->have_posts() ) :
						while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
							<div class="qodef-ps-related-post">
								<?php if(has_post_thumbnail()) { ?>
									<div class="qodef-ps-related-image">
										<a itemprop="url" href="<?php the_permalink(); ?>" target="_self">
											<?php the_post_thumbnail('full'); ?>
										</a>
									</div>
								<?php } ?>
								<div class="qodef-ps-related-text">
									<?php $categories = wp_get_post_terms(get_the_ID(), 'portfolio-category'); ?>
									<?php if(!empty($categories)) { ?>
										<h6 class="qodef-ps-related-categories">
											<?php foreach ($categories as $cat) { ?>
												<a itemprop="url" class="qodef-ps-related-category" href="<?php echo esc_url(get_term_link($cat->term_id)); ?>"><?php echo esc_html($cat->name); ?></a>
											<?php } ?>
										</h6>
									<?php } ?>
									<h4 itemprop="name" class="qodef-ps-related-title entry-title">
										<a itemprop="url" href="<?php the_permalink(); ?>" target="_self"><?php the_title(); ?></a>
									</h4>
								</div>
							</div>
						<?php
						endwhile;
					endif;
					
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
