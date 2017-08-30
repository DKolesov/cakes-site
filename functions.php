<?php
	function wpb_custom_new_menu() {
	  register_nav_menus(
		array(
		  'custom-top-menu' => __( 'My Custom Top Menu' ),
		  'custom-bottom-menu' => __( 'My Custom Bottom Menu' )
		)
	  );
	}
	add_action( 'init', 'wpb_custom_new_menu' );

	function remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'remove_more_link_scroll' );
		add_filter( 'the_content_more_link', 'modify_read_more_link' );
	function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Your Read More Link Text</a>';
	}

	// send mail
	// **************Подключение отправки на почту
	
	// Указывать у формы метод POST
	if (isset($_POST['send-button'])) {
		$fio = trim(urldecode(htmlspecialchars($_POST['name-sender'])));
		$phone = trim(urldecode(htmlspecialchars($_POST['phone-num'])));
		$subject = trim(urldecode(htmlspecialchars($_POST['subject'])));//Загаловок сообщения
		$to = 'piece-happines@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
	    $message = 
	    'Тема: '.$subject.'
Имя: '.$fio.'
Телефон: '.$phone.''; //Текст нащего сообщения можно использовать HTML теги
	    $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
	    wp_mail($to, $subject, $message, $headers);
	};

	if (isset($_POST['send-button-review'])) {
		$fio = trim(urldecode(htmlspecialchars($_POST['name-sender'])));
		$phone = trim(urldecode(htmlspecialchars($_POST['phone-num'])));
		$subject = trim(urldecode(htmlspecialchars($_POST['subject'])));//Загаловок сообщения
		$review = trim(urldecode(htmlspecialchars($_POST['review'])));//Отзыв

		$to = 'piece-happines@yandex.ru'; //Почта получателя, через запятую можно указать сколько угодно адресов
	    $message = 
	    'Тема: '.$subject.'
Имя: '.$fio.'
Телефон: '.$phone.'
Отзыв: '.$review.''; //Текст нащего сообщения можно использовать HTML теги
	    $headers .= "From: Отправитель <from@example.com>\r\n"; //Наименование и почта отправителя
	    wp_mail($to, $subject, $message, $headers);
	};

	/*---------Button "Show more"-----------*/
	function true_loadmore_scripts() {
		wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
	 	wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/loadmore.js', array('jquery') );
	}
	 
	add_action( 'wp_enqueue_scripts', 'true_loadmore_scripts' );

	function true_load_posts(){
	$args = unserialize(stripslashes($_POST['query']));
	$args['paged'] = $_POST['page'] + 1; // следующая страница
	$args['post_status'] = 'publish';
	$q = new WP_Query($args);
	if( $q->have_posts() ):
		while($q->have_posts()): $q->the_post();
			/*
			 * Со строчки 13 по 27 идет HTML шаблон поста, максимально приближенный к теме TwentyTen.
			 * Для своей темы вы конечно же можете использовать другой код HTML.
			 */
			?>
			<div class="product col-md-3 col-sm-6">
				<div class="product-wrapper">
					<?php 
						$my_image = get_field('my_pie_photo', $post_id); 
						if( !empty($my_image) ): 
					?>
					<div class="product-img" style="background-image: url(<?php echo $my_image['url']; ?>)">
					</div>
					<?php 
						endif;
					?>
					<div class="product-text-wrapper">
						<div class="product-descript">
							<b><?php the_field('my_pie_name', $post_id); ?></b>
							<p>Стоимость: <?php the_field('my_pie_price', $post_id); ?> руб./шт.</p>
						</div>
						<a href="<?php the_permalink(); ?>"><div class="button">Посмотреть состав</div></a>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
	wp_reset_postdata();
	die();
}
 
 
add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');

?>