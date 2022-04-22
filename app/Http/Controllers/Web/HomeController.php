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



class HomeController extends Controller
{
    public function index()
    {
        $page_name = "Welcome";
        $scroll_notice = Notice::orderBy('id','DESC')->where('scroll','1')->where('is_active','1')->take(10)->get();
        $remote_notices = TblRemoteNotice::orderBy('id','DESC')->take(10)->get();
        $remote_yearly_budgets = TblRemoteYearlyBudget::orderBy('id','DESC')->take(10)->get();
        $remote_kharid_bolpatras = TblRemoteKharidBolpatra::orderBy('id','DESC')->take(10)->get();
        $remote_ain_kanuns = TblRemoteYearlyBudget::orderBy('id','DESC')->take(10)->get();
        $remote_sewa_pravas = TblRemoteSewaPrava::orderBy('id','DESC')->take(10)->get();
        $remote_e_farums = TblRemoteEFarum::orderBy('id','DESC')->take(10)->get();
        $remote_prativedans = TblRemotePrativedan::orderBy('id','DESC')->take(10)->get();
        $remote_publications = TblRemotePublication::orderBy('id','DESC')->take(10)->get();
        $offices = Office::orderBy('id','DESC')->get();
        $introductions = Introduction::orderBy('id','DESC')->where('is_active','1')->get();
        $sliders = Slider::orderBy('id','DESC')->where('is_active','1')->get();
        $coreperson = CorePerson::orderBy('id','DESC')->where('is_top','1')->where('is_active','1')->get();
        $mantralaya = MantralayaHasUser::orderBy('id','DESC')->where('is_active','1')->get();

        return view('web.home', compact(['page_name','remote_notices','remote_yearly_budgets','remote_kharid_bolpatras','remote_ain_kanuns','remote_sewa_pravas','remote_e_farums','remote_prativedans','remote_publications','offices','scroll_notice','introductions','sliders','coreperson','mantralaya']));
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
            
        // var_dump($type); die();
            $modelName = '\\App\\' . $model;
            if($type == '1'){
                $datas = $modelName::orderBy('id','DESC');
            }
            else{
                $datas = $modelName::orderBy('id','DESC')->where('type',$type);
            }
            $datas = $datas->get();
            return view('web.'.$page, compact(['datas','link','link2','name','level']));
            
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
        if($link == 'mantriparishad'){
            $datas = $modelName::where('is_top','1')->get();
        }
        elseif ($link == 'karyala-pramuk') {
             $datas = $modelName::where('is_start','1')->get();
        }
        else{
            $datas = $modelName::get();
        }
        $name = "";
        $level = "";
        return view('web.'.$page, compact(['datas','name','level']));
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
}
