<?php
namespace App\Http\Controllers;
use App\Http\Controllers\SiteController;
use App\Http\Requests\SiteFormValidation;
use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Input;
class SiteController extends Controller
{
public function sites(){
return view("layouts.site");
}
public function import(SiteFormValidation  $request){
// $this->validate($request, array(
//     'csvfile'      => 'required'
// ));    
$file_name = $request->file('csvfile');
if( strtolower(last(explode(".", $file_name))) == 'csv'){
}
$file_path = $request->file('csvfile')->getRealPath();
$line_array = explode("\r\n", file_get_contents($file_path));
// remove header name 
unset($line_array[0]);
// remove last quote ("")
unset($line_array[count($line_array)]);
$input_array = [];

//$all_site_name_array=Site::firstOrNew(array('site_name' => Input::get('site_name')));
//$all_site_name_array->site_name = Input::get('site_name');

//dd($all_site_name_array);
//site::insertOnDuplicateKey($input_array,['site_name']);
// $updateitem;
// $sname = Input::get('sites');
// $subname = Site::where('site_name',$sname)->first();
// $input = Input::except('_token');
// $updateitem->where('$request', $request)
//    ->update($input, ['site_name' => $subname->id]);
//    dd($updateitem);

 


foreach ($line_array as  $value) {
$col_value = explode(",", $value);
//if (){
$input_array[] =[
'site_name' => $col_value[0], 
'website_type'=> $col_value[1], 
'check_update' => $col_value[2]
]; 
//}
}

Site::insert($input_array);

session()->flash('message','Your csvfile have been Inserted Successfully');
return redirect('/site');
// return redirect('/site')->with('success_message','Your csvfile have been Inserted Successfully');
}
}