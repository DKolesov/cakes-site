<header>
	<div class="header-info">
		<div class="container">
			<div class="col-md-5 col-sm-6 col-xs-12 header-info-left">
				<a href="<?php site_url(); ?>">
					<div class="haeder-logo">
						<?php bloginfo('name'); ?>
					</div>
					<div class="header-descript">
						Вкусные торты, пирожные и выпечка
					</div>
				</a>
			</div>

			<div class="col-md-3 header-info-center">
				<ul>
					<li>Режим работы:</li>
					<li>ПН-ПТ: 9:00-20:00</li>
					<li>СБ-ВС: 9:00-19:00</li>
				</ul>
			</div>

			<div class="col-md-4 col-sm-6 col-xs-12 header-info-right">
				<div class="info-number">
					<?php the_field('my_number_phone', 37); ?>
				</div>
				<div class="info-callbtn">
					<a href="#modal-callback" class="modal-callback-btn">Перезвонить вам</a>
				</div>
			</div>

		</div>
	</div>

	<div class="header-nav">
		<div class="container">
			<?php
			wp_nav_menu( array( 
			    'theme_location' => 'custom-top-menu',
				'container' => 'ul',
				'container_class' => 'custom-top-menu' ));
			?>
		</div>
		<div class="header-nav-menu">Меню сайта</div>
	</div>
</header>