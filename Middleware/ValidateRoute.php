<?php

namespace App\Http\Middleware;

use Closure;

use App\Models\RoleModel;
use App\Models\RoleHasMenu;

use Session;
use Main;
use Log;

class ValidateRoute
{
    public function __construct(){
        $this->role = RoleModel::with('manyMenu', 'manyMenu.singleMenu')->where('role_code', Main::getRoleSession())->first();
        $this->listMenu = collect($this->role->manyMenu);
    }
    public function handle($request, Closure $next){
        if(strtolower($this->role->role_code) === "superadmin"){
            return $next($request);
        }

        try {
            $special = $request->get('special');
            $idPage = $request->get('id-page');
            
            $urlData = str_replace(url(''), "", $request->fullUrl());
            $special = Main::decodeId($special);
            $idPage = Main::decodeId($idPage);

            if(strtolower($special) === "all" && intval($idPage) === 0){
                return $next($request);
            }
            $status = false;
            foreach($this->listMenu as $key => $value){
                if(strpos($request->fullUrl(), $value->singleMenu->menu_url)){
                    $status = true;
                    break;
                }
            }
            if($status){
                return $next($request);
            }
            return redirect()->back()->with(['error' => 'Link Tidak Valid!']);
        } catch (\Throwable $th) {
            Log::critical($th);
            return redirect()->back()->with(['error' => 'Link Tidak Valid!']);
        }
        return $next($request);
    }
}
