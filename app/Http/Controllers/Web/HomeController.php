<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Sidemenu;
use App\MenuHasDropdown;
use App\PradeshSabhaSadasya;
// remote table
use App\TblRemoteNotice;
use App\TblRemoteYearlyBudget;

class HomeController extends Controller
{
    public function index()
    {
        $page_name = "Welcome";
        $remote_notices = TblRemoteNotice::orderBy('id','DESC')->take(10)->get();
        $remote_yearly_budgets = TblRemoteYearlyBudget::orderBy('id','DESC')->take(10)->get();
        return view('web.home', compact(['page_name','remote_notices','remote_yearly_budgets']));
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
            
        // var_dump($type); die();
            $modelName = '\\App\\' . $model;
            $datas = $modelName::where('type',$type)->get();
            return view('web.'.$page, compact(['datas']));
            
        }
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
}
