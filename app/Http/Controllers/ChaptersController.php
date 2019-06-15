<?php

namespace App\Http\Controllers;
use DB;
use View;
use Log;

use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    //
    public function viewChapters(Request $request)
    {
      $getAllSubjects = DB::table('subject')->get();
      return View::make('viewChapter')->with('data', $getAllSubjects);
    }
    public function getChapters(Request $request)
    {
      $getAllChapters = DB::table('chapters')->leftJoin('subject','chapters.sub_id','=','subject.sub_id')->get();
      if($getAllChapters){
        return response()->json([ 'result' => 'success', 'data' => $getAllChapters]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function getChapter(Request $request)
    {
      Log::info('1');
      $getChapterById = DB::table('chapters')->where('chapter_id',$request->input('chapter_id'))->get();

      if($getChapterById){
        return response()->json([ 'result' => 'success', 'data' => $getChapterById]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function editChapter(Request $request)
    {
      $editChapterById = DB::table('chapters')->where('chapter_id',$request->input('chapter_id'))->update(['chapter_name'=>$request->input('chapter_name')]);

      if($editChapterById){
        return response()->json([ 'result' => 'success']);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function deleteChapter(Request $request)
    {
      $deleteChapter = DB::table('chapters')->where('chapter_id', $request->input('chapter_id'))->delete();

      if($deleteChapter){
        return response()->json([ 'result' => 'success']);
      }
      else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function addChapters(Request $request)
    {
      $addChapter = DB::table('chapters')->insert([
        'chapter_name'=>$request->input('chapter_name'),
        'sub_id'=>$request->input('sub_id')
      ]);
      if($addChapter){
        return response()->json([ 'result' => 'success']);
      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
}
