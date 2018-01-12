<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function __construct(){

    }
    public function index($db='AW'){
      $db= strtoupper($db);
      if(\App\Helper\SectionArray::checkRef($db)){

        $database = \App\Model\Questions::where('sec_id','=',\App\Helper\SectionArray::getID($db))->get();
        $data = $database;

            return view('question.index')->with([
              'title'=>'Question - '.\App\Algorithm\Questions\Section::getSection($db),
              'data'=> $data,
              'section'=>\App\Helper\SectionArray::getNameFromRef($db),
              'db'=>$db
            ]);
          }
          else{
            abort(404);
          }
    }
    public function add(Request $request){
      $db=$request->all()['section'];
      $url='question/'.strtolower($db);
      if(url()->previous()==url($url))
      return view('question.add')->with([
        'title' => 'Add new Questions',
        'db'=> $db,
      ]);
      else{
        abort(403,"Standard Abolishment");
      }
    }
    public function edit(Request $request){
      $db=$request->all()['section'];
      $id=$request->all()['id'];
      $content=\App\Model\Questions::find($id);
      $url='question/'.strtolower($db);
      if(url()->previous()==url($url))
      return view('question.add')->with([
        'title' => 'Edit '.$db.' ',
        'db' => $db,
        'id' => $id,
        'content'=>$content,
        'options'=>$content->options,
      ]);
      else{
        abort(403,"Standard Abolishment");
      }
    }
    public function store(Request $request){
      if($request->ajax()){
        $data= $request->all();
        $class= "\App\Helper\Data\\".strtoupper($data['table'])."::save";
        return response($class($request));
      }
    }
    public function update(Request $request){
      if($request->ajax()){
        $data= $request->all();
        $class= "\App\Helper\Data\\".strtoupper($data['table'])."::update";;
        return response($class($request));
      }
    }
    public function Delete(Request $request){
      $data= $request->all();
      if($request->ajax()){
        $class= "\App\Helper\Data\\".strtoupper($data['section'])."::delete";
        return response($class($request));
      }
      else{
        $class= "\App\Helper\Data\\".strtoupper($data['section'])."::delete";
        return redirect('question/'.strtolower($data['section']))->with('success','The Data has been Sucessfully Removed');

      }
    }
}
