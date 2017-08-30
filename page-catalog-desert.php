	<?php /*Template Name: catalog-desert-page*/ ?>

	<?php get_header(); ?>

	<?php get_template_part('navigation'); ?>

	<div class="catalog-nav">
		<div class="container">
			<div class="col-md-3">
				<!-- offset -->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-12">
				<a href="<?php site_url(); ?>/каталог-тортов/">
				<div class="catalog-nav-img">
					<img src="<?php bloginfo('template_directory'); ?>/img/tort-icon-red-unactive.png" alt="">
				</div>
				<div class="catalog-nav-name">Торты</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-12">
				<a href="<?php site_url(); ?>/каталог-пирожных/">
				<div class="catalog-nav-img">
					<img src="<?php bloginfo('template_directory'); ?>/img/desert-icon-red.png" alt="">
				</div>
				<div class="catalog-nav-name">Пирожные</div>
				</a>
			</div>
			<div class="col-md-2 col-sm-4 col-xs-12">
				<a href="<?php site_url(); ?>/каталог-выпечки/">
				<div class="catalog-nav-img">
					<img src="<?php bloginfo('template_directory'); ?>/img/pie-icon-red-unactive.png" alt="">
				</div>
				<div class="catalog-nav-name">Выпечка</div>
				</a>
			</div>
		</div>
	</div>

	<?php get_template_part('sidebar-popular'); ?>

	<div class="catalog">
		<div class="container">
			<div class="head-text">Пирожные</div>

			<?php
				$wp_query = new WP_Query( array( 'cat' => '20' ) );
				while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$post_id = get_the_ID();
			?>
			<div class="product col-md-3 col-sm-6">
				<div class="product-wrapper">
					<?php 
						$my_image = get_field('my_desert_photo', $post_id); 
						if( !empty($my_image) ): 
					?>
					<div class="product-img" style="background-image: url(<?php echo $my_image['url']; ?>)">
					</div>
					<?php 
						endif;
					?>
					<div class="product-text-wrapper">
						<div class="product-descript">
							<b><?php the_field('my_desert_name', $post_id); ?></b>
							<p>Стоимость: <?php the_field('my_desert_price', $post_id); ?> руб./шт.</p>
						</div>
						<a href="<?php the_permalink(); ?>" target="_blank"><div class="button">Посмотреть состав</div></a>
					</div>
				</div>
			</div>

			<?php 
				};
			?>

			<?php if (  $wp_query->max_num_pages > 1 ) : ?>
				<script>
					var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
					var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
					var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
					var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
				</script>
				<div id="true_loadmore">Загрузить ещё</div>
			<?php endif; ?>

		</div>
	</div>

	<?php get_footer(); ?>