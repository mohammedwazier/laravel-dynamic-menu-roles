<?php

use MenuModel;

class Helpers {
    public static function encodeId($value){
        return Self::generateRandomString(20).bin2hex($value);
    }

    public static function decodeId($value){
        return hex2bin(substr($value, 20));
    }

    public static function getMenuList(){
        if(Session::has('getMenuList')){
            return Session::get('getMenuList');
        }
        $menuHeader = MenuModel::where('menu_parent', 0)->orderBy('menu_sort_header', 'ASC')->get();
        for ($i = 0; $i < sizeof($menuHeader); $i++) {
            $item = $menuHeader[$i];
            $subMenu = MenuModel::where('menu_parent', $item->id)->orderBy('menu_sort', 'ASC')->get();
            foreach($subMenu as $value){
                $value->check = RoleHasMenu::where('id_role', Self::getRoleID())->where('id_menu', $value->id)->first() ? true : false;
            }
            $menuHeader[$i]['check'] = RoleHasMenu::where('id_role', Self::getRoleID())->where('id_menu', $item->id)->first() ? true : false;
            $menuHeader[$i]['data'] = $subMenu;
        }
        Session::put('getMenuList', $menuHeader);
        return $menuHeader;
    }

    public static function getRoleIDSession(){
        $data = UserAdminModel::where('id_user', Session::get('user_data')->id_user)->first()->level;
        return $data;
    }
}