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

        $this->data['upcomingEvents']=Event::where('status',1)->where('featured','1')->where('event_date','>=',$curDate)->get();
        $this->data['zoneData']=DB::table('zones')->join('events', 'events.zone_id', '=', 'zones.id')->select('zones.title as zone','events.slug_url','events.image')->where('zones.status',1)->where('events.status',1)->where('events.identifier','zoneevent')->where('events.featured','1')->get();
        $this->data['presidentData']=PresidentCorner::find(1);

        $this->setMetaData();
 
        return view('fe.home.index', $this->data); 
    }



    
}
