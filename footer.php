	<footer>
		<div class="container">
			<div class="col-md-5 col-sm-6 col-xs-12 footer-nav">
				<?php
				wp_nav_menu( array( 
				    'theme_location' => 'custom-top-menu',
					'container' => 'ul',
					'container_class' => 'custom-top-menu' ));
				?>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="footer-info">
					<ul>
						<li>Режим работы:</li>
						<li>ПН-ПТ: 9:00-20:00</li>
						<li>СБ-ВС: 9:00-19:00</li>
					</ul>
				</div>
				<div class="footer-follow">
					Мы в социальных сетях:
					<div class="footer-follow-icons">
						<a href="https://vk.com/club141433779" target="_blank"><div class="footer-follow-icon"><img src="<?php bloginfo('template_directory'); ?>/img/vk.png" alt=""></div></a>
						<a href="https://www.instagram.com/tortikimari/" target="_blank"><div class="footer-follow-icon"><img src="<?php bloginfo('template_directory'); ?>/img/instagram.png" alt=""></div></a>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 footer-right-block">
				<div class="info-number">
					<?php the_field('my_number_phone', 37); ?>
				</div>
				<div class="info-callbtn">
					<a href="#modal-callback" class="modal-callback-btn">Перезвонить вам</a>
				</div>
			</div>
		</div>
	</footer>

	<div id="modal-callback" class="white-popup mfp-hide modal-window form-call">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="form-call">
						<div class="form-text">
							<b>Мы перезвоним вам</b><br>
							<span>В течение 10 минут</span>
						</div>
						<form action="" class="footer-form form-form" method="post">
							<input class="col-xs-12" type="hidden" name="subject" value="Перезвонить">
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

	<div id="modal-thanks" class="white-popup mfp-hide modal-window form-call">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="form-call">
						<div class="form-text">
							<b>Мы перезвоним вам</b><br>
							<span>В течение 10 минут</span><br><br>
							<span>Сообщение исчезнет через 3 секунды...</span>
						</div>							
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php bloginfo('template_directory'); ?>/js/libs.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/loadmore.js"></script>
</body>
</html>