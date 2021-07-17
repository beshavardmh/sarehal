<?php
add_action( "wp_ajax_payment_ajax", "payment_ajax" );
add_action( "wp_ajax_nopriv_payment_ajax", "payment_ajax" );

function payment_ajax() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax_nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	if ( isset( $_REQUEST ) ) {

		require_once 'payment.php';

		$plan_id = $_REQUEST['plan_id'];
		$data    = [
			'errMsg'       => 0,
			'redirect_url' => 0,
		];

		$payment = new SarehalPayment();

		$errMsg = '';

		$db   = new SarehalDbManager();
		$plan = $db->get_row( $db->table_plans, esc_sql( $plan_id ) );

		$user_id = isset( $_SESSION['signup_user_id'] ) ? 1 : 0;

		if ( ! $plan || ! $user_id ) {
			$errMsg .= 'حطا در انجام عملیات!';
		}

		if ( $errMsg !== '' ) {
			$data['errMsg'] = $errMsg;
			wp_send_json_error( $data );
		} else {

			$user_phone = $db->get_row( $db->table_users, $_SESSION['signup_user_id'] )->phone;

			$payment->phone = $user_phone;
			if ( ! empty( $_SESSION['payment_discount'] ) ) {
				$payment->amount = ( $plan->price - $_SESSION['payment_discount'] ) . 0;
			} else {
				$payment->amount = $plan->price . 0;
			}
			$payment->plan_id = $plan->ID;

			$payment->do_payment( function ( $class, $err, $result, $pay_data = null ) {
				$errMsg = '';
				$data   = [
					'errMsg'       => 0,
					'redirect_url' => 0,
				];

				if ( $err ) {
					$errMsg         .= "cURL Error #:" . $err . '<br>';
					$data['errMsg'] = $errMsg;
					wp_send_json_error( $data );
				} else {
					if ( empty( $result['errors'] ) ) {
						if ( $result['data']['code'] == 100 ) {
							$data['redirect_url'] = 'https://www.zarinpal.com/pg/StartPay/' . $result['data']["authority"];

							$_SESSION['payment_phone']   = $class->phone;
							$_SESSION['payment_amount']  = $class->amount;
							$_SESSION['payment_plan_id'] = $class->plan_id;

							wp_send_json_success( $data );
						}
					} else {
						$errMsg         .= 'Error Code: ' . $result['errors']['code'] . '<br>';
						$errMsg         .= 'message: ' . $result['errors']['message'] . '<br>';
						$data['errMsg'] = $errMsg;
						wp_send_json_error( $data );
					}
				}
			} );
		}
	}
}

//------------------------------------------------------------------

add_action( "wp_ajax_signup_ajax", "signup_ajax" );
add_action( "wp_ajax_nopriv_signup_ajax", "signup_ajax" );

function signup_ajax() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax_nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	if ( isset( $_REQUEST ) ) {

		require_once 'payment.php';

		$age      = $_REQUEST['age'];
		$gender   = $_REQUEST['gender'];
		$height   = $_REQUEST['height'];
		$weight   = $_REQUEST['weight'];
		$diseases = $_REQUEST['diseases'];
		$phone    = $_REQUEST['phone'];
		$fullname = $_REQUEST['fullname'];
		$sms_adv  = $_REQUEST['sms_adv'];
//        $date = new DateTime('now', new DateTimeZone("Asia/Tehran"));
//        $date = $date->format("Y-m-d H:i:s");

		$errors = [ 'age'      => 0,
		            'gender'   => 0,
		            'height'   => 0,
		            'weight'   => 0,
		            'diseases' => 0,
		            'phone'    => 0,
		            'fullname' => 0
		];

		$data = [
			'errMsg' => 0,
		];

		$payment = new SarehalPayment();

		$errMsg = $payment->userValidation( compact(
			'age',
			'gender',
			'height',
			'weight',
			'diseases',
			'phone',
			'fullname',
			'errors'
		) );

		$db = new SarehalDbManager();

		if ( ! empty( $errMsg ) ) {
			$data['errMsg'] = $errMsg;
			wp_send_json_error( $data );
		} else {

			//For get from DB: $diseases = json_decode(stripslashes($diseases));

			$user = $db->get_result_by( $db->table_users, "phone = '$phone' ORDER BY ID DESC" );
			if ( isset( $_REQUEST['check_user_exist'] ) && $user ) {
				$user_id = $user->ID;
			}
			else{
				$result = $db->insert( $db->table_users, compact(
					'age',
					'gender',
					'height',
					'weight',
					'diseases',
					'phone',
					'fullname',
					'sms_adv'
				) );

				$user_id = $db->wpdb->insert_id;
			}

			$_SESSION['signup_user_id'] = $user_id;

			wp_send_json_success();
		}
	}
}

//------------------------------------------------------------------

add_action( "wp_ajax_plan_details_ajax", "plan_details_ajax" );
add_action( "wp_ajax_nopriv_plan_details_ajax", "plan_details_ajax" );

function plan_details_ajax() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax_nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	if ( isset( $_REQUEST ) ) {

		$plan_id = $_REQUEST['plan_id'];

		$data = [
			'errMsg'             => 0,
			'plan_duration_name' => '',
			'plan_name'          => '',
			'plan_options'       => '',
			'plan_lined_price'   => '',
			'plan_percentage'    => '',
			'plan_price'         => '',
		];

		$errMsg = '';

		$db = new SarehalDbManager();

		$plan = $db->get_row( $db->table_plans, esc_sql( $plan_id ) );
		if ( ! $plan ) {
			$errMsg .= 'حطا در انجام عملیات!';
		}

		if ( $errMsg !== '' ) {
			$data['errMsg'] = $errMsg;
			wp_send_json_error( $data );
		} else {
			$data['plan_duration_name'] = $db->get_row( $db->table_plans_durations, $plan->duration_id )->name;

			$data['plan_name'] = $plan->name;

			$plan_options = '';
			$options      = unserialize( $plan->options );
			if ( $options ):
				foreach ( $options as $option_id => $option ):
					if ( $option['active'] ):
						$plan_options .= '<li class="my-2">' . $db->get_row( $db->table_plans_options, $option_id )->name . '</li>';
					endif;
				endforeach;
			endif;

			$data['plan_options'] = $plan_options;

			if ( ! empty( $plan->lined_price ) ) {
				$data['plan_lined_price'] = number_format( $plan->lined_price );

//            $data['plan_percentage'] = floor(((intval($plan->lined_price) - intval($plan->price)) / intval($plan->lined_price) * 100) - 9);

				$data['plan_percentage'] = floor( ( 1 - ( intval( $plan->price ) / ( intval( $plan->lined_price ) * 1.09 ) ) ) * 100 );
			}


			$data['plan_price'] = number_format( $plan->price );

			wp_send_json_success( $data );
		}

	}
}

//------------------------------------------------------------------

add_action( "wp_ajax_discount_check_ajax", "discount_check_ajax" );
add_action( "wp_ajax_nopriv_discount_check_ajax", "discount_check_ajax" );

function discount_check_ajax() {
	$nonce = $_POST['nonce'];
	if ( ! wp_verify_nonce( $nonce, 'ajax_nonce' ) ) {
		die( 'Nonce value cannot be verified.' );
	}

	if ( isset( $_REQUEST ) ) {

		$discount_code = $_REQUEST['discount_code'];

		$data = [
			'msg'                 => '',
			'discount_percentage' => '',
			'plan_price'          => '',
		];

		$errMsg = '';

		$db = new SarehalDbManager();

		$user_id = isset( $_SESSION['signup_user_id'] ) ? 1 : 0;
		if ( ! $user_id ) {
			$errMsg = 'خطا در انجام عملیات!';
		}

		$user_phone = $db->get_row( $db->table_users, $_SESSION['signup_user_id'] )->phone;

		if (isset($_REQUEST['runtime_phone'])){
			$is_valid_phone = preg_match('/^(\+98|0)?9\d{9}$/', $_REQUEST['runtime_phone']);
			$user_phone = $is_valid_phone ? $_REQUEST['runtime_phone'] : null;
		}

		if ( ! $user_phone ) {
			$errMsg = 'خطا در انجام عملیات!';
		}

		$plan = $db->get_row( $db->table_plans, esc_sql( $_REQUEST['plan_id'] ) );
		if ( ! $plan ) {
			$errMsg = 'خطا در انجام عملیات!';
		}

		$discount = $db->get_result_by( $db->table_discounts, "code='$discount_code'" );
		if ( ! $discount ) {
			$errMsg = 'کد تخفیف وجود ندارد!';
		}

		if ( $user_phone && $discount && $plan ) {
			if ( ! empty( $discount->plans ) && ! in_array( $plan->ID, unserialize( $discount->plans ) ) ) {
				$errMsg = 'کد تخفیف مربوط به این اشتراک نمی باشد!';
			}

			$usable_count = $db->get_count_where( $db->table_used_discounts, "discount_id='$discount->ID'" );
			if ( $discount->usable_count != - 1 && $usable_count >= $discount->usable_count ) {
				$errMsg = 'کد تخفیف منقضی شده!';
			}

			$usable_person_count = $db->get_count_where( $db->table_used_discounts, "discount_id='$discount->ID' AND user_phone='$user_phone'" );
			if ( $discount->usable_person_count != - 1 && $usable_person_count >= $discount->usable_person_count ) {
				$errMsg = 'شما قبلا از این کد تخفیف استفاده کرده اید!';
			}
		}

		if ( $errMsg !== '' ) {
			$data['msg'] = $errMsg;
			wp_send_json_error( $data );
		} else {
			$_SESSION['payment_discount']  = $discount->price;
			$_SESSION['discount_id']       = $discount->ID;
			$_SESSION['signup_user_phone'] = $user_phone;

			if ( ! empty( $plan->lined_price ) ) {
				$data['discount_percentage'] = ceil( ( $plan->price / $plan->lined_price ) * ( ( $discount->price / 10 ) / ( $plan->price / 1000 ) ) );
			} else {
				$data['discount_percentage'] = ceil( ( $discount->price / 10 ) / ( $plan->price / 1000 ) );
			}

			$data['plan_price'] = number_format( $plan->price - $discount->price );

			$data['msg'] = 'تخفیف با موفقیت اعمال شد';
			wp_send_json_success( $data );
		}

	}
}