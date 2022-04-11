<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\MenuHasDropdown;
// remote table
use App\TblRemoteNotice;
use App\TblRemoteYearlyBudget;
use App\TblRemoteKharidBolpatra;
use App\TblRemoteAainKanun;
use App\TblRemoteSewaPrava;
use App\TblRemoteEFarum;
use App\TblRemotePrativedan;
use App\TblRemotePublication;

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
            case 'kharid-bolpatra':
            $model = TblRemoteKharidBolpatra::orderBy('id','DESC');
                break;
            case 'ain-kanoon':
            $model = TblRemoteAainKanun::orderBy('id','DESC');
                break; 
            case 'sewa-prava':
            $model = TblRemoteSewaPrava::orderBy('id','DESC');
                break;   
            case 'e-farum':
            $model = TblRemoteEFarum::orderBy('id','DESC');
                break;  
            case 'prativedan':
            $model = TblRemotePrativedan::orderBy('id','DESC');
                break;  
            case 'publication':
            $model = TblRemotePublication::orderBy('id','DESC');
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
