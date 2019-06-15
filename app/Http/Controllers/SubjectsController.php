<?php

namespace App\Http\Controllers;
use DB;
use View;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    //
    public function viewSubjects(Request $request)
    {
      $getAllSubjects = DB::table('subject')->distinct()->get();
      return View::make('viewSubject')->with(['subjects'=>$getAllSubjects]);
    }

    public function getSubjects(Request $request)
    {
      $getAllSubjects = DB::table('subject')->distinct()->get();
      if($getAllSubjects){
        return response()->json([ 'result' => 'success', 'data' => $getAllSubjects]);

      }else{
        return response()->json([ 'result' => 'error', 'msg' => 'Unable To Get Subjects']);
      }
    }

    public function getSubject(Request $request)
    {
      $getSubjectById = DB::table('subject')->where('sub_id',$request->input('sub_id'))->distinct()->get();

      if($getSubjectById){
        return response()->json([ 'result' => 'success', 'data' => $getSubjectById]);

      }else{
        return response()->json([ 'result' => 'error', 'msg' => 'Unable To Get Subject']);
      }
    }

    public function editSubject(Request $request)
    {
      $editSubjectById = DB::table('subject')->where('sub_id',$request->input('sub_id'))->update(['subject_name'=>$request->input('subject_name')]);
      $getAllSubjects = DB::table('subject')->distinct()->get();
      if($editSubjectById){
        return response()->json([ 'result' => 'success', 'data'=>$getAllSubjects, 'msg' => 'Chapter Updated Successfully']);

      }else{
        return response()->json([ 'result' => 'error', 'msg' => 'Unable To Update Subject']);
      }
    }

    public function deleteSubject(Request $request)
    {
      $deleteSubject = DB::table('subject')->where('sub_id', $request->input('sub_id'))->delete();
      $getAllSubjects = DB::table('subject')->distinct()->get();
      if($deleteSubject){
        return response()->json([ 'result' => 'success','data'=>$getAllSubjects, 'msg' => 'Chapter Deleted Successfully']);
      }
      else{
        return response()->json([ 'result' => 'error', 'msg' => 'Unable To Delete Subject']);
      }
    }

    public function addSubjects(Request $request)
    {

      $subjectExist = DB::table('subject')->where('subject_name', 'like', '%'.$request->subject_name.'%')->exists();
      if($subjectExist){
        return response()->json([ 'result' => 'error', 'msg' => 'Chapter Already Exists']);
      }else{
        $addSubject = DB::table('subject')->insert(['subject_name'=>$request->input('subject_name')]);
        $getAllSubjects = DB::table('subject')->distinct()->get();
        if($addSubject){
          return response()->json([ 'result' => 'success','data'=>$getAllSubjects, 'msg' => 'Chapter Added Successfully']);
        }else{
          return response()->json([ 'result' => 'error', 'msg' => 'Chapter Already Exists']);
        }
      }

    }


}
