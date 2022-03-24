<?php

namespace Insyghts\Hubstaff\Services;

use Exception;
use Illuminate\Support\Facades\Session;
use Insyghts\Hubstaff\Models\HubstaffConfig;
use Insyghts\Hubstaff\Models\ServerTimestamp;
use DB;

class HubstaffServerService
{
    function __construct()
    {  
    }

    public function getTimestamp()
    {
        $response = [
            'success' => false,
            'data' => "Something went wrong",
        ];
        $timestring = strtotime(gmdate('Y-m-d G:i:s')) * 1000;
        $hubstaffConfig = DB::table('hubstaff_configs')->first();
        if($hubstaffConfig){
            $response['success'] = true;
            $response['data'] = $hubstaffConfig;
    
        }
        if($timestring){
            $response['success'] = true;
            $response['data']->timestamp = $timestring;
        }
       

        return $response;
    }

    public function generateDummyData()
    {
                
    }
}
