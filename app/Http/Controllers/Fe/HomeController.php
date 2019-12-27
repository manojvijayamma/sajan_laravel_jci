<?php

namespace App\Http\Controllers\Fe;

use Illuminate\Http\Request;

use App\Models\Banner;
use App\Models\Event;
use App\Models\Zone;
use App\Models\PresidentCorner;

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
        $curDate=date("Y-m-d"); 
        $this->data['mainBanners']=Banner::where('status',1)->where('position_id','1')->get();  

        $this->data['upcomingEvents']=Event::where('status',1)->where('identifier','event')->where('event_date','>=',$curDate)->get();
        $this->data['zoneData']=Zone::where('status',1)->get();
        $this->data['presidentData']=PresidentCorner::find(1);

        $this->setMetaData();
 
        return view('fe.home.index', $this->data); 
    }



    
}
