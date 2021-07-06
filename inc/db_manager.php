<?php

class SarehalDbManager
{
    public $wpdb;

    public $table_plans;
    public $table_plans_options;
    public $table_plans_durations;
    public $table_discounts;
    public $table_used_discounts;
    public $table_transactions;
    public $table_users;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;

        $this->table_plans = $this->wpdb->prefix . 'sarehal_plans';
        $this->table_plans_options = $this->wpdb->prefix . 'sarehal_plans_options';
        $this->table_plans_durations = $this->wpdb->prefix . 'sarehal_plans_durations';
        $this->table_discounts = $this->wpdb->prefix . 'sarehal_discounts';
        $this->table_used_discounts = $this->wpdb->prefix . 'sarehal_used_discounts';
        $this->table_transactions = $this->wpdb->prefix . 'sarehal_transactions';
        $this->table_users = $this->wpdb->prefix . 'sarehal_users';

        $this->create_table_plans();
        $this->create_table_plans_options();
        $this->create_table_plans_durations();
        $this->create_table_discounts();
        $this->create_table_used_discounts();
        $this->create_table_transactions();
        $this->create_table_users();
    }

    public function create_table_plans()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_plans ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `name` varchar(255) NOT NULL, ";
        $sql .= "  `duration_id` int(11) NOT NULL, ";
        $sql .= "  `price` varchar(20) NOT NULL, ";
        $sql .= "  `slug` varchar(255) NOT NULL, ";
        $sql .= "  `options` TEXT, ";
        $sql .= "  `payable` BOOLEAN NOT NULL, ";
        $sql .= "  FOREIGN KEY (duration_id) REFERENCES $this->table_plans_durations(ID), ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_plans_options()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_plans_options ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `name` varchar(255) NOT NULL, ";
        $sql .= "  `show_on_plans_page` BOOLEAN NOT NULL, ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_plans_durations()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_plans_durations ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `name` varchar(255) NOT NULL, ";
        $sql .= "  `duration` varchar(50) NOT NULL, ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_discounts()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_discounts ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `name` varchar(100) NOT NULL, ";
        $sql .= "  `code` varchar(20) NOT NULL, ";
        $sql .= "  `price` varchar(20) NOT NULL, ";
        $sql .= "  `usable_count` int(6) DEFAULT -1 NULL, ";
        $sql .= "  `usable_person_count` int(6) DEFAULT -1 NULL, ";
        $sql .= "  `plans` text NULL, ";
        $sql .= "  `expire_at` datetime NOT NULL, ";
        $sql .= "  `created_at` datetime DEFAULT CURRENT_TIMESTAMP NOT NULL, ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_used_discounts()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_used_discounts ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `discount_id` int(11) NOT NULL, ";
        $sql .= "  `user_phone` varchar(20) NOT NULL, ";
        $sql .= "  `created_at` datetime DEFAULT CURRENT_TIMESTAMP NOT NULL, ";
        $sql .= "  FOREIGN KEY (discount_id) REFERENCES $this->table_discounts(ID), ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_transactions()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_transactions ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `paid` BOOLEAN NOT NULL, ";
        $sql .= "  `status_code` int(10) NOT NULL, ";
        $sql .= "  `amount` varchar(30) NOT NULL, ";
        $sql .= "  `ref_code` varchar(30) NULL, ";
        $sql .= "  `card` varchar(30) NULL, ";
        $sql .= "  `user_id` int(11) NOT NULL, ";
        $sql .= "  `plan_id` int(11) NOT NULL, ";
        $sql .= "  `date` DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, ";
        $sql .= "  FOREIGN KEY (user_id) REFERENCES $this->table_users(ID), ";
        $sql .= "  FOREIGN KEY (plan_id) REFERENCES $this->table_plans(ID), ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create_table_users()
    {
        $sql = "CREATE TABLE IF NOT EXISTS $this->table_users ( ";
        $sql .= "  `ID` int(11) NOT NULL auto_increment, ";
        $sql .= "  `fullname` varchar(255) NULL, ";
        $sql .= "  `phone` varchar(30) NOT NULL, ";
        $sql .= "  `age` varchar(6) NOT NULL, ";
        $sql .= "  `gender` varchar(10) NOT NULL, ";
        $sql .= "  `height` varchar(6) NOT NULL, ";
        $sql .= "  `weight` varchar(6) NOT NULL, ";
        $sql .= "  `diseases` TEXT NOT NULL, ";
        $sql .= "  `sms_adv` BOOLEAN NOT NULL, ";
        $sql .= "  `date` DATETIME DEFAULT CURRENT_TIMESTAMP, ";
        $sql .= "  PRIMARY KEY (`ID`) ) ";

        $this->create($sql);
    }

    public function create($sql)
    {
        $charset_collate = $this->wpdb->get_charset_collate();

        $sql .= $charset_collate;

        require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }


    public function get_count($tableName)
    {
        return $this->wpdb->get_var("SELECT COUNT(*) FROM $tableName");
    }

    public function get_count_where($tableName, $where)
    {
        return $this->wpdb->get_var("SELECT COUNT(*) FROM $tableName WHERE $where");
    }

    public function get_row($tableName, $id)
    {
        return $this->wpdb->get_row("SELECT * FROM $tableName WHERE `ID` = $id ORDER BY ID DESC");
    }

    public function get_row_last($tableName, $order = 'ASC')
    {
        return $this->wpdb->get_row("SELECT * FROM $tableName ORDER BY ID $order LIMIT 1");
    }

    public function get_result_by($tableName, $where)
    {
        return $this->wpdb->get_row("SELECT * FROM $tableName WHERE $where");
    }

    public function get_results($tableName, $order = 'ASC', $query = '')
    {
        return $this->wpdb->get_results("SELECT * FROM $tableName ORDER BY ID $order $query");
    }


    public function delete($tableName, $id)
    {
        return $this->wpdb->delete($tableName, array('ID' => $id));
    }


    public function update($tableName, $args, $id)
    {
        return $this->wpdb->update($tableName, $args, array('ID' => $id));
    }

    public function insert($tableName, $args)
    {
        return $this->wpdb->insert($tableName, $args);
    }
}

new SarehalDbManager();