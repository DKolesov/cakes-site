<div class="popular">
	<div class="container">
		<div class="col-md-12 head-text">
			Самые популярные
		</div>
	</div>

	<div class="products">
		<div class="container">

			<?php
				if ( have_posts() ) : // если имеются записи в блоге.
				query_posts('cat=8');   // указываем ID рубрик, которые необходимо вывести.
				while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога

				$post_id = get_the_ID();
			?>
			<div class="product col-md-3 col-sm-6">
				<div class="product-wrapper">
					<?php 
						$my_image = get_field('my_pop_photo', $post_id); 
						if( !empty($my_image) ): 
					?>
					<div class="product-img" style="background-image: url(<?php echo $my_image['url']; ?>)">
					</div>
					<?php 
						endif;
					?>
					<div class="product-text-wrapper">
						<div class="product-descript">
							<b><?php the_field('my_pop_name', $post_id); ?></b>
							<p>Стоимость: <?php the_field('my_pop_price', $post_id); ?> руб./кг.</p>
						</div>
						<a href="<?php the_permalink(); ?>" target="_blank"><div class="button">Посмотреть состав</div></a>
					</div>
				</div>
			</div>

			<?php 
				endwhile; 
				endif;
				wp_reset_query(); 
			?>

			

		</div>
	</div>
</div>