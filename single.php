<?php
	// template for popular
	get_header();
	get_template_part('navigation'); ?>

	<div class="single">
		<div class="container">
			<?php
				if ( have_posts() ) : // если имеются записи в блоге.
				while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога

				$post_id = get_the_ID();
			?>
			<div class="single-product col-xs-12">
				<div class="row">
					<div class="col-md-6">
						<?php 
							$my_image = get_field('my_pop_photo', $post_id); 
							if( !empty($my_image) ): 
						?>
						<div class="single-img" style="background-image: url(<?php echo $my_image['url']; ?>)">
						</div>
						<?php 
							endif;
						?>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="single-head">
								<?php the_field('my_pop_name', $post_id); ?>
							</div>
							<div class="single-descript">
								<?php the_field('my_pop_consist', $post_id); ?>
							</div>
							<div class="single-price">
								Стоимость: <?php the_field('my_pop_price', $post_id); ?> руб./кг.
							</div>

							<form action="" class="footer-form form-form" method="post">
								<input type="hidden" name="subject" value="Заказать товар - <?php the_field('my_pop_name', $post_id); ?>">
								<div class="col-xs-12">
									<input class="col-xs-12" type="text" placeholder="Ваше имя" name="name-sender">
								</div>
								<div class="col-xs-12">
									<input class="col-xs-12" type="text" placeholder="Ваш номер телефона" name="phone-num">
								</div>
								<div class="col-xs-12">
									<button class="button btn-form" type="submit" name="send-button">Заказать</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<?php 
				endwhile; 
				endif;
			?>
		</div>
	</div>

<?php
get_footer();