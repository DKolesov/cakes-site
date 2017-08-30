	<?php /*Template Name: delivery-page*/ ?>

	<?php get_header(); ?>

	<?php get_template_part('navigation'); ?>

	<div class="delivery">
		<div class="container">
			<div class="col-xs-12">
				<div class="row">
					<div class="head-text">Условия доставки</div>
					<div class="col-md-3">
						<!-- offset -->
					</div>
					<div class="col-md-7">
						<div class="row">
							<div class="delivery-descript">
								<?php the_field('my_delivery', 121); ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xs-12" style="margin-top: 40px;">
				<div class="row">
					<div class="col-md-4 col-sm-2">
						<!-- offset -->
					</div>
					<div class="col-md-4 col-sm-8 delivery-form-wrapper">
						<div class="row">
							<div class="form-call">
								<div class="form-text">
									<b>Перезвоним вам бесплатно</b><br>
									<span>И обсудим все возможные условия</span>
								</div>
								<form action="" class="footer-form" method="post">
									<input type="hidden" name="subject" value="Перезвонить - доставка">
									<div class="col-xs-12">
										<input class="col-xs-12" type="text" placeholder="Ваше имя" name="name-sender">
									</div>
									<div class="col-xs-12">
										<input class="col-xs-12" type="text" placeholder="Ваш номер телефона" name="phone-num">
									</div>
									<div class="col-xs-12">
										<button class="button btn-form" type="submit" name="send-button">Перезвонить вам</button>
									</div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<?php get_footer(); ?>