<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Sidemenu;
use App\MenuHasDropdown;
use App\PradeshSabhaSadasya;
use App\Office;
use App\Usefullink;
// remote table
use App\TblRemoteNotice;
use App\TblRemoteYearlyBudget;
use App\TblRemoteKharidBolpatra;
use App\TblRemoteAainKanun;
use App\TblRemoteSewaPrava;
use App\TblRemoteEFarum;
use App\TblRemotePrativedan;
use App\TblRemotePublication;


class HomeController extends Controller
{
    public function index()
    {
        $page_name = "Welcome";
        $remote_notices = TblRemoteNotice::orderBy('id','DESC')->take(10)->get();
        $remote_yearly_budgets = TblRemoteYearlyBudget::orderBy('id','DESC')->take(10)->get();
        $remote_kharid_bolpatras = TblRemoteKharidBolpatra::orderBy('id','DESC')->take(10)->get();
        $remote_ain_kanuns = TblRemoteAainKanun::orderBy('id','DESC')->take(10)->get();
        $remote_sewa_pravas = TblRemoteSewaPrava::orderBy('id','DESC')->take(10)->get();
        $remote_e_farums = TblRemoteEFarum::orderBy('id','DESC')->take(10)->get();
        $remote_prativedans = TblRemotePrativedan::orderBy('id','DESC')->take(10)->get();
        $remote_publications = TblRemotePublication::orderBy('id','DESC')->take(10)->get();
        $offices = Office::orderBy('id','DESC')->take(10)->get();
        return view('web.home', compact(['page_name','remote_notices','remote_yearly_budgets','remote_kharid_bolpatras','remote_ain_kanuns','remote_sewa_pravas','remote_e_farums','remote_prativedans','remote_publications','offices']));
    }

    public function link(Request $request, $link,$link2 = Null)
    {
        if($link == '/'){
           $page = 'home';
           $datas = array();
           return view('web.'.$page, compact(['datas']));
        }
        else{
            // var_dump($link,$link2); die();
            if($link2 == Null){
                $link = $link;
            }
            else{
                $link = $link.'/'.$link2;
            }
            $model = Menu::where('link',$link)->value('model');
            $page = Menu::where('link',$link)->value('page');
            $type = Menu::where('link',$link)->value('type');
            $name = Menu::where('link',$link)->value('name');
            
        // var_dump($type); die();
            $modelName = '\\App\\' . $model;
            if($type == '1'){
                $datas = $modelName::orderBy('id','DESC');
            }
            else{
                $datas = $modelName::orderBy('id','DESC')->where('type',$type);
            }
            $datas = $datas->get();
            return view('web.'.$page, compact(['datas','link','link2','name']));
            
        }
    }

    public function detail(Request $request, $link,$link2)
    {
        $model = Menu::where('link',$link)->value('model');
        $name = Menu::where('link',$link)->value('name');
        // var_dump($type); die();
        $modelName = '\\App\\' . $model;
        $datas = $modelName::orderBy('id','DESC')->find($link2);
        return view('web.view-more', compact(['datas','link','link2','name']));
            
    }

    public function sidelink(Request $request, $link)
    {
        // dd($link);
        $model = Sidemenu::where('link',$link)->value('model');
        $page = Sidemenu::where('link',$link)->value('page');
        // $type = Sidemenu::where('link',$link)->value('type');

        $modelName = '\\App\\' . $model;
        $datas = $modelName::get();
        return view('web.'.$page, compact(['datas']));
    }

    public function list() {
        return view('web.list');
    }
}
