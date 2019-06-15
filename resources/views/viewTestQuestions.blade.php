@extends('master')



@section('breadcrumb')
			<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">View Test Questions</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('viewTestQuestions')
			<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            	<div class="row">
                    				<div class="col-md-6">
                                		<strong class="card-title">Questions</strong>
                                	</div>
                                	<div class="col-md-6">
                                		<button type="button" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="" onclick="addQuestion();"><i class="fa fa-plus" aria-hidden="true"></i>  Add</button>
                                	</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export"   class="table table-responsive table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>S.No</th>
                                            <th>Question</th>
                                            <th>Option 1</th>
                                            <th>Option 2</th>
                                            <th>Option 3</th>
                                            <th>Option 4</th>
                                            <th>Answer</th>
                                            <th>Subject</th>
                                            <th>Chapter</th>
                                            <th>Test</th>
                                            <th>Update/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($questions as $question)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$question->question}}</td>
                                            <td>{{$question->option1}}</td>
                                            <td>{{$question->option2}}</td>
                                            <td>{{$question->option3}}</td>
                                            <td>{{$question->option4}}</td>
                                            <td>{{$question->answer}}</td>
                                            <td>{{$question->subject_name}}</td>
                                            <td>{{$question->chapter_name}}</td>
                                            <td>{{$question->test}}</td>
                                            <td>
                                                <button type="button" id="{{$question->test_qid}}" class="btn  btn-warning edit"data-toggle="modal" href="">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger delete"
                                                id="{{$question->test_qid}}">
                                                    <i class="fa fa-trash-o "></i>
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->

<!--Add Question Modal Start -->
<div class="modal" id="addQuestion">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Question</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body -->
            <div class="modal-body">
                <div class="form-group" id="addQuestionForm">
                    <div class="row">
                        <div class="col-md-12" style="">
                            <label class=" form-control-label">Question</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                <textarea class="form-control" id="Question" placeholder="Enter Question"></textarea>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 1</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Option1" placeholder="Enter Option 1">
                                    <input class="opt-margin" id="O1" type="radio" name="answer">
                                </div>

                                <small class="form-text text-muted"></small>

                            </div>
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 2</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Option2" placeholder="Enter Option 2">
                                    <input class="opt-margin" id="O2" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Option 3</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Option3" placeholder="Enter Option 3">
                                    <input class="opt-margin" id="O3" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 4</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Option4" placeholder="Enter Option 4">
                                    <input class="opt-margin" id="O4" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Subject</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectSubject1">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->sub_id}}">
                                                    {{$subject->subject_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Chapter</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectChapter1">
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->chapter_id}}">
                                                    {{$chapter->chapter_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Test</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectTest1">
                                        <option value="Test-1">Test-1</option>
                                        <option value="Test-2">Test-2</option>
                                        <option value="Test-3">Test-3</option>
                                        <option value="Test-4">Test-4</option>
                                        <option value="Test-5">Test-5</option>
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success saveQuestion">
                    <i class="fa fa-floppy-o"></i>
                    Save
                </button>
                <button type="button" id="closeAddQuestionModal" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--Add Chapter Modal End -->

<!--Edit Question Modal Start -->
<div class="modal" id="editQuestionModal">
    <div class="modal-dialog modal-xl" >
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Question</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12" style="">
                            <label class=" form-control-label">Question</label>
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                <textarea class="form-control" id="Quest" placeholder="Enter Question"></textarea>
                            </div>
                            <small class="form-text text-muted"></small>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 1</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Opt1" placeholder="Enter Option 1">
                                    <input class="opt-margin" id="O11" type="radio" name="answer">
                                </div>

                                <small class="form-text text-muted"></small>

                            </div>
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 2</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Opt2" placeholder="Enter Option 2">
                                    <input class="opt-margin" id="O22" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Option 3</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Opt3" placeholder="Enter Option 3">
                                    <input class="opt-margin" id="O33" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>
                            <div class="col-md-6">
                                <label class=" form-control-label">Option 4</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <input class="form-control" id="Opt4" placeholder="Enter Option 4">
                                    <input class="opt-margin" id="O44" type="radio" name="answer">
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Subject</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectSubject2">
                                        @foreach($subjects as $subject)
                                            <option value="{{$subject->sub_id}}">
                                                    {{$subject->subject_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Chapter</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectChapter2">
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->chapter_id}}">
                                                    {{$chapter->chapter_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                            <div class="col-md-6">
                                <label class=" form-control-label">Select Test</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                    <select class="form-control" id="selectTest2">
                                        <option value="Test-1">Test-1</option>
                                        <option value="Test-2">Test-2</option>
                                        <option value="Test-3">Test-3</option>
                                        <option value="Test-4">Test-4</option>
                                        <option value="Test-5">Test-5</option>
                                    </select>
                                </div>
                                <small class="form-text text-muted"></small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateQuestion">
                    <i class="fa fa-floppy-o"></i>
                    Save
                </button>
                <button type="button" id="closeEditQuestionModal" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--Edit Chapter Modal End -->
@endsection





@section('jquery')


    <script type="text/javascript">
        // $('#addQuestion').on('click', function() {
        //     $('#addQuestionModal').modal('show');
        // });
        function addQuestion()
        {
            $('#addQuestion').modal('show');
            var question='';
            var option1='';
            var option2='';
            var option3='';
            var option4='';
            var ans='';
            var sub_id=0;
            var chapter_id=0;
            var test='';
            $('#selectSubject1').on('click',function() {
                window.sub_id = this.value;
                //console.log(this.value);
            });
            $('#selectChapter1').on('click',function() {
                window.chapter_id = this.value;
                //console.log(this.value);
            });
            $('#selectTest1').on('click',function() {
                window.test = this.value;
                //console.log(this.value);
            });

            $('#O1').on('click',function() {
                window.ans = $('#Option1').val();
            });
            $('#O2').on('click',function() {
                window.ans = $('#Option2').val();
            });
            $('#O3').on('click',function() {
                window.ans = $('#Option3').val();
            });
            $('#O4').on('click',function() {
                window.ans = $('#Option4').val();
            });


            $('.saveQuestion').on('click', function() {
                window.question = $('#Question').val();
                window.option1 = $('#Option1').val();
                window.option2 = $('#Option2').val();
                window.option3 = $('#Option3').val();
                window.option4 = $('#Option4').val();
                //console.log(window.sub_id+'-'+window.chapter_id+'-'+window.test);
                //console.log(window.question+'-'+window.option1+'-'+window.option2+'-'+window.option3+'-'+window.option4+window.ans);
                $.ajax({
                    url: 'addTestQuestion',
                    type: 'POST',
                    data: { 'question' : window.question, 'option1' : window.option1, 'option2' : window.option2, 'option3' : window.option3, 'option4' : window.option4,'answer' : window.ans, 'sub_id' : window.sub_id, 'chapter_id' : window.chapter_id, 'test' : window.test},
                    dataType: 'JSON',
                    success : function(data) {
                        console.log(data);
                        if(data.result === 'success')
                        {
                            $('#Question').val('');
                            $('#Option1').val('');
                            $('#Option2').val('');
                            $('#Option3').val('');
                            $('#Option4').val('');
                            $('#closeAddQuestionModal').click();
                            document.location.reload(true);

														//$( "#bootstrap-data-table-export" ).DataTable().draw();
                        }
                        else if(data.result === 'error')
                        {

                            $('#closeAddQuestionModal').click();
                        }
                    }
                });
            });

        }

        $(document).on('click','.edit', function(){
            var test_qid = $(this).attr("id");
            $.ajax({
                url: 'getTestQuestion',
                type: 'GET',
                data: {'test_qid': test_qid},
                dataType: 'JSON',
                success: function(data){
                    console.log(data);
                    $('#Quest').val(data.data['0'].question);
                    $('#Opt1').val(data.data['0'].option1);
                    $('#Opt2').val(data.data['0'].option2);
                    $('#Opt3').val(data.data['0'].option3);
                    $('#Opt4').val(data.data['0'].option4);

                    $(".updateQuestion").attr("id", data.data['0'].test_qid);
                    $('#editQuestionModal').modal('show');

                    var question='';
                    var option1='';
                    var option2='';
                    var option3='';
                    var option4='';
                    var ans='';
                    var sub_id=0;
                    var chapter_id=0;
                    var test='';


                    $('#O11').on('click',function() {
                        window.ans = $('#Opt1').val();
                    });
                    $('#O22').on('click',function() {
                        window.ans = $('#Opt2').val();
                    });
                    $('#O33').on('click',function() {
                        window.ans = $('#Opt3').val();
                    });
                    $('#O44').on('click',function() {
                        window.ans = $('#Opt4').val();
                    });

                        $('#selectSubject2').on('click',function() {
                        window.sub_id = this.value;
                        //console.log(this.value);
                        });
                        $('#selectChapter2').on('click',function() {
                            window.chapter_id = this.value;
                            //console.log(this.value);
                        });
                        $('#selectTest2').on('click',function() {
                            window.test = this.value;
                            //console.log(this.value);
                        });

                    $('.updateQuestion').on('click', function(){

                        var test_qid1 = $('.updateQuestion').attr("id");
                        window.question = $('#Quest').val();
                        window.option1 = $('#Opt1').val();
                        window.option2 = $('#Opt2').val();
                        window.option3 = $('#Opt3').val();
                        window.option4 = $('#Opt4').val();



                        console.log(test_qid1+'-'+window.sub_id+'-'+window.chapter_id+'-'+window.test);
                        console.log(window.question+'-'+window.option1+'-'+window.option2+'-'+window.option3+'-'+window.option4+window.ans);
                        $.ajax({
                            url: 'updateTestQuestion',
                            type: 'POST',
                            data: { 'test_qid' : test_qid1, 'question' : window.question, 'option1' : window.option1, 'option2' : window.option2, 'option3' : window.option3, 'option4' : window.option4,'answer' : window.ans, 'sub_id' : window.sub_id, 'chapter_id' : window.chapter_id, 'test' : window.test},
                            dataType: 'JSON',
                            success : function(data) {
                                console.log(data);
                                if(data.result === 'success')
                                {
                                    $('#Quest').val('');
                                    $('#Opt1').val('');
                                    $('#Opt2').val('');
                                    $('#Opt3').val('');
                                    $('#Opt4').val('');
                                    $('#closeEditQuestionModal').click();
                                    alert(data.msg);
                                    document.location.reload(true);
                                }
                                else if(data.result === 'error')
                                {

                                    $('#closeEditQuestionModal').click();
                                }
                            }
                        })
                })
            }
        })
    })



        $(document).on('click','.delete', function(){

            var confirmation = confirm('Are you sure !');
            if(confirmation == true){

                var test_qid = $(this).attr("id");

                $.ajax({
                    url: 'deleteTestQuestion',
                    type: 'POST',
                    data: {'test_qid': test_qid},
                    dataType: 'JSON',
                    success: function(data){
                        if(data.result === 'success')
                        {
                            //          tr.fadeOut(1000,function(){
                            //  $this.remove();
                            // });
                            alert('Question Deleted Successfully.');
                            document.location.reload(true);
                            //location.reload();

                        }
                        else if(data.result === 'error')
                        {
                            alert('Question Not Deleted, Please try again.');
                        }
                    }
                });
            }
        });
    </script>
@endsection
