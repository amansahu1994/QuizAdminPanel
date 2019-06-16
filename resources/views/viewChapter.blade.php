@extends('master')

@section('css')




@section('breadcrumb')
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">View Chapters</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('viewChapter')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="card-title">Chapters</strong>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="" onclick="addChapter();" href=""><i class="fa fa-plus" aria-hidden="true"></i>  Add</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Chapter Name</th>
                                <th>Subject Name</th>
                                <th>Update/Delete</th>
                            </tr>
                            </thead>
                            <tbody id="listChapters">
                              @foreach($chapters as $chapter)
                                <tr>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$chapter->chapter_name}}</td>
                                  <td>{{$chapter->subject_name}}</td>
                                  <td>
                                    <button type="button" id="{{$chapter->chapter_id}}" class="btn btn-warning edit" data-toggle="modal" href="">
      		        						         <i class="fa fa-edit"></i>
                                       Edit
                                    </button>
      									            <button type="button" class="btn btn-danger delete" id="{{$chapter->chapter_id}}">
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
@endsection
<!--Add Chapter Modal Start -->
<div class="modal" id="addChapter">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Chapter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!--Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class=" form-control-label">Chapter</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <input class="form-control" id="addChapterinputId" placeholder="Enter Chapter Name">
                    </div>
                    <small class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="sel1">Select Subject :</label>
                    <select class="form-control" id="selectSubject">
                      <option value="" disabled selected>Select Subject</option>
                        @foreach($data as $subject)
                            <option value="{{$subject->sub_id}}">
                                    {{$subject->subject_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success saveChapter">
                    <i class="fa fa-floppy-o"></i>
                    Save
                </button>
                <button type="button" id="closeAddChapterModal" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--Add Chapter Modal End -->

<!--Edit Chapter Modal Start -->
<div class="modal" id="editChapterModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Chapter</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <label class=" form-control-label">Chapter</label>
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                        <input class="form-control" id="editChapterInputId" placeholder="Enter Chapter Name">
                    </div>
                    <small class="form-text text-muted"></small>

                    <div class="form-group">
                    <label for="sel1">Select Subject :</label>
                    <select class="form-control" id="selectSubject1">
                            <option value="" disabled selected>Select Subject</option>
                        @foreach($data as $subject)
                            <option value="{{$subject->sub_id}}">
                                    {{$subject->subject_name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success updateChapter" id="">
                    <i class="fa fa-floppy-o"></i>
                    Save
                </button>
                <button type="button" id="closeEditChapterModal" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!--Edit Chapter Modal End -->

<!-- Modal -->
<div class="modal" id="successModal">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body text-center">
                <p>Success</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@section('jquery')

    <script type="text/javascript">
        jQuery(document).ready(function(){

            $.ajax({
                url: 'getChapters',
                type: "GET",
                success: function(data){
                  //  console.log(data)
                    var trBody = ''
                    $.each(data.data,function(index,item){
                        trBody = trBody + '<tr><td>'+(index+1)
                            +'<td>'+item.chapter_name+'</td>'
                            +'<td>'+item.subject_name+'</td>'
                            +'<td>'+
                            `<button type="button" id="`+item.chapter_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
		        						<i class="fa fa-edit"></i>
                                            		Edit
                                            	</button>
									<button type="button" class="btn btn-danger delete"
												id="`+item.chapter_id+`">
													<i class="fa fa-trash-o "></i>
													Delete
												</button>
		        					`
                            +'</td>'
                        '</td></tr>'
                    })
                    $('#listChapters').empty();
                    $('#listChapters').append(trBody);
                }
            });
        })

        jQuery(document).on('click','.edit', function(){
            var chapter_id = $(this).attr("id");

            $.ajax({
                url: 'getChapter',
                type: 'GET',
                data: {'chapter_id': chapter_id},
                dataType: 'JSON',
                success: function(data){
                    $('#editChapterInputId').val(data.data['0'].chapter_name);
                    $('.updateChapter').attr('id',data.data['0'].chapter_id);
                    $('#editChapterModal').modal('show');


                    var sub_id=0;
                    $('#selectSubject1').on('change',function() {
                        window.sub_id = this.value;
                    });
                    $('.updateChapter').on('click', function(){
                        var chapter_id = $(this).attr("id");
                        var chapter_name = $('#editChapterInputId').val();
                        //console.log(chapter_id+'-'+chapter_name+'-'+window.sub_id);
                        $.ajax({
                        url: 'editChapter',
                        type: 'POST',
                        data: {'chapter_id': chapter_id, 'chapter_name': chapter_name, 'sub_id' : window.sub_id},
                        dataType: 'JSON',
                        success: function(data){

                            if(data.result === 'success')
                            {
                                $("#editChapterInputId").val('')
                                $('#closeEditChapterModal').click()
                                alert('Updated Successfully.');
                                /*--------*/
                                var trBody = ''
                                $.each(data.data,function(index,item){
                                    trBody = trBody + '<tr><td>'+(index+1)
                                        +'<td>'+item.chapter_name+'</td>'
                                        +'<td>'+item.subject_name+'</td>'
                                        +'<td>'+
                                        `<button type="button" id="`+item.chapter_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
                                    <i class="fa fa-edit"></i>
                                                            Edit
                                                          </button>
                              <button type="button" class="btn btn-danger delete"
                                    id="`+item.chapter_id+`">
                                      <i class="fa fa-trash-o "></i>
                                      Delete
                                    </button>
                                  `
                                        +'</td>'
                                    '</td></tr>'
                                })
                                $('#listChapters').empty();
                                $('#listChapters').append(trBody);
                                /*--------*/
                            }
                            else if(data.result === 'error')
                            {
                                $("#editChapterInputId").val('')
                                $('#closeEditChapterModal').click()
                                alert('Not Updated, Please try again.');
                            }
                        }
                    });
                    })

                }
            });
        })


        $(document).on('click','.delete', function(){
            var confirmation = confirm('Are you sure !');
            if(confirmation == true){

                var chapter_id = $(this).attr("id");

                $.ajax({
                    url: 'deleteChapter',
                    type: 'POST',
                    data: {'chapter_id': chapter_id},
                    dataType: 'JSON',
                    success: function(data){
                        if(data.result === 'success')
                        {
                            //     		tr.fadeOut(1000,function(){
                            // 	$this.remove();
                            // });
                            alert('Chapter Deleted Successfully.');
                            /*--------*/
                            var trBody = ''
                            $.each(data.data,function(index,item){
                                trBody = trBody + '<tr><td>'+(index+1)
                                    +'<td>'+item.chapter_name+'</td>'
                                    +'<td>'+item.subject_name+'</td>'
                                    +'<td>'+
                                    `<button type="button" id="`+item.chapter_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
                                <i class="fa fa-edit"></i>
                                                        Edit
                                                      </button>
                          <button type="button" class="btn btn-danger delete"
                                id="`+item.chapter_id+`">
                                  <i class="fa fa-trash-o "></i>
                                  Delete
                                </button>
                              `
                                    +'</td>'
                                '</td></tr>'
                            })
                            $('#listChapters').empty();
                            $('#listChapters').append(trBody);
                            /*--------*/

                        }
                        else if(data.result === 'error')
                        {

                            alert('Chapter Not Deleted, Please try again.');
                        }
                    }
                });
            }

        })



        function addChapter()
        {

          //console.log('---');
            var sub_id=0;

            $('#addChapter').modal('show');
            $('#selectSubject').on('click',function() {
                window.sub_id = this.value;
            });
            //console.log(sub_id);

              $('.saveChapter').on('click', function() {
                  var chapter_name = $("#addChapterinputId").val();
                //  console.log(chapter_name);
                    $.ajax({
                      url: 'addChapter',
                      type: "POST",
                      data: {'chapter_name': chapter_name, 'sub_id': window.sub_id},
                      dataType: 'JSON',
                      success: function(data){
                        //  console.log(data)
                          var datas=data;
                        //  console.log(datas)
                          if(datas.result === 'success')
                          {

                              $("#addChapterinputId").val('')
                              $('#closeAddChapterModal').click()
                              /*--------*/
                              var trBody = ''
                              $.each(datas.data,function(index,item){
                                  trBody = trBody + '<tr><td>'+(index+1)
                                      +'<td>'+item.chapter_name+'</td>'
                                      +'<td>'+item.subject_name+'</td>'
                                      +'<td>'+
                                      `<button type="button" id="`+item.chapter_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
                                  <i class="fa fa-edit"></i>
                                                          Edit
                                                        </button>
                            <button type="button" class="btn btn-danger delete"
                                  id="`+item.chapter_id+`">
                                    <i class="fa fa-trash-o "></i>
                                    Delete
                                  </button>
                                `
                                      +'</td>'
                                  '</td></tr>'
                              })
                              $('#listChapters').empty();
                              $('#listChapters').append(trBody);
                              /*--------*/
                          }
                          else if(datas.result === 'error')
                          {
                              $("#addChapterinputId").val('');
                              $('#closeAddChapterModal').click();
                          }

                      }
                  });
              });
            }


    </script>
@endsection
