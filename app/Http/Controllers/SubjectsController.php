<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function viewSubjects(Request $request)
    {
      return view('viewSubject');
    }

    public function getSubjects(Request $request)
    {
      $getAllSubjects = DB::table('subject')->get();
      if($getAllSubjects){
        return response()->json([ 'result' => 'success', 'data' => $getAllSubjects]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }

    public function getSubject(Request $request)
    {
      $getSubjectById = DB::table('subject')->where('sub_id',$request->input('sub_id'))->get();

      if($getSubjectById){
        return response()->json([ 'result' => 'success', 'data' => $getSubjectById]);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }

    public function editSubject(Request $request)
    {
      $editSubjectById = DB::table('subject')->where('sub_id',$request->input('sub_id'))->update(['subject_name'=>$request->input('subject_name')]);

      if($editSubjectById){
        return response()->json([ 'result' => 'success']);

      }else{
        return response()->json([ 'result' => 'error']);
      }
    }

    public function deleteSubject(Request $request)
    {
      $deleteSubject = DB::table('subject')->where('sub_id', $request->input('sub_id'))->delete();

      if($deleteSubject){
        return response()->json([ 'result' => 'success']);
      }
      else{
        return response()->json([ 'result' => 'error']);
      }
    }

    public function addSubjects(Request $request)
    {
      $addSubject = DB::table('subject')->insert(['subject_name'=>$request->input('subject_name')]);
      if($addSubject){
        return response()->json([ 'result' => 'success']);
      }else{
        return response()->json([ 'result' => 'error']);
      }
    }

}
