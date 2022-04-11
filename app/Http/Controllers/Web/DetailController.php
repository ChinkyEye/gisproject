<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuHasDropdown;
// remote table
use App\TblRemoteNotice;
use App\TblRemoteYearlyBudget;

class DetailController extends Controller
{
    public function index(Request $request, $type)
    {
        switch ($type) {
            case 'suchana':
            $model = TblRemoteNotice::orderBy('id','DESC');
                break;
            case 'yearly-budget':
            $model = TblRemoteYearlyBudget::orderBy('id','DESC');
                break;
            default:
                # code...
                break;
        }
        $datas = $model->get();
        return view('web.detail', compact(['datas']));
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
