	<?php /*Template Name: order-page*/ ?>

	<?php get_header(); ?>

	<?php get_template_part('navigation'); ?>

	<div class="order">
		<div class="container">
			<div class="head-text">Торт на заказ</div>
			<div class="order-descript">Вы можете сделать заказ одним из следующих способов:</div>

			<div class="col-md-12 col-xs-12">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-4 order-wrapper">
						<div class="order-ways">
							<div class="order-img-icon">
								<img src="<?php bloginfo('template_directory'); ?>/img/icon-tort-red.png" alt="">
							</div>
							<div class="order-ways-descript">Выберите готовое оформление из нашего каталога</div>
							<a href="<?php the_permalink(); ?>каталог-тортов/"><div class="btn">Выбрать оформление</div></a>	
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 order-wrapper">
						<div class="order-ways">
							<div class="order-img-icon">
								<img src="<?php bloginfo('template_directory'); ?>/img/icon-paintbrush-red.png" alt="">
							</div>
							<div class="order-ways-descript">Выберите готовое оформление со своими поправками</div>
							<a href="<?php the_permalink(); ?>каталог-тортов/"><div class="btn">Выбрать оформление</div></a>	
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-4 order-wrapper">
						<div class="order-ways">
							<div class="order-img-icon">
								<img src="<?php bloginfo('template_directory'); ?>/img/icon-photo-red.png" alt="">
							</div>
							<div class="order-ways-descript">Пришлите фотографию или ссылку на изображение торта</div>
							<a href="#"><div class="btn">Отправить</div></a>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_template_part('sidebar-popular'); ?>

	<?php get_footer(); ?>