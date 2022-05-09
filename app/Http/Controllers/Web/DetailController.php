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
use App\FiscalYear;
use App\MantralayaHasUser;

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
        // dd($datas);
        $years = FiscalYear::where('is_active',1)->get();
        $mantralayas = MantralayaHasUser::where('is_active',1)->get();
        return view('web.detail', compact(['datas','type','years','mantralayas']));
    }

    public function search(Request $request, $type){
        // dd($request,$type);
        $year = $request->year;
        $ministry = $request->ministry;
        $date_np_start = $request->date_np_start;
        $date_np_end = $request->date_np_end;
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
        // dd($model->get());
        if($request->has('year') && $request->get('year')!="")
            {            
                $model = $model->where('date_np','LIKE', "%{$request->year}%");
            }
        if($request->has('ministry') && $request->get('ministry')!="")
            {    
                $model = $model->where('server', $ministry);
            }
        if(($request->has('date_np_start')) || ($request->has('date_np_end')))
            {
                $model = $model->whereBetween('date_np', [$request->date_np_start, $request->date_np_end]);
            }
        $datas = $model->where('is_active','1')->get();
        // dd($datas);
        // var_dump($datas); die();
        $years = FiscalYear::where('is_active',1)->get();
        $mantralayas = MantralayaHasUser::where('is_active',1)->get();
        return view('web.detail', compact(['datas','type','year','ministry','date_np_start','date_np_end','years','mantralayas']));
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
