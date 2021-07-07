<?php

class SarehalPayment
{
    private $merchant_key = '19fcb5ff-74dc-49fd-b300-4423e6d943a2';

    private $sms_merchant_key = '2F705636674E624551724768634E4945444D56744C7A494144592F3877554145512F5A494F774F4265556B3D';

    public $callback_url = 'https://sarehal.com/order-received/';

    public $amount = 10000;

    public $description = 'خرید از سرحال';

    public $phone = '';

//    public $email = '';
//
//    public $fullname = '';

    public $plan_id;

    public $payment_messages = array(
        -9 => 'خطای اعتبار سنجی',
        -10 => 'ای پی و يا مرچنت كد پذيرنده صحيح نيست',
        -11 => 'مرچنت کد فعال نیست لطفا با تیم پشتیبانی ما تماس بگیرید',
        -12 => 'تلاش بیش از حد در یک بازه زمانی کوتاه.',
        -15 => 'ترمینال شما به حالت تعلیق در آمده با تیم پشتیبانی تماس بگیرید',
        -16 => 'سطح تاييد پذيرنده پايين تر از سطح نقره اي است.',
        100 => 'عملیات موفق',
        -30 => 'اجازه دسترسی به تسویه اشتراکی شناور ندارید',
        -31 => 'حساب بانکی تسویه را به پنل اضافه کنید مقادیر وارد شده واسه تسهیم درست نیست',
        -33 => 'درصد های وارد شده درست نیست',
        -34 => 'مبلغ از کل تراکنش بیشتر است',
        -35 => 'تعداد افراد دریافت کننده تسهیم بیش از حد مجاز است',
        -50 => 'مبلغ پرداخت شده با مقدار مبلغ در وریفای متفاوت است',
        -51 => 'پرداخت ناموفق بود! لطفا دوباره تلاش کنید',
        -52 => 'خطای غیر منتظره با پشتیبانی تماس بگیرید',
        -53 => 'اتوریتی برای این مرچنت کد نیست',
        -54 => 'اتوریتی نامعتبر است',
        101 => 'تراکنش وریفای شده',
    );

    public function do_payment(callable $callback = null)
    {
        $pay_data = [
            "merchant_id" => $this->merchant_key,
            "amount" => $this->amount,
            "callback_url" => $this->callback_url,
            "description" => $this->description,
        ];
        $jsonData = json_encode($pay_data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/request.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v1');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);

        if ($callback) {
            $callback($this, $err, $result, $pay_data);
        }
    }

    public function verify_payment($authority, $status, callable $callback_success, callable $callback_error)
    {
        $pay_data = [
            "merchant_id" => $this->merchant_key,
            "authority" => $authority,
            "amount" => $_SESSION['payment_amount'],
        ];
        $jsonData = json_encode($pay_data);
        $ch = curl_init('https://api.zarinpal.com/pg/v4/payment/verify.json');
        curl_setopt($ch, CURLOPT_USERAGENT, 'ZarinPal Rest Api v4');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ));
        $result = curl_exec($ch);
        $err = curl_error($ch);
        $result = json_decode($result, true, JSON_PRETTY_PRINT);
        curl_close($ch);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $transaction = $this->save_transaction($result);

            $this->insert_used_discount();

            if ($result['data']['code'] == 100) {
                $sms = $this->send_sms();
                $callback_success($this, $result);
            } else {
                $callback_error($this, $result);
            }

            //$this->unset_sessions();
        }
    }

    public function save_transaction($response)
    {
        $paid = $response['data']['code'] == 100 ? 1 : 0;
        $status_code = isset($response['data']['code']) ? $response['data']['code'] : $response['errors']['code'];
        $amount = $_SESSION['payment_amount'];
        $ref_code = isset($response['data']['ref_id']) ? $response['data']['ref_id'] : '';
        $card = isset($response['data']['card_pan']) ? $response['data']['card_pan'] : '';
        $user_id = $_SESSION['signup_user_id'];
        $plan_id = $_SESSION['payment_plan_id'];

        if (!empty($_SESSION['discount_id'])){
            $discount_id = $_SESSION['discount_id'];
            $has_discount = 1;
        }
        else{
            $discount_id = null;
            $has_discount = 0;
        }

        $db = $this->get_instance_db_manager();
        $db->insert($db->table_transactions, compact('paid', 'status_code', 'amount', 'ref_code', 'card', 'user_id', 'plan_id', 'has_discount', 'discount_id'));
    }

    public function save_user()
    {
        $name = $_SESSION['payment_fullname'];
        $phone = $_SESSION['payment_phone'];
        $email = $_SESSION['payment_email'];
        $type = 'customer';

        $db = $this->get_instance_db_manager();

        if ($this->is_user_unique($_SESSION['payment_phone'], 'customer')) {
            return $db->insert($db->table_users, compact('name', 'phone', 'email', 'type'));
        } else {
            return $db->get_result_by($db->table_users, "phone = '$phone' AND type = '$type'");
        }
    }

    public function is_user_unique($phone, $type)
    {
        $db = $this->get_instance_db_manager();
        return !($db->get_result_by($db->table_users, "phone = '$phone' AND type = '$type'"));
    }

    public function insert_used_discount()
    {
        $user_phone = $_SESSION['signup_user_phone'];

        $discount_id = $_SESSION['discount_id'];

        $db = $this->get_instance_db_manager();

        $row = $db->insert($db->table_discounts, compact(
            'user_phone',
            'discount_id'
        ));
    }

    public function get_instance_db_manager()
    {
        return new SarehalDbManager();
    }

    public function get_sms_content()
    {
        $db = $this->get_instance_db_manager();
        $plan = $db->get_row($db->table_plans, $_SESSION['payment_plan_id']);
        $plan_duration = $db->get_row($db->table_plans_durations, $plan->duration_id)->duration;
        $content = "سرِحالیِ عزیز!

با تشکر از همراهی شما، پرداخت شما موفقیت‌آمیز بود و اشتراک سرِحال شما از امروز تا $plan_duration روز فعال است. در صورت وجود هرگونه مشکل یا سؤال، از طریق لینک زیر با ما در تماس باشید 👇

https://wa.me/989901100715";
        return urlencode($content);
    }

    public function send_sms()
    {
        $receptor = $_SESSION['payment_phone'];
        $message = $this->get_sms_content();

        return wp_remote_get("https://api.kavenegar.com/v1/$this->sms_merchant_key/sms/send.json?receptor=$receptor&message=$message");
    }

    public function unset_sessions()
    {
        unset($_SESSION['payment_phone']);
        unset($_SESSION['payment_fullname']);
        unset($_SESSION['payment_email']);
        unset($_SESSION['payment_amount']);
        unset($_SESSION['payment_plan_id']);
    }

    public function validation($fields)
    {
        extract($fields);
        $errMsg = '';

        if (!$this->isNumeric($phone) || !$this->isValidPhone($phone) || strlen($phone) < 11) {
            $errors['phone'] = true;
        }

        if (!$this->isValidName($fullname)) {
            $errors['fullname'] = true;
        }

        if (isset($email) && strlen($email)) {
            if (!$this->isValidEmail($email)) {
                $errors['email'] = true;
            }
        }

        foreach ($errors as $error => $hasErr) {
            switch ($error) {
                case 'phone':
                    if ($hasErr) $errMsg .= 'شماره همراه را صحیح وارد کنید!' . '<br>';
                    break;
                case 'fullname':
                    if ($hasErr) $errMsg .= 'نام و نام خانوادگی را صحیح وارد کنید!' . '<br>';
                    break;
                case 'email':
                    if ($hasErr) $errMsg .= 'ایمیل را صحیح وارد کنید!' . '<br>';
                    break;
            }
        }

        return $errMsg;
    }

    public function userValidation($fields)
    {
        extract($fields);
        $errMsg = '';

        if (!$this->isNumeric($phone) || !$this->isValidPhone($phone) || strlen($phone) < 11) {
            $errors['phone'] = true;
        }

        if (!$this->isValidName($fullname)) {
            $errors['fullname'] = true;
        }

        if (!intval($height) || !(strlen($height) > 2 && strlen($height) < 4)){
            $errors['height'] = true;
        }

        if (!intval($weight) || !(strlen($weight) > 1 && strlen($weight) < 4)){
            $errors['weight'] = true;
        }

        if (!intval($age) || empty($age)){
            $errors['age'] = true;
        }

        if (empty($diseases)){
            $errors['diseases'] = true;
        }

        if (empty($gender)){
            $errors['gender'] = true;
        }

        foreach ($errors as $error => $hasErr) {
            switch ($error) {
                case 'phone':
                    if ($hasErr) $errMsg .= 'شماره خود را صحیح وارد کنید!' . '<br>';
                    break;
                case 'fullname':
                    if ($hasErr) $errMsg .= 'نام و نام خانوادگی خود را صحیح وارد کنید!' . '<br>';
                    break;
                case 'age':
                    if ($hasErr) $errMsg .= 'سن خود را صحیح وارد کنید!' . '<br>';
                    break;
                case 'gender':
                    if ($hasErr) $errMsg .= 'جنسیت را صحیح انتخاب کنید!' . '<br>';
                    break;
                case 'height':
                    if ($hasErr) $errMsg .= 'قد خود را صحیح وارد کنید!' . '<br>';
                    break;
                case 'weight':
                    if ($hasErr) $errMsg .= 'وزن خود را صحیح وارد کنید!' . '<br>';
                    break;
                case 'diseases':
                    if ($hasErr) $errMsg .= 'بخش بیماری ها را صحیح انتخاب کنید!' . '<br>';
                    break;
            }
        }

        return $errMsg;
    }

    function isValidPhone($val)
    {
        return preg_match('/^(\+98|0)?9\d{9}$/', $val);
    }

    function isNumeric($val)
    {
        return preg_match('/^\\d+$/', $val);
    }

    function isValidName($val)
    {
//        return !preg_match('/[a-zA-Z0-9]/', $val) && strlen($val) >= 3;
        return strlen($val) >= 3;
    }

    function isValidEmail($val)
    {
        return preg_match('/^\\b[A-Z0-9._%-]+@[A-Z0-9.-]+\\.[A-Z]{2,4}\\b$/i', $val);
    }
}