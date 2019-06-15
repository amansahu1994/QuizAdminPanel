<?php

namespace App\Http\Controllers;
use DB;
use View;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    //
    public function viewChapters(Request $request)
    {

      $getAllSubjects = DB::table('subject')->get();
      $getAllChapters = DB::table('chapters')->leftJoin('subject','chapters.sub_id','=','subject.sub_id')->get();
      return View::make('viewChapter')->with(['data'=>$getAllSubjects,'chapters'=>$getAllChapters]);
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
      $getChapterById = DB::table('chapters')->where('chapter_id',$request->input('chapter_id'))->get();

      if($getChapterById){
        return response()->json([ 'result' => 'success', 'data' => $getChapterById]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function editChapter(Request $request)
    {
      $editChapterById = DB::table('chapters')->where('chapter_id',$request->input('chapter_id'))->update(['chapter_name'=>$request->input('chapter_name'), 'sub_id'=>$request->input('sub_id')]);
      $getAllChapters = DB::table('chapters')->leftJoin('subject','chapters.sub_id','=','subject.sub_id')->get();
      if($editChapterById){
        return response()->json([ 'result' => 'success','data'=>$getAllChapters]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function deleteChapter(Request $request)
    {
      $deleteChapter = DB::table('chapters')->where('chapter_id', $request->input('chapter_id'))->delete();
      $getAllChapters = DB::table('chapters')->leftJoin('subject','chapters.sub_id','=','subject.sub_id')->get();
      if($deleteChapter){
        return response()->json([ 'result' => 'success','data'=>$getAllChapters]);
      }
      else{
        return response()->json([ 'result' => 'error']);
      }
    }
    public function addChapters(Request $request)
    {
      Log::info('-------');
      Log::info($request);
      Log::info('-------');
      $chapterExists = DB::table('chapters')->where('chapter_name', 'like', '%'.$request->chapter_name.'%')->where('sub_id', $request->sub_id)->exists();
      if($chapterExists){
        return response()->json([ 'result' => 'error', 'msg' => 'Subjects Already Exists']);
      }else{
        $addChapter = DB::table('chapters')->insert([
          'chapter_name'=>$request->input('chapter_name'),
          'sub_id'=>$request->input('sub_id')
        ]);
        $getAllChapters = DB::table('chapters')->leftJoin('subject','chapters.sub_id','=','subject.sub_id')->get();
        if($addChapter){
          return response()->json([ 'result' => 'success', 'data'=>$getAllChapters]);
        }else{
          return response()->json([ 'result' => 'error']);
        }
      }

    }
}
