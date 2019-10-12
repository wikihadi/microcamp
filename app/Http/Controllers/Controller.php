<?php

namespace App\Http\Controllers;

use App\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function visit($uid){
        $log = new Log;
        $log->user_id = $uid;
        $log->ip = request()->ip();
        $log->log = 'visit';
        $log->content = 'User:'.$uid.' visited with ip: ' . request()->ip();
        $log->page = request()->url();
        $log->save();
    }
}
