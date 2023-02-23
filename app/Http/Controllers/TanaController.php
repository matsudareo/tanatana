<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tana;
use App\Models\Month;
use App\Models\Manegement;
use App\Models\Count;

class TanaController extends Controller
{
    //
    public function index()
    {
        $months = Month::all();
        return view('main.fail_register', ["months" => $months]);
     }
   
    public function fail_page()
    {
        return view('main.fail_register');
    }
    public function fail_create(Request $request) {
        // バリデーションチェック
        $request->validate([
            'fail' => 'required|max:20'
        ]);
        // 内容を受け取り変数に入れる
        $fail = $request ->input('fail');
        $submit = $request->get('submit');
if($submit == '新規登録'){
    $months = Month::insert(["fail_name" => $fail]);
    $months = Month::all();
    // 変数を渡す
return view('main.fail_register',["months" => $months]);
 // 二重送信防止
$request->regenerateToken();
}
 //Month::insert(["fail_name" => $fail]);
        // 選択したファイルのIDを取得
        $id = $request->get('fail_id');
        // これで情報は出せる
        $report = Month::with('manegements')->find($id);
    // with('manegements')はなくても行ける
    
   //$new_report = $report->replicate(['fail_name'])->fill([]); // 複製の機能はこれ
$new_report = Month::with('manegements')->create(["fail_name" => $fail]);
//    入力したファイル名にする
foreach($report as $value){
foreach($value->manegements as $tag)
{
    $s = $tag->replicate(['stock_amont', 'stock_weight']);
    // ここでmonth_idをupdateしたい
    $s -> stock_amont = 0;
    $s -> stock_weight = 0;
    //$sにmonth_id書いても効かない
    //$reportを$new_reportに変えてsave文に書いたら行けた
   
    $new_report->manegements()->save($s);
}
}
 //コピー確定
$new_report->push();

$new_report->save();
    
        //全データの取り出し
        $months = Month::all();
            // 変数を渡す
        return view('main.fail_register',["months" => $months]);
         // 二重送信防止
        $request->regenerateToken();

}


    //これがあればurlはfail_id=になる
    public function top_page(Request $request)
    {   
        //$id = $request->session()->get('fail_id');
        $id = $request->get('fail_id');
        $month_id = Month::find(["id" => $id ]);
        // dump($month_id);
        return view('main.top_select',["months" => $month_id]);
    }


    public function list_page(Request $request)
    {
    $submit = $request->get('submit');
    $id = $request->get('fail_id');
    if($submit == '野菜') {
        $month = Month::find($id)->manegements->where('categoly_id','1');
        //$mi = Manegement::select('categoly_id')->value(1);
         //$mi = Month::find($id);
        return view('main.list',["month_manege" => $month]);
    }elseif($submit == '肉類') {
        $month = Month::find($id)->manegements->where('categoly_id','2');
        return view('main.list',["month_manege" => $month]);
    }elseif($submit == '海鮮類') {
        $month = Month::find($id)->manegements->where('categoly_id','3');
        return view('main.list',["month_manege" => $month]);
    }elseif($submit == '調味料') {
        $month = Month::find($id)->manegements->where('categoly_id','4');
        return view('main.list',["month_manege" => $month]);
    }elseif($submit == '消耗品') {
        $month = Month::find($id)->manegements->where('categoly_id','5');
        return view('main.list',["month_manege" => $month]);
    }elseif($submit == 'ドリンク') {
        $month = Month::find($id)->manegements->where('categoly_id','6');
        return view('main.list',["month_manege" => $month]);
    }
            $month = Month::find($id)->manegements;
            $m = Month::find($id);
       //return $month;
            return view('main.list',["month_manege" => $month,$m]);
    

    }
    // public function list_edit(Request $request)
    // {
    //     // $id = $request->get('fail_id');
    //     // $month = Month::find($id)->manegements;
    // var_dump($request);
    //     return view('main.complete');
    // }
    
    public function list_regi_page(Request $request)
    {
        $id = $request->get('fail_id');
        $month = Month::find($id);

        return view('main.list_regi',["months" => $month]);
    }
    public function list_create(Request $request) {
        $id = $request->get('fail_id');
        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:20',
            'categolise' => 'required',
            'amont' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
        // 内容を受け取り変数に入れる
        $name = $request ->input('name');
        $categolise = $request ->input('categolise');
        $amont = $request ->input('amont');
        $weight= $request ->input('weight');
        //ファイルをDBに登録
        $ma = Month::find($id);
        $ma = Manegement::insert(["merchandise" => $name,"categoly_id" => $categolise,"amont" => $amont,"all_weight" => $weight, "month_id" =>$id]);
        //全データの取り出し
        // $ma = Month::find($id);
        $array = array('month_id'=>$id,);
        return view('main.complete',compact('array'));
           //return $id;

         // 二重送信防止
        $request->regenerateToken();
    }

        public function postParam(Request $request) {
        $submit = $request->get('sub');
        if ($submit == '削除') {
            $fail_id = $request->get('fail_id');
            $id = $request->get('id');
            $array = array('month_id'=>$fail_id);
            // $manegements = Month::find($fail_id)->manegements;
            $delete = Manegement::find(["id" => $id ]);
            return view('main.delete_complete',["delete" => $delete]);
        } elseif($submit == '編集'){
            //idを受け取る
            $fail_id = $request->get('fail_id');
            $id = $request->get('id');
            $array = array('month_id'=>$fail_id);
            //idをDBから見つける
            $edit= Manegement::find(["id" => $id ]
            );
            return view('main.edit',["edit" => $edit]);
        }
        //dump($submit);
        //復元コード
    //Manegement::withTrashed()->restore();   
    }

    public function edit_page(){
        return view('main.edit_conf');
    }
    // public function edit(Request $request){
    //     $fail_id = $request->get('fail_id');
    //     $id = $request->get('id');
    //     $array = array('month_id'=>$fail_id);
    //     //idをDBから見つける
    //     $edit= Manegement::find(["id" => $id ]
    //     );
    //     dump($request);
    //     return view('main.edit',["edit" => $edit]);
    // }

    public function edit_conf(Request $request) {
        // バリデーションチェック
        $request->validate([
            'name' => 'required|max:20',
            'categolise' => 'required',
            'amont' => 'required|numeric',
            'weight' => 'required|numeric'
        ]);
    
        // 内容を受け取り変数に入れる
        $id = $request->input('id');
        $month_id = $request->input('month_id');
        $name = $request ->input('name');
        $categolise = $request ->input('categolise');
        $amont = $request ->input('amont');
        $weight= $request ->input('weight');
        $array = array('id'=>$id,'month_id'=>$month_id,'merchandise'=>$name,'categoly_id'=>$categolise,'amont'=>$amont,'all_weight'=>$weight);

        //全データの取り出し
        //$manegements = Manegements::all();
        //dump($array);
            // 変数を渡す
        return view('main.edit_conf',compact('array'));
         // 二重送信防止
        $request->regenerateToken();
    }

    
    public function edit_cleate(Request $request) {
        $_SESSION["checkPointURL"] = $_SERVER['REQUEST_URI'];
        // $id = $request->session()->get('fail_id');
        // 内容を受け取り変数に入れる
        $id = $request->input('id');
        $month_id = $request->input('month_id');
        $name = $request ->input('merchandise');
        $categolise = $request ->input('categoly_id');
        $amont = $request ->input('amont');
        $weight= $request ->input('all_weight');
    
        $array = array('id'=>$id,'month_id'=>$month_id,'merchandise'=>$name,'categoly_id'=>$categolise,'amont'=>$amont,'all_weight'=>$weight);

        // //ファイルをDBに登録
        $update=Manegement::find($id)->update(["merchandise" => $name,"categoly_id" => $categolise,"amont" => $amont,"all_weight" => $weight]);
    
        //dump($request);
            // 変数を渡す
        return view('main.complete',compact('array'));
         // 二重送信防止
        $request->regenerateToken();
    }



    public function delete_page(Request $request){
        $id = $request->input('id');
        $month_id = $request->input('month_id');
        $name = $request ->input('merchandise');
        $categolise = $request ->input('categoly_id');
        $amont = $request ->input('amont');
        $weight= $request ->input('all_weight');
        $delete = Manegement::destroy($id);
        $array = array('id'=>$id,'month_id'=>$month_id,'merchandise'=>$name,'categoly_id'=>$categolise,'amont'=>$amont,'all_weight'=>$weight);
        return view('main.delete_complete',compact('array'));
    }

    public function count_top_page(){
        $months = Month::all();
        return view('main.count_fail', ["months" => $months]);
    }

    public function count(Request $request){
        $request->validate([
            'fail_id'  => 'required'
        ]);
    $id = $request->input('fail_id');
    $fail = Month::find($id);
    $count =  Month::find($id)->manegements->sum("stock_amont");
    //dump($fail);
    return view('main.count',["fails" => $fail,"count_all"=>$count]);
    }

    public function count_edit(Request $request){
        $id = $request->input('fail_id');
        $submit = $request->get('submit');
        if($submit == '野菜一覧') {
        $fail = Month::find($id)->manegements->where('categoly_id','1');
        return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == '肉類一覧') {
            $fail = Month::find($id)->manegements->where('categoly_id','2');
            return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == '海鮮類一覧') {
            $fail = Month::find($id)->manegements->where('categoly_id','3');
            return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == '調味料一覧') {
            $fail = Month::find($id)->manegements->where('categoly_id','4');
            return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == '消耗品一覧') {
            $fail = Month::find($id)->manegements->where('categoly_id','5');
            return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == 'ドリンク一覧') {
            $fail = Month::find($id)->manegements->where('categoly_id','6');
            return view('main.count_edit',["fails" => $fail]);
        }elseif($submit == '全商品') {
            $fail = Month::find($id)->manegements;
            return view('main.count_edit',["fails" => $fail]);
        }
        $fail = Month::find($id)->manegements;
       // dump($fail);
        return view('main.count_edit');
    }

    public function countall(Request $request){
        $submit = $request->input('submit');
        $fail_id = $request->input('id');

        $count =  Month::find($fail_id)->manegements->sum("stock_amont");

        $fail = Month::find($fail_id);
        
        //dump($count);
        return view('main.count',["fails" => $fail,"count_all"=>$count]);
        }
        
        public function ajax(Request $request)
        {   
            $id = $request->input('id');$fail_id = $request->input('fail_id');
            $weight = $request->input('all_weight');
            $amont = $request->input('ajax_amont');
            // ajaxから受け取った値の処理
            $ajax_form = $request->input('ajax_form');
            $ajax_for = $amont/$weight*$ajax_form;
            $ajax_amont = round($ajax_for,2) . "\n";
            //var_dump($update);
            $update=Manegement::find($id)->update(["stock_weight" => $ajax_form,"stock_amont" => $ajax_amont]);
            
            // ajaxで受け取ってviewを表示できるようにレンダリング
            return response()->json([
                'form' => view('main.amont')->with(['input_data' => $ajax_amont])->render()
            ]);
        
            
        
        }
    
}
    
