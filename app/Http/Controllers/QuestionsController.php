<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;
use View;

class QuestionsController extends Controller
{
    //
    // get the list of the chapters
    public function getSubjectAndChapters(){
    	$subjects = DB::table('subject')->get();
    	$chapters = DB::table('chapters')->get();
    	$question = DB::table('questions')
    				->join('subject','questions.sub_id','=','subject.sub_id')
    				->join('chapters','questions.chapter_id','=','chapters.chapter_id')
    				->get();
    //  Log::info($question);Log::info($subjects);Log::info($chapters);
        return view('viewQuestions',array('subjects'=>$subjects,'chapters'=>$chapters, 'questions'=>$question));
    }

    public function getQuestion(Request $request){
    	$question = DB::table('questions')
    				->join('subject','questions.sub_id','=','subject.sub_id')
    				->join('chapters','questions.chapter_id','=','chapters.chapter_id')
    				->where('q_id',$request->q_id)
    				->get();
            //Log::info($question);

    	return response()->json([ 'result' => 'success', 'data'=>$question ]);
    }

    public function getQuestions(){
    	$questions = DB::table('questions')
    				->join('subject','questions.sub_id','=','subject.sub_id')
    				->join('chapters','questions.chapter_id','=','chapters.chapter_id')
    				->get();
    	// Log::info($questions);
      return response()->json([ 'result' => 'success', 'data'=>$questions ]);
    }

    public function addQuestion(Request $request){

      $questionExist = DB::table('questions')->where('question', 'like', '%'.$request->question.'%')->where('answer', 'like', '%'.$request->answer.'%')->exists();
      // Log::info($questionExist);
      if($questionExist){
        return response()->json([ 'result' => 'error', 'msg' => 'Question Already Exists']);
      }else{
          $insertStatus = DB::table('questions')
    		    			->insert(['question'=>$request->question, 'option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3, 'option4'=>$request->option4, 'answer'=>$request->answer, 'sub_id'=>$request->sub_id, 'chapter_id'=>$request->chapter_id, 'sheet'=>$request->sheet]);
          $questions = DB::table('questions')
                				->join('subject','questions.sub_id','=','subject.sub_id')
                				->join('chapters','questions.chapter_id','=','chapters.chapter_id')
                				->get();
          if($insertStatus)
    	    	{
    	    		return response()->json(['result' => 'success','data'=>$questions, 'msg' => 'Question Added Successfully' ]);
    	    	}
    	    	else{
    	    		return response()->json(['result' => 'error', 'msg'=>'Failed to add Question']);
    	    	}
      }

    }

    public function updateQuestion(Request $request){

    	$updateStatus = DB::table('questions')
    					->where('q_id',$request->q_id)
    					->update(['question'=>$request->question, 'option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3, 'option4'=>$request->option4, 'answer'=>$request->answer, 'sub_id'=>$request->sub_id, 'chapter_id'=>$request->chapter_id, 'sheet'=>$request->sheet]);
      $questions = DB::table('questions')
                            ->join('subject','questions.sub_id','=','subject.sub_id')
                            ->join('chapters','questions.chapter_id','=','chapters.chapter_id')
                            ->get();
    	if($updateStatus)
	    	{
	    		return response()->json(['result' => 'success', 'data' => $questions, 'msg'=>'Question updated successfully !!' ]);
	    	}
	    	else{
	    		return response()->json(['result' => 'error', 'msg'=>'Failed to update Question']);
	    	}
    }

    public function deleteQuestion(Request $request){

    	// Log::info($request);
    	$deleteStatus = DB::table('questions')->where('q_id',$request->q_id)->delete();
    	// Log::info($deleteStatus);
      $questions = DB::table('questions')
                            ->join('subject','questions.sub_id','=','subject.sub_id')
                            ->join('chapters','questions.chapter_id','=','chapters.chapter_id')
                            ->get();
    	if($deleteStatus){
    		return response()->json(['result' => 'success', 'data' => $questions]);
    	}
    	else{
    		return response()->json(['result' => 'error']);
    	}
    }


}
