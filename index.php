	<?php get_header(); ?>

	<div class="fscreen" style="background-image: url(<?php bloginfo('template_directory'); ?>/img/cafe3.jpg);">
		<div class="fscreen-wrapper-text">
			<div class="fscreen-cell-text">
				<div class="fscreen-cell-in">
					<div class="top">
						Вкусные торты, пирожные и выпечка в Перми
					</div>
					<div class="logo">
						<?php bloginfo('name'); ?>
					</div>
					<div class="bottom">
						<?php bloginfo('description'); ?>
					</div>
				</div>
			</div>
		</div>

		<span class="fscreen-index glyphicon"></span>
		
		<div class="fscreen-bg">
		</div>
	</div>

	<?php get_template_part('navigation'); ?>

	<div class="page-catalog">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12 p-c-wrapper">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-md-12 col-sm-8 col-xs-12">
							<a href="<?php the_permalink(); ?>каталог-тортов/">
								<div class="p-c-link" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/cake.jpg')">
									<span>Торты</span>
									<div class="p-c-trans"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 p-c-wrapper">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-md-12 col-sm-8 col-xs-12">
							<a href="<?php the_permalink(); ?>каталог-пирожных/">
								<div class="p-c-link" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/desert.jpg')">
									<span>Пирожные</span>
									<div class="p-c-trans"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-xs-12 p-c-wrapper">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-md-12 col-sm-8 col-xs-12">
							<a href="<?php the_permalink(); ?>каталог-выпечки/">
								<div class="p-c-link" style="background-image: url('<?php bloginfo('template_directory'); ?>/img/Pie.jpg')">
									<span>Выпечка</span>
									<div class="p-c-trans"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="how-do-it">
		<div class="container">
			<div class="head-text">
				Как мы готовим? <p>Разберем все по шагам</p>
			</div>

			<div class="hdi-wrapper-all">
				<?php
					if ( have_posts() ) : // если имеются записи в блоге.
					  query_posts('cat=5');   // указываем ID рубрик, которые необходимо вывести.
					  while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
					  $id_post = get_the_ID();
				?>
				
				<div class="col-md-12 col-sm-12 hdi-step-row">
					<div class="row">
						<div class="col-md-1 col-sm-2"><!-- offset --></div>
						<div class="col-md-10 col-sm-8 col-xs-12">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-xs-12 hdi-left-block">
									<div class="row">
										<?php 
											$my_image = get_field('my_hdi_photo', $id_post); 
											if( !empty($my_image) ): 
										?>
										<div class="col-md-6 hdi-img"  style="background-image: url('<?php echo $my_image['url']; ?>')"></div>
										<?php 
											endif;
										?>
									</div>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 hdi-right-block hdi-descript-wrapper">
									<div class="row">
										<div class="hdi-head"><?php the_field('my_hdi_head', $id_post); ?></div>
										<div class="hdi-descript"><?php the_field('my_hdi_descript', $id_post); ?></div>
										<div class="hdi-step"><?php the_field('my_hdi_step', $id_post); ?></div>
									</div>
								</div>
							</div>
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

	<div class="review" id="review">
		<div class="head-text">
			Отзывы<br>
			<p>Со ссылками на страницы социальных сетей</p>
		</div>

		<div class="review-slider-wrapper">
			<div class="container">
				<div class="col-md-2"><!-- offset --></div>
				<div class="review-slider col-md-8">
					<div id="block-for-slider">
				        <div id="viewport">
				            <ul id="slidewrapper">
				            	<?php
									if ( have_posts() ) : // если имеются записи в блоге.
									  query_posts('cat=6');   // указываем ID рубрик, которые необходимо вывести.
									  while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
									  $id_post = get_the_ID();
								?>
								
								<li class="slide">
					                <div class="slide-cell">
					                	<div class="review-name-reviewer"><?php the_field('my_review_fio', $id_post); ?></div>
					                	<a href="<?php the_field('my_review_link', $id_post); ?>" class="review-link" target="_blank">Ссылка на страницу</a>
					                    <div class="review-review"><?php the_field('my_review_review', $id_post); ?></div>
					                </div>
				                </li>
								
								<?php 
									endwhile; 
									endif;
									wp_reset_query(); 
								?>
				            </ul>
				        </div>

				        <div id="prev-next-btns">
			                <div id="prev-btn"><</div>
			                <div id="next-btn">></div>
			            </div>
				    </div>
				</div>
				<div class="col-md-2"><!-- offset --></div>

				<div class="col-md-12 review-btn-wrapper">
					<a href="#modal-review" class="modal-review-btn">Оставить свой отзыв</a>
				</div>
			</div>
		</div>
	</div>

	<div class="follow-us">
		<div class="container">
			<div class="head-text">
				Будьте в курсе всех акций и скидок
				<p>Подписывайтесь на нас в социальных сетях</p>
			</div>

			<div class="col-md-12 col-sm-12 follow-soc">
				<div class="row">
					<div class="col-md-6 col-sm-12 follow-block">
						<div class="row">
							<div class="follow-widget">
								<script type="text/javascript" src="//vk.com/js/api/openapi.js?146"></script>

								<!-- VK Widget -->
								<div id="vk_groups"></div>
								<script type="text/javascript">
								VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, no_cover: 1, height: "400", width: "auto"}, 141433779);
								</script>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-sm-12 follow-block">
						<div class="row">
							<div class="follow-widget">
								<iframe src="//widget.instagramm.ru/?imageW=2&imageH=2&thumbnail_size=178&type=0&typetext=tortikimari&head_show=1&profile_show=0&shadow_show=0&bg=255,255,255,1&opacity=true&head_bg=46729b&subscribe_bg=ad4141&border_color=c3c3c3&head_title=" allowtransparency="true" frameborder="0" scrolling="no" style="border:none;overflow:hidden;width:100%;height:400px;"></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="modal-review" class="white-popup mfp-hide modal-window form-call">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="form-call">
						<div class="form-text">
							<b>Оставьте свой отзыв</b><br>
							<span>Нам очень важно ваше мнение</span>
						</div>
						<form action="" class="footer-form" id="review-form" method="post">
							<input type="hidden" name="subject" value="Отзыв">
							<div class="col-md-12">
								<input class="col-xs-12" type="text" placeholder="Ваше имя" name="name-sender">
							</div>
							<div class="col-md-12">
								<input class="col-xs-12" type="text" placeholder="Ваш номер телефона" name="phone-num">
							</div>
							<div class="col-md-12">
								<textarea name="review" placeholder="Ваш отзыв"></textarea>
							</div>
							<div class="col-md-12">
								<button class="button btn-form" type="submit" name="send-button-review">Оставить отзыв</button>
							</div>
						</form>
							
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php get_footer() ?>