<?php
    function wp_theme_setup(){
        // Поддержка миниатюр
        add_theme_support( 'post-thumbnails' );
    }
    add_action( 'after_setup_theme', 'wp_theme_setup' );

    // Подключаем стили и скрипты
    add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );
    // add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний

    function theme_name_scripts() {
    	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css');
    	wp_enqueue_style( 'tether', get_stylesheet_directory_uri() . '/css/tether.min.css');
    	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/src/slick/slick.css');
    	wp_enqueue_style( 'slick-theme', get_stylesheet_directory_uri() . '/src/slick/slick-theme.css');
    	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
/*    wp_enqueue_script( 'vue', get_template_directory_uri() . '/js/vue.min.js', array(), '1.0.0', false );
      wp_enqueue_script( 'vue-router', get_template_directory_uri() . '/js/vue-router.min.js', array(), '1.0.0', false );*/
	    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '1.0.0', false );
	    wp_enqueue_script( 'app', get_template_directory_uri() . '/dist/build.js', array(), '1.0.0', true );
	    wp_localize_script('app', 'WPData', array( 'siteurl' => get_template_directory_uri(), 'category' => get_product_category(), 'products' => get_product_posts(), 'contacts' => get_contacts(), 'about' => get_about(), 'city' => get_city(), 'weight' => get_weight(), 'expedition' => get_expedition(), 'tires' => get_tires(), 'floor' => get_floor(), 'documents' => get_documents(), 'money' => get_money(), 'status_order' => get_status_order(), 'stores' => get_stores()));
	    wp_localize_script('app', 'myajax', array('url' => admin_url('admin-ajax.php'))	);
    }

    function wp_add_footer_scripts() {
        wp_enqueue_script( 'jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.4.1.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'tether', get_template_directory_uri() . '/js/tether.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js');
        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/src/slick/slick.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array(), '1.0.0', true );
    };

	add_action( 'get_footer', 'wp_add_footer_scripts' );

	add_action( 'wp_ajax_send_order', 'sendEmail' );
	add_action( 'wp_ajax_nopriv_send_order', 'sendEmail' );

	add_action( 'wp_ajax_get_status_order', 'getStatusOrder' );
	add_action( 'wp_ajax_nopriv_get_status_order', 'getStatusOrder' );

	add_action( 'wp_ajax_get_status_order_for_admin', 'getStatusOrderAdmin' );
	add_action( 'wp_ajax_nopriv_get_status_order_for_admin', 'getStatusOrderAdmin' );

	add_action( 'wp_ajax_set_status_order', 'setStatusOrder' );
	add_action( 'wp_ajax_nopriv_set_status_order', 'setStatusOrder' );

	add_action( 'wp_ajax_get_status_records', 'getStatusRecords' );
	add_action( 'wp_ajax_nopriv_get_status_records', 'getStatusRecords' );

	function addStatusRecord($order_id, $status){
		global $wpdb;
		$data = array(
			'order_id' => esc_sql($order_id),
			'status' => esc_sql($status),
			'date' => esc_sql(date("d.m.Y")),
		);

		return $wpdb->insert('wp_status_records', $data, array('%d', '%s', '%s'));
	}

	function getStatusRecords()
	{
		
		$id = $_POST['id'];
		$records = get_status_records($id);
		
		echo json_encode($records);

		wp_die();
	}

	function getStatusOrder()
	{
		global $wpdb;
        
        $numOrder = $_POST['numOrder'];
        $status = $wpdb->get_row("SELECT * FROM wp_orders WHERE id_order = ". $numOrder, ARRAY_A);

		echo json_encode($status);

		wp_die();
	}

	function getStatusOrderAdmin()
	{
		global $wpdb;
        
        $numOrder = $_POST['numOrder'];
        $status = $wpdb->get_row("SELECT * FROM wp_orders WHERE id_order = ". $numOrder, ARRAY_A);
        if(($status['status_id'] == 1) || ($status['status_id'] == 2) || ($status['status_id'] == 4))
        {
        	$statusRealName = $wpdb->get_row("SELECT * FROM wp_status WHERE id = ". $status['status_id'], ARRAY_A);
	        $status['status'] = $status['status'] . '(' .$statusRealName['status_name'] . ')';
        }
        
		echo json_encode($status);
		wp_die();
	}

	function setStatusOrder()
	{
		global $wpdb;
        
        $numOrder = $_POST['numOrder'];
        $newStatus = $_POST['status'];
        $city = $_POST['city'];
        
        $nameStatusOrder = get_status_name_order_by_id($newStatus);
        if((($newStatus == 5) || ($newStatus == 6)) && ($city != ''))
        {
        	//$cityFull = $wpdb->get_row("SELECT * FROM wp_cities WHERE id = ". $city, ARRAY_A);
        	//$nameStatusOrder = $nameStatusOrder . ' ' . $cityFull['city'];
        	$nameStatusOrder = $nameStatusOrder . ' ' . $city;
        }

        
        $query = "UPDATE wp_orders SET status_id = " . $newStatus . " WHERE id_order = " . $numOrder;
        $wpdb->query($query);

        $query = "UPDATE wp_orders SET status = " . "'" . $nameStatusOrder . "'" . " WHERE id_order = " . $numOrder;
        $wpdb->query($query);

        if(($newStatus == 1) || ($newStatus == 2) || ($newStatus == 4))
        {
        	$statusRealName = $wpdb->get_row("SELECT * FROM wp_status WHERE id = ". $newStatus, ARRAY_A);
	        $nameStatusOrder = $nameStatusOrder . '(' .$statusRealName['status_name'] . ')';
        }

        addStatusRecord($numOrder, $nameStatusOrder);

        echo $nameStatusOrder;

		wp_die();
	}

	function sendEmail()
	{
		$order = $_POST['order'];
		$info_client = $_POST['info_client'];
		$body = "<hr><p><h3>Информация о заказчике</h3></p><p> ФИО получателя:". $info_client['fio']."</p><p>Адрес:". $info_client['address']."</p><p>Email Address: ". $info_client['email']."</p><p>Телефон:". $info_client['fenix']."</p><p>Телефон мессенджер:". $info_client['phone']."</p>";
		if($info_client['viber'] != 'false') {
			$body = $body . "<p>Есть Viber</p>";
		}
		if($info_client['whatsapp'] != 'false') {
			$body = $body . "<p>Есть Whatsapp</p>";
		}
		if($info_client['telegram'] != 'false') {
			$body = $body . "<p>Есть Telegram</p>";
		}

		for($i = 0; $i < count($order); $i++){
			if(!strcmp($order[$i]["type"],'cargo')) {
				$body = $body . '<hr><p><h3>Информация о заказе</h3></p>';
				$body = $body . '<p>Ссылка на заказ: '. $order[$i]["order"];
				$body = $body . '</p><p>Количество: '. $order[$i]["amount"] . 'шт.';
				$body = $body . '</p><p>Вес: '. $order[$i]["weight"] . 'кг.';
				$body = $body . '</p><p>Цена за единицу: '. $order[$i]["sum"] . 'руб.';
				$body = $body . '</p><p>Длина: '. $order[$i]["len"] . 'см.';
				$body = $body . '</p><p>Ширина: '. $order[$i]["width"] . 'см.';
				$body = $body . '</p><p>Высота: '. $order[$i]["height"] . 'см.';
				$body = $body . '</p><p>Подъем на этаж: ';
				($order[$i]["floor_user"] > 0) ? $body = $body . $order[$i]["floor_user"] : $body = $body . 'нет';
				$body = $body . '</p><p>Лифт: ';
				($order[$i]["pLift"] == true) ? $body = $body . 'есть' : $body = $body . 'нет';
				$body = $body . '</p><p>Грузовой лифт: ';
				($order[$i]["lift"] == true) ? $body = $body . 'есть' : $body = $body . 'нет';
				$body = $body . '</p><p>Хрупкий груз: ';
				($order[$i]["fragile"] == true) ? $body = $body . 'да' : $body = $body . 'нет';
				$body = $body . '</p><p>Описание: '. $order[$i]["description"].'</p>'.'<hr>';
                $body = $body . '<p>Расшифровка суммы по заказу</p>';
                $body = $body . '<p>Сумма товара: ' . ($order[$i]["sum"] * $order[$i]["amount"]);
                $body = $body . '</p><p>Доставка: ' . $order[$i]["delivery"];
                $body = $body . '</p><p>Страховой сбор: ' . $order[$i]["insurance"];
                $body = $body . '</p><p>Комиссия за перевод денег: ' . $order[$i]["transfer_commission"];
                $body = $body . '</p><p>Хрупкий груз: ' . $order[$i]["fragile_sum"];
                $body = $body . '</p><p>Подъем на этаж: ' . $order[$i]["floor"].'</p>';
			} elseif(!strcmp($order[$i]["type"],'tire')) {
				$body = $body . '<hr><p><h3>Информация о заказе</h3></p>';
				$body = $body . '<p>Ссылка на заказ: '. $order[$i]["order"];
				$body = $body . '</p><p>Количество: '. $order[$i]["amount"];
				$body = $body . '</p><p>Диаметр: '. $order[$i]["selectTires"];
				$body = $body . '</p><p>Цена за единицу: '. $order[$i]["sum"] . 'руб.';
				$body = $body . '</p><p>Подъем на этаж: ';
				($order[$i]["floor_user"] > 0) ? $body = $body . $order[$i]["floor_user"] : $body = $body . 'нет';
				$body = $body . '</p><p>Лифт: ';
				($order[$i]["pLift"] == true) ? $body = $body . 'есть' : $body = $body . 'нет';
				$body = $body . '</p><p>Грузовой лифт: ';
				($order[$i]["lift"] == true) ? $body = $body . 'есть' : $body = $body . 'нет';
				$body = $body . '</p><p>Хрупкий груз: ';
				($order[$i]["fragile"] == true) ? $body = $body . 'да' : $body = $body . 'нет';
				$body = $body . '</p><p>Описание: '. $order[$i]["description"].'</p>'.'<hr>';
                $body = $body . '<p>Расшифровка суммы по заказу</p>';
                $body = $body . '<p>Сумма товара: ' . ($order[$i]["sum"] * $order[$i]["amount"]);
                $body = $body . '</p><p>Доставка: ' . $order[$i]["delivery"];
                $body = $body . '</p><p>Страховой сбор: ' . $order[$i]["insurance"];
                $body = $body . '</p><p>Комиссия за перевод денег: ' . $order[$i]["transfer_commission"];
                $body = $body . '</p><p>Подъем на этаж: ' . $order[$i]["floor"].'</p>';
			} elseif(!strcmp($order[$i]["type"],'document')) {
                $body = $body . '<hr><p><h3>Информация о заказе (документы)</h3></p>';
                $body = $body . '</p><p>ФИО отправителя: '. $order[$i]["fio_recip"];
                $body = $body . '</p><p>Телефон отправителя: '. $order[$i]["phone_recip"];
                $body = $body . '</p><p>Оценочная стоимость: '. $order[$i]["sum"] . 'руб.';
                $body = $body . '</p><p>Копия/Оригинал: '. $order[$i]["copy"];
                $body = $body . '</p><p>Описание: '. $order[$i]["description"].'</p>'.'<hr>';
                $body = $body . '<p>Расшифровка суммы по заказу</p>';
                $body = $body . '<p>Оценочная стоимость: '. $order[$i]["sum"] . 'руб.';
                $body = $body . '</p><p>Доставка: ' . $order[$i]["delivery"];
                $body = $body . '</p><p>Страховой сбор: ' . $order[$i]["insurance"] . '</p>';
            } else {
                $body = $body . '<hr><p><h3>Информация о заказе (деньги)</h3></p>';
                $body = $body . '</p><p>ФИО отправителя: '. $order[$i]["fio_recip"];
                $body = $body . '</p><p>Отправлено через: '. $order[$i]["bank"];
                $body = $body . '</p><p>Номер платежной квитанции: '. $order[$i]["passport"];
                $body = $body . '</p><p>Телефон отправителя: '. $order[$i]["phone_recip"];
                $body = $body . '</p><p>Отправляемая сумма: '. $order[$i]["sum"] . 'руб.';
                $body = $body . '</p><p>Описание: '. $order[$i]["description"].'</p>'.'<hr>';
                $body = $body . '<p>Расшифровка суммы по заказу</p>';
				$body = $body . '<p>Отправляемая сумма: '. $order[$i]["sum"] . 'руб.';
                $body = $body . '</p><p>Страховой сбор: ' . $order[$i]["insurance"] . '</p>';
            }
		}

        $numOrder = date("dmy") . (get_col_orders_day() + 1);
		$body = "Заказ №" . $numOrder . "<hr>". $body . "<hr><hr>Итоговая сумма: " . $_POST['total'];
		$headers = array('Content-Type: text/html; charset=UTF-8');

		if(addOrder($body, $info_client['fio'], $info_client['from'], $info_client['to'])) {
			addStatusRecord($numOrder, "Оформление заказа (Обработка обращения)");
            echo $numOrder;
            wp_mail('privozim.com@gmail.com', 'Заказ с сайта', $body, $headers);
            wp_die();
            return true;
		};

        echo false;

		wp_die();


	}

	function addOrder($text, $fio, $from, $to){
		global $wpdb;
		$id_order = date("dmy") . (get_col_orders_day() + 1);
		$cityFull = $wpdb->get_row("SELECT * FROM wp_cities WHERE id = ". $from, ARRAY_A);
        $from_city = ($cityFull != null)? $cityFull['city'] : '';

        $cityFull = $wpdb->get_row("SELECT * FROM wp_cities WHERE id = ". $to, ARRAY_A);
        $to_city = ($cityFull != null)? $cityFull['city'] : '';

		$data = array(
			'id_order' => esc_sql($id_order),
			'fio' => esc_sql($fio),
			'from_city' => esc_sql($from_city),
			'to_city' => esc_sql($to_city),
			'data' => esc_sql(date("Y-m-d")),
			'text' => esc_sql($text),
			'status' => esc_sql("Оформление заказа"),
			'status_id' => esc_sql(1),
		);

		return $wpdb->insert('wp_orders', $data, array('%d', '%s', '%s', '%s', '%s', '%s', '%s', '%d'));
	}

	function get_col_orders_day() {
		global $wpdb;
        $date = date("Y-m-d");
        $totalorders = intval($wpdb->get_var("SELECT COUNT(*) FROM wp_orders WHERE data = ". "'" . $date . "'"));

		return $totalorders;
	}

    function get_id_category($cat_name) {
	    return get_cat_ID($cat_name);
    }

    function get_product_category() {
    	$catId = get_id_category('Список категорий');
    	if($catId != 0) {
		    $args = array(
			    'type'         => 'post',
			    'child_of'     => $catId,
			    'parent'       => '',
			    'orderby'      => 'id',
			    'order'        => 'ASC',
			    'hide_empty'   => 0,
			    'hierarchical' => 1,
			    'exclude'      => '',
			    'include'      => '',
			    'number'       => 0,
			    'taxonomy'     => 'category',
			    'pad_counts'   => false,
			    // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
		    );
		    $categories = get_categories( $args );
		    if( $categories ){
		    	return $categories;
		    	/*
			    foreach( $categories as $cat ){
				    // Данные в объекте $cat

				    // $cat->term_id
				    // $cat->name (Рубрика 1)
				    // $cat->slug (rubrika-1)
				    // $cat->term_group (0)
				    // $cat->term_taxonomy_id (4)
				    // $cat->taxonomy (category)
				    // $cat->description (Текст описания)
				    // $cat->parent (0)
				    // $cat->count (14)
				    // $cat->object_id (2743)
				    // $cat->cat_ID (4)
				    // $cat->category_count (14)
				    // $cat->category_description (Текст описания)
				    // $cat->cat_name (Рубрика 1)
				    // $cat->category_nicename (rubrika-1)
				    // $cat->category_parent (0)

			    }*/
		    }
	    }
    }

	function get_product_posts() {

    	$product = [];

		$catId = get_id_category('Список категорий');
		if($catId != 0) {
			$args = array(
				'numberposts' => -1,
				'category'    => $catId,
				'orderby'     => 'date',
				'order'       => 'DESC',
				'include'     => array(),
				'exclude'     => array(),
				'meta_key'    => '',
				'meta_value'  =>'',
				'post_type'   => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			);

			$posts = get_posts( $args );

			foreach($posts as $post){
					$categori_id = get_the_category( $post->ID );
					$product[] =
						array(
							'id'      => $post->ID,
							'name'    => $post->post_title,
							'img-url' => get_the_post_thumbnail_url( $post->ID ),
							'url'     => $post->post_content,
							'category_id' => $categori_id[0]->cat_ID,
							'category_name' => $categori_id[0]->cat_name
						);
			}

			wp_reset_postdata(); // сброс

			return $product;
		}
	}

	function get_contacts() {
		$contacts = [];

		$contacts['stock']['address'] = get_content_app('Адрес (склад)', 1);
		$contacts['stock']['day'] = get_content_app('Дни работы (склад)', 1);
		$contacts['stock']['email'] = get_content_app('Почта (склад)', 1);
		$contacts['stock']['mode'] = get_content_app('Режим работы (склад)', 1);
		$contacts['stock']['phone'] = get_content_app('Телефон (склад)', 5);

		$contacts['office']['address'] = get_content_app('Адрес (офис)', 1);
		$contacts['office']['day'] = get_content_app('Дни работы (офис)', 1);
		$contacts['office']['email'] = get_content_app('Почта (офис)', 1);
		$contacts['office']['mode'] = get_content_app('Режим работы (офис)', 1);
		$contacts['office']['phone'] = get_content_app('Телефон (офис)', 5);

		$contacts['vk'] = get_content_app('VK', 1);
		$contacts['facebook'] = get_content_app('Facebook', 1);

		return  $contacts;
	}

	function get_content_app($postName, $numberpost) {
		$catId = get_id_category($postName);
		if($catId != 0) {
			$args = array(
				'numberposts'      => -1,
				'category'         => $catId,
				'orderby'          => 'date',
				'order'            => 'DESC',
				'include'          => array(),
				'exclude'          => array(),
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
			);

			$posts = get_posts( $args );

			foreach ( $posts as $post ) {
				if($numberpost == 1)
					$content = $post->post_content;
				else
					$content[] = $post->post_content;
			}
		}

		wp_reset_postdata(); // сброс

		return $content;
	}

	function get_about() {
		$about = [];

		$about['salary'] = get_content_app('Оплата', 1);
		$about['delivery'] = get_content_app('Доставка', 1);
		$about['vacancies'] = get_content_app('Вакансии', 1);
		$about['agreement'] = get_content_app('Пользовательское соглашение', 1);
        $about['description'] = get_content_app('Описание', 1);

		wp_reset_postdata(); // сброс

		return $about;
	}

	function get_city() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_cities ORDER BY id" );

        return $city;
    }

    function get_status_order() {
        global $wpdb;

        $status = $wpdb->get_results( "SELECT * FROM wp_status" );

        return $status;
    }

	function get_status_name_order_by_id($id) {
        global $wpdb;

        $status = $wpdb->get_row( "SELECT * FROM wp_status WHERE id = " . $id );
        $statusClient = $wpdb->get_row( "SELECT * FROM wp_status WHERE id = " . $status->id_client );

        return $statusClient->status_name;
    }    

    function get_weight() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_weight", ARRAY_A);

        return $city;
    }

    function get_expedition() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_expedition", ARRAY_A );

        return $city;
    }

    function get_tires() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_tires" );

        return $city;
    }

    function get_floor() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_floor" );

        return $city;
    }

    function get_documents() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_documents" );

        return $city;
    }

    function get_money() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_money" );

        return $city;
    }

    function get_stores() {
        global $wpdb;

        $city = $wpdb->get_results( "SELECT * FROM wp_stores" );

        return $city;
    }

    function get_status_records($id) {
        global $wpdb;

        $records = $wpdb->get_results( "SELECT * FROM wp_status_records WHERE order_id = " . $id. " ORDER BY id");


        return $records;
    }
?>
