<?php

namespace App\Http\Controllers\Fe;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Programe;
use App\Models\Event;

use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {        
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $this->data['mainBanners']=Banner::where('status',1)->where('position_id','1')->get();
        $this->data['programme']=Programe::where('status',1)->get();
        $this->data['upcomingEvents']=Event::where('status',1)->get();
        $this->data['zoneEvent']=Event::where('status',1)->get();

        $this->setMetaData();
 
        return view('fe.home.index', $this->data); 
    }



    
}
