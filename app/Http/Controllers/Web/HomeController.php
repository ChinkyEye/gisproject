<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuHasDropdown;
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
        
        // var_dump($model,$page);
        $modelName = '\\App\\' . $model;
        $datas = $modelName::where('type',$type)->get();
        return view('web.'.$page, compact(['datas']));
    }
}
