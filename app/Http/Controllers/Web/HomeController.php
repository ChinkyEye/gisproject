<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
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
use App\Notice;
use App\Introduction;
use App\Slider;
use App\CorePerson;
use App\MantralayaHasUser;
use App\Gallery;
use App\GalleryHasImage;
use App\IsthaniyaTaha;
use App\FiscalYear;



class HomeController extends Controller
{
    public function index()
    {
        $page_name = "Welcome";
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://hellocm.p1.gov.np/api/get_grievance_chart_table');
        $remotehello = json_decode($res->getBody()->getContents(), true);
        foreach($remotehello as $hello){
            $remotehellocm = $hello;
        }

        $scroll_notice = TblRemoteNotice::orderBy('id','DESC')->where('is_scroll','1')->where('is_active','1')->take(10)->get();
        $remote_notices = TblRemoteNotice::orderBy('date_np','DESC')->whereIn('page',[1,3,6])->take(5)->get();
        $remote_yearly_budgets = TblRemoteYearlyBudget::orderBy('date_np','DESC')->where('page','7')->take(5)->get();
        $procedures = TblRemoteYearlyBudget::orderBy('date_np','DESC')->whereIn('page',[3,4])->take(5)->get();
        $remote_kharid_bolpatras = TblRemoteNotice::orderBy('date_np','DESC')->where('page','2')->take(5)->get();
        $remote_ain_kanuns = TblRemoteYearlyBudget::orderBy('date_np','DESC')->whereIn('page',[1,2])->take(5)->get();
        $remote_sewa_pravas = TblRemoteSewaPrava::orderBy('date_np','DESC')->take(5)->get();
        $remote_e_farums = TblRemoteEFarum::orderBy('date_np','DESC')->take(5)->get();
        $remote_prativedans = TblRemotePrativedan::orderBy('date_np','DESC')->take(5)->get();
        $remote_publications = TblRemotePublication::orderBy('date_np','DESC')->take(5)->get();
        $introductions = Introduction::orderBy('date_np','DESC')->where('is_active','1')->get();
        $sliders = Slider::orderBy('date_np','DESC')->where('is_active','1')->get();
        $coreperson = CorePerson::orderBy('date_np','DESC')->where('is_top','1')->where('is_active','1')->get();
        $mantralaya = MantralayaHasUser::orderBy('sort_id','DESC')->where('is_active','1')->get();
        $except_locallevel = MantralayaHasUser::orderBy('sort_id','DESC')
                                                ->where('is_active','1')
                                                ->where('is_local_level','!=','1')
                                                ->orWhereNull('is_local_level')
                                                ->get();
        // dd($except_locallevel);
        $isthaniya = IsthaniyaTaha::orderBy('id','DESC')->get();

        return view('web.home', compact(['page_name','remote_notices','remote_yearly_budgets','remote_kharid_bolpatras','remote_ain_kanuns','remote_sewa_pravas','remote_e_farums','remote_prativedans','remote_publications','scroll_notice','introductions','sliders','coreperson','mantralaya','isthaniya','remotehellocm','procedures','except_locallevel']));
    }

    public function link(Request $request, $link,$link2 = Null)
    {
        // var_dump($link,$link2); die();
        if($link == '/'){
           $page = 'home';
           $datas = array();
           return view('web.'.$page, compact(['datas']));
        }
        else{
            if($link2 == Null){
                $linkf = $link;
            }
            else{
                $linkf = $link.'/'.$link2;
            }
            $model = Menu::where('link',$linkf)->value('model');
            $page = Menu::where('link',$linkf)->value('page');
            $type = Menu::where('link',$linkf)->value('type');
            $name = Menu::where('link',$linkf)->value('name');
            $level = Menu::where('link',$linkf)->value('level');
            $is_api = Menu::where('link',$linkf)->value('is_api');
            $api_key = Menu::where('link',$linkf)->value('api_key');
            $menu_id = Menu::where('link',$linkf)->value('id');
            Menu::find($menu_id)->increment('views');

            $modelName = '\\App\\' . $model;
            if($is_api == '1'){
                    $datas = $modelName::orderBy('id','DESC')->where('api_key',$api_key);
                }
            else{
                if($type == '1'){
                $datas = $modelName::orderBy('id','DESC');
            }
            else{
                    $datas = $modelName::orderBy('id','DESC')->where('type',$type);
                }
            }
            
            $datas = $datas->paginate(50);
            $search_val = $api_key;
            $type = $name;
            // var_dump($search_val); die();
            $years = FiscalYear::where('is_active',1)->get();
        $mantralayas = MantralayaHasUser::where('is_active',1)->where('is_main','2')->get();
        if($is_api){
            $lang = App::getLocale();
            if($lang == 'en'){
                $breadcum = Menu::where('api_key',$api_key)->value('name');
            }
            else{
                $breadcum = Menu::where('api_key',$api_key)->value('name_np');
            }
            return view('web.'.$page, compact(['datas','link','link2','name','level','type','years','mantralayas','search_val','breadcum']));
        }
        else{
            return view('web.'.$page, compact(['datas','link','link2','name','level','type','years','mantralayas']));

        }
        }
    }

    public function detail(Request $request, $link, $id)
    {
        // var_dump($link); die();
        $model = Menu::where('link',$link)->value('model');
        $name = Menu::where('link',$link)->value('name');
        $level = Menu::where('link',$link)->value('level');
        // var_dump($type); die();
        $modelName = '\\App\\' . $model;
        $datas = $modelName::orderBy('id','DESC')->find($id);
        return view('web.view-more', compact(['datas','link','name','level']));
            
    }

    public function more(Request $request, $link,$link2, $id)
    {
        // var_dump($link,$link2); die();
        $linkf = $link.'/'.$link2;
        $model = Menu::where('link',$linkf)->value('model');
        $name = Menu::where('link',$linkf)->value('name');
        $level = Menu::where('link',$linkf)->value('level');
        // var_dump($type); die();
        $modelName = '\\App\\' . $model;
        $datas = $modelName::orderBy('id','DESC')->find($id);
        // dd($datas);
        return view('web.view-more', compact(['datas','link','link2','name','level']));
            
    }

    public function sidelink(Request $request, $link)
    {
        // dd($link);
        $model = Sidemenu::where('link',$link)->value('model');
        $page = Sidemenu::where('link',$link)->value('page');
        // $type = Sidemenu::where('link',$link)->value('type');

        $modelName = '\\App\\' . $model;
        // var_dump($modelName); die();
        if($link == 'mantriparishad'){
            $datas = $modelName::where('is_start','0')->where('is_top','1')->orderBy('sort_id','ASC')->get();
        }
        elseif ($link == 'karyalaya-pramukh') {
             $datas = $modelName::where('is_top','0')->where('is_start','1')->get();
        }
        else{
            $datas = $modelName::get();
        }
        $name = "";
        $level = "";
        return view('web.'.$page, compact(['datas','name','level']));
    }

    public function sidelinkmore(Request $request, $id)
    {
        $datas = MantralayaHasUser::select('id', 'longitude', 'latitude','user_id')->find($id);
        return view('web.mantralaya-detail', [
            'datas' => $datas
        ]); 
            
    }
    public function sthaniyatahamore(Request $request, $id)
    {
        $datas = MantralayaHasUser::select('id', 'longitude', 'latitude','user_id')->find($id);
        return view('web.sthaniyataha-detail', [
            'datas' => $datas
        ]); 
            
    }

    public function list() {
        return view('web.list');
    }

    public function gallery() {
        $pages = "Gallery";
        return view('web.gallery-folder', compact('pages'));
    }

    public function gallerySlug($slug) {
        $pages = "Gallery Name";
        $gallery_id = Gallery::where('slug',$slug)->value('id');
        $galleryhasimages = GalleryHasImage::where('gallery_id',$gallery_id)->get();
        return view('web.gallery', compact('pages','galleryhasimages'));
    }

    public function switchLang(Request $request)
    {
        // dd($request->lang);
        // dd(session(['APP_LOCALE' => $request->lang]));
        session(['APP_LOCALE' => $request->lang]);
        return back();
    }
    public function noticescroll(Request $request,$id)
    {
        // $linkf = $link.'/'.$link2;
        $name = "Notice";
        $level = '2';
        $link = 'notice';
        $link2 = Notice::where('id',$id)->value('title');
        $datas = Notice::orderBy('id','DESC')->find($id);
        return view('web.view-more', compact(['datas','link','link2','name','level']));
    
    }
}
