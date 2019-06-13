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
    	
        return view('viewQuestions',array('subjects'=>$subjects,'chapters'=>$chapters, 'questions'=>$question));
    }

    public function getQuestion(Request $request){
    	$question = DB::table('questions')
    				->join('subject','questions.sub_id','=','subject.sub_id')
    				->join('chapters','questions.chapter_id','=','chapters.chapter_id')
    				->where('q_id',$request->q_id)
    				->get();
    				
    	return response()->json([ 'result' => 'success', 'data'=>$question ]);
    }

    // public function getQuestions(){
    // 	$question = DB::table('question')
    // 				->join('subject','question.sub_id','=','subject.sub_id')
    // 				->join('chapters','question.chapter_id','=','chapters.chapter_id')
    // 				->get();
    // 	Log::info($question);
    // }

    public function addQuestion(Request $request){
    	$insertStatus = DB::table('questions')
		    			->insert(['question'=>$request->question, 'option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3, 'option4'=>$request->option4, 'answer'=>$request->answer, 'sub_id'=>$request->sub_id, 'chapter_id'=>$request->chapter_id, 'sheet'=>$request->sheet]);
		    			
		
			if($insertStatus)
	    	{
	    		return response()->json(['result' => 'success','data'=>$request ]);
	    	}
	    	else{
	    		return response()->json(['result' => 'error', 'msg'=>'Failed to add Question']);
	    	}
    }

    public function updateQuestion(Request $request){
    	
    	$updateStatus = DB::table('questions')
    					->where('q_id',$request->q_id)
    					->update(['question'=>$request->question, 'option1'=>$request->option1,'option2'=>$request->option2,'option3'=>$request->option3, 'option4'=>$request->option4, 'answer'=>$request->answer, 'sub_id'=>$request->sub_id, 'chapter_id'=>$request->chapter_id, 'sheet'=>$request->sheet]);
    	
    	if($updateStatus)
	    	{
	    		return response()->json(['result' => 'success','msg'=>'Question updated successfully !!' ]);
	    	}
	    	else{
	    		return response()->json(['result' => 'error', 'msg'=>'Failed to update Question']);
	    	}
    }

    public function deleteQuestion(Request $request){

    	Log::info($request);
    	$deleteStatus = DB::table('questions')->where('q_id',$request->q_id)->delete();
    	Log::info($deleteStatus);
    	if($deleteStatus){
    		return response()->json(['result' => 'success']);
    	}
    	else{
    		return response()->json(['result' => 'error']);
    	}
    }

    
}
