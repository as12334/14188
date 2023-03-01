<?php

/* * **********************************************************
 * 
 *     Copyright (c) 2016 DuoRui Technology Studio.
 *     All Rights Reserved.
 * 
 *     http://www.duoruitech.com
 * 
 * *********************************************************** */

defined('G_IN_SYSTEM')or exit('No permission resources.');
System::load_app_class('base', 'member', 'no');

System::load_app_fun('my');
System::load_app_fun('user');
System::load_sys_fun('user');

class search extends base {

    public function __construct() {
        parent::__construct();
        $this->db = System::load_sys_class('model');
    }

    public function init() {
        $txt = $_POST['txt'];

        $select_w = "order by `id` DESC";

        $p = max(1, intval($_GET['p']));

        $end = 10;
        $star = ($p - 1) * $end;
        if($txt){
            $shoplist = $this->db->GetList("select * from `@#_shoplist` where `q_uid` is null and title like '%$txt%' $select_w limit $star,$end");

            $count = $this->db->GetOne("select count(*) n from `@#_shoplist` where `q_uid` is null and title like '%$txt%'");
             $count = $count['n'];
        }
        
        include templates("mobile/index", "search");
    }

}
