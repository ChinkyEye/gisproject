<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Helper;

use File;
use Auth;
use Image;
use App\TblRemoteNotice;
use App\TblRemoteYearlyBudget;
use App\TblRemotePrativedan;
use App\TblRemoteCorePerson;

class ApiController extends Controller
{
    public function api(Request $request){
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          $notice = new TblRemoteNotice();
          $notice->remote_id = $request->id;
          $notice->server = $request->server_id;
          $notice->title = $request->title;
          $notice->url = $request->route_url;
          $notice->is_scroll = $request->is_scroll;
          $notice->api_key = $request->api_key;
          $notice->page = $request->page;
          $notice->date_np = $request->date_np;
          $notice->ministry = $request->ministry;
          $notice->save();
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function apidelete(Request $request){
        $id = $request->id;
        $server_id = $request->server_id;
        $data_delete = TblRemoteNotice::where('remote_id',$id)->where('server', $server_id)->delete();
        $data_delete->delete();
        return response()->json(true);
  }
  
  public function apiActive(Request $request){
      $id = $request->id;
      $avi = $request->avi;
      $server_id = $request->server_id;
      TblRemoteNotice::where('remote_id', $id)->where('server', $server_id)
       ->update([
           'is_active' => !$avi,
        ]);
    return response()->json(true);
  }
  
  public function apiUpdate(Request $request){
      $id = $request->id;
      $server_id = $request->server_id;
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          TblRemoteNotice::where('remote_id', $id)->where('server', $server_id)
           ->update([
               'title' => $request->title,
               'url' => $request->route_url,
               'page' => $request->page,
               'api_key' => $request->api_key,
               'is_scroll' => $request->is_scroll,
            ]);
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function documentapi(Request $request){
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          $notice = new TblRemoteYearlyBudget();
          $notice->remote_id = $request->id;
          $notice->server = $request->server_id;
          $notice->title = $request->title;
          $notice->url = $request->route_url;
          $notice->date_np = $request->date_np;
          $notice->page = $request->page;
          $notice->api_key = $request->api_key;
          $notice->ministry = $request->ministry;
          $notice->is_active = '1';
          $notice->save();
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function documentapidelete(Request $request){
        $id = $request->id;
        $server_id = $request->server_id;
        $data_delete = TblRemoteYearlyBudget::where('remote_id',$id)->where('server', $server_id)->delete();
        $data_delete->delete();
        return response()->json(true);
  }
  
  public function documentapiActive(Request $request){
      $id = $request->id;
      $avi = $request->avi;
      $server_id = $request->server_id;
      TblRemoteYearlyBudget::where('remote_id', $id)->where('server', $server_id)
       ->update([
           'is_active' => !$avi,
        ]);
    return response()->json(true);
  }
  
  public function documentapiUpdate(Request $request){
      $id = $request->id;
      $server_id = $request->server_id;
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          TblRemoteYearlyBudget::where('remote_id', $id)->where('server', $server_id)
           ->update([
               'title' => $request->title,
               'url' => $request->route_url,
               'page' => $request->page,
               'api_key' => $request->api_key,
            ]);
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function reportapi(Request $request){
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          $notice = new TblRemotePrativedan();
          $notice->remote_id = $request->id;
          $notice->server = $request->server_id;
          $notice->title = $request->title;
          $notice->url = $request->route_url;
          $notice->api_key = $request->api_key;
          $notice->date_np = $request->date_np;
          $notice->ministry = $request->ministry;
          $notice->is_active = '1';
          $notice->save();
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function reportapidelete(Request $request){
        $id = $request->id;
        $server_id = $request->server_id;
        $data_delete = TblRemotePrativedan::where('remote_id',$id)->where('server', $server_id)->delete();
        $data_delete->delete();
        return response()->json(true);
  }
  
  public function reportapiActive(Request $request){
      $id = $request->id;
      $avi = $request->avi;
      $server_id = $request->server_id;
      TblRemotePrativedan::where('remote_id', $id)->where('server', $server_id)
       ->update([
           'is_active' => !$avi,
        ]);
    return response()->json(true);
  }
  
  public function reportapiUpdate(Request $request){
      $id = $request->id;
      $server_id = $request->server_id;
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          TblRemotePrativedan::where('remote_id', $id)->where('server', $server_id)
           ->update([
               'title' => $request->title,
               'url' => $request->route_url,
               'api_key' => $request->api_key,
            ]);
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
    public function corepersionapi(Request $request){
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          $notice = new TblRemoteCorePerson();
          $notice->mantralaya_id = $request->id;
          $notice->server = $request->server_id;
          $notice->name = $request->name;
          $notice->post = $request->designation;
          $notice->phone = $request->phone;
          $notice->image = $request->image;
          $notice->is_top = $request->is_top;
          $notice->is_start = $request->is_start;
          $notice->url = $request->route_url;
          $notice->date_np = $request->date_np;
          $notice->ministry = $request->ministry;
          $notice->is_active = '1';
          $notice->save();
          return response()->json(true);
      }  
      return response()->json(false);
  }
  
  public function corepersionapidelete(Request $request){
        $id = $request->id;
        $server_id = $request->server_id;
        $data_delete = TblRemoteCorePerson::where('mantralaya_id',$id)->where('server', $server_id)->delete();
        $data_delete->delete();
        return response()->json(true);
  }
  
  public function corepersionapiActive(Request $request){
      $id = $request->id;
      $avi = $request->avi;
      $server_id = $request->server_id;
      TblRemoteCorePerson::where('mantralaya_id', $id)->where('server', $server_id)
       ->update([
           'is_active' => !$avi,
        ]);
    return response()->json(true);
  }
  
  public function corepersionapiUpdate(Request $request){
      $id = $request->id;
      $server_id = $request->server_id;
      if($request->has('token_id') && $request->has('server_id') && sha1($request->server_id.'p1govnp') == $request->token_id){
          TblRemoteCorePerson::where('mantralaya_id', $id)->where('server', $server_id)
           ->update([
               'name' => $request->name,
                'post' => $request->designation,
                'phone' => $request->phone,
                'image' => $request->image,
                'is_top' => $request->is_top,
                'is_start' => $request->is_start,
                'url' => $request->route_url,
            ]);
          return response()->json(true);
      }  
      return response()->json(false);
  }
}
