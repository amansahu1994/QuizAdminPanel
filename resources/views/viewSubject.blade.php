@extends('master')

@section('css')




@section('breadcrumb')
			<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">View Subjects</li>
                        </ol>
                    </div>
                </div>
            </div>
@endsection

@section('viewSubject')
			<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            	<div class="row">
                    				<div class="col-md-6">
                                		<strong class="card-title">Subjects</strong>
                                	</div>
                                	<div class="col-md-6">
                                		<button type="button" class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#addSubject" href=""><i class="fa fa-plus" aria-hidden="true"></i>  Add</button>
                                	</div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                        	<th>S.No</th>
                                            <th>Subject Name</th>
                                            <th>Update/Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listSubjects">
																			@foreach($subjects as $subject)
																				<tr>
																					<td>{{$loop->iteration}}</td>
																					<td>{{$subject->subject_name}}</td>
																					<td>
																						<button type="button" id="{{$subject->sub_id}}" class="btn btn-warning edit" data-toggle="modal" href="">
													        						<i class="fa fa-edit"></i>
                                            		Edit
                                          	</button>
																						<button type="button" class="btn btn-danger delete"
																							id="{{$subject->sub_id}}">
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
			<!--Add Subject Modal Start -->
			<div class="modal" id="addSubject">
		    	<div class="modal-dialog">
		      		<div class="modal-content">

				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Add Subject</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>

				        <!--Modal body -->
				        <div class="modal-body">
				          <div class="form-group">
                                <label class=" form-control-label">Subject</label>
                                  <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                      <input class="form-control" id="addSubjectinputId" placeholder="Enter Subject Name">
                                    </div>
                                        <small class="form-text text-muted"></small>
                          </div>
				        </div>

				        <!-- Modal footer -->
				        <div class="modal-footer">
				          <button type="button" class="btn btn-success"
				          onclick="addSubject();">
				          	<i class="fa fa-floppy-o"></i>
				          	Save
				          </button>
				          <button type="button" id="closeAddSubjectModal" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>

		        	</div>
		       	</div>
		    </div>
		    <!--Add Subject Modal End -->

		    <!--Edit Subject Modal Start -->
			<div class="modal" id="editSubjectModal">
		    	<div class="modal-dialog">
		      		<div class="modal-content">

				        <!-- Modal Header -->
				        <div class="modal-header">
				          <h4 class="modal-title">Edit Subject</h4>
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>

				        <!-- Modal body -->
				        <div class="modal-body">
				          <div class="form-group">
                                    <label class=" form-control-label">Subject</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-book"></i></div>
                                        <input class="form-control" id="editSubjectInputId" placeholder="Enter Subject Name">
                                    </div>
                                        <small class="form-text text-muted"></small>
                          </div>
				        </div>

				        <!-- Modal footer -->
				        <div class="modal-footer">
				          <button type="button" class="btn btn-success updateSubject" id="">
				          	<i class="fa fa-floppy-o"></i>
				          	Save
				          </button>
				          <button type="button" id="closeEditSubjectModal" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>

		        	</div>
		       	</div>
		    </div>
		    <!--Edit Subject Modal End -->

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
    	$(document).ready(function(){

    		$.ajax({
		        url: 'getSubjects',
		        type: "GET",
		        success: function(data){

		        	var trBody = '';
		        	$.each(data.data,function(index,item){
		        		trBody = trBody + '<tr><td>'+(index+1)
		        					+'<td>'+item.subject_name+'</td>'
		        					+'<td>'+
		        					`<button type="button" id="`+item.sub_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
		        						<i class="fa fa-edit"></i>
                                            		Edit
                                            	</button>
									<button type="button" class="btn btn-danger delete"
												id="`+item.sub_id+`">
													<i class="fa fa-trash-o "></i>
													Delete
												</button>
		        					`
		        					+'</td>'
		        					'</td></tr>'
		        	})
							$('#listSubjects').empty();
		        	$('#listSubjects').append(trBody);
		        }
    		});
    	})

    	$(document).on('click','.edit', function(){
    		var sub_id = $(this).attr("id");
    		$.ajax({
    			url: 'getSubject',
    			type: 'GET',
    			data: {'sub_id': sub_id},
    			dataType: 'JSON',
    			success: function(data){
    				$('#editSubjectInputId').val(data.data['0'].subject_name);
    				$('.updateSubject').attr('id',data.data['0'].sub_id);
						$('#editSubjectModal').modal('show');
    			}
    		});
    	})

    	$(document).on('click','.updateSubject', function(){
    		var sub_id = $(this).attr("id");
    		var subject_name = $('#editSubjectInputId').val();
    		$.ajax({
    			url: 'editSubject',
    			type: 'POST',
    			data: {'sub_id': sub_id, 'subject_name': subject_name},
    			dataType: 'JSON',
    			success: function(data){

    				if(data.result === 'success')
		        	{
		        		$("#editSubjectInputId").val('')
		        		$('#closeEditSubjectModal').click()
		        		alert(data.msg);
		        		/*----------*/
								var trBody = ''
								$.each(data.data,function(index,item){
									
									trBody = trBody + '<tr><td>'+(index+1)
												+'<td>'+item.subject_name+'</td>'
												+'<td>'+
												`<button type="button" id="`+item.sub_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
													<i class="fa fa-edit"></i>
																									Edit
																								</button>
										<button type="button" class="btn btn-danger delete"
													id="`+item.sub_id+`">
														<i class="fa fa-trash-o "></i>
														Delete
													</button>
												`
												+'</td>'
												'</td></tr>'
								})
								$('#listSubjects').empty();
								$('#listSubjects').append(trBody);
								/*----------*/
		        	}
		        	else if(data.result === 'error')
		        	{
		        		$("#editSubjectInputId").val('')
		        		$('#closeEditSubjectModal').click()
		        		alert(data.msg);
		        	}
    			}
    		});
    	})

    	$(document).on('click','.delete', function(){
    		var confirmation = confirm('Are you sure !');
    		if(confirmation == true){

    			var sub_id = $(this).attr("id");
	    		$.ajax({
	    			url: 'deleteSubject',
	    			type: 'POST',
	    			data: {'sub_id': sub_id},
	    			dataType: 'JSON',
	    			success: function(data){
	    				if(data.result === 'success')
			        	{
			    //     		tr.fadeOut(1000,function(){
							// 	$this.remove();
							// });
			        		alert(data.msg);
									/*----------*/
									var trBody = ''
									$.each(data.data,function(index,item){
										trBody = trBody + '<tr><td>'+(index+1)
													+'<td>'+item.subject_name+'</td>'
													+'<td>'+
													`<button type="button" id="`+item.sub_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
														<i class="fa fa-edit"></i>
																										Edit
																									</button>
											<button type="button" class="btn btn-danger delete"
														id="`+item.sub_id+`">
															<i class="fa fa-trash-o "></i>
															Delete
														</button>
													`
													+'</td>'
													'</td></tr>'
									})
									$('#listSubjects').empty();
									$('#listSubjects').append(trBody);
									/*----------*/

			        	}
			        	else if(data.result === 'error')
			        	{
			        		alert(data.msg);
			        	}
	    			}
	    		});
    		}

    	})

    	function addSubject()
    	{

    		if($("#addSubjectinputId").val())
    		{
    			$.ajax({
		        url: 'addSubject',
		        type: "POST",
		        data: {'subject_name': $("#addSubjectinputId").val()},
		        dataType: 'JSON',
		        success: function(data){

		        	if(data.result === 'success')
		        	{

		        		$("#addSubjectinputId").val('');
		        		$('#closeAddSubjectModal').click();
								alert(data.msg);
								/*----------*/
								var trBody = ''
								$.each(data.data,function(index,item){
									trBody = trBody + '<tr><td>'+(index+1)
												+'<td>'+item.subject_name+'</td>'
												+'<td>'+
												`<button type="button" id="`+item.sub_id+`" class="btn btn-warning edit" data-toggle="modal" href="">
													<i class="fa fa-edit"></i>
																									Edit
																								</button>
										<button type="button" class="btn btn-danger delete"
													id="`+item.sub_id+`">
														<i class="fa fa-trash-o "></i>
														Delete
													</button>
												`
												+'</td>'
												'</td></tr>'
								})

								$('#listSubjects').empty();
								$('#listSubjects').append(trBody);
								/*----------*/
		        	}
		        	else if(data.result === 'error')
		        	{
		        		$("#addSubjectinputId").val('');
		        		$('#closeAddSubjectModal').click();
								alert(data.msg);
		        	}

		        }
    		});
    		}
    	}
    	// function editSubject()
    	// {
    	// 	if($("#editSubjectinputId").val())
    	// 	{
    	// 		$.ajax({
		   //      url: 'editsubject',
		   //      type: "POST",
		   //      data: {
		   //      	'new_subject_name': $("#editSubjectinputId").val(),
		   //      	'old_subject_name':document.cookie.split('=')[1]
		   //  	},
		   //      dataType: 'JSON',
		   //      success: function(data){
		   //      	document.cookie="old_subject_value=''"
		   //      	if(data.result === 'success')
		   //      	{
		   //      		$("#editSubjectinputId").val('')
		   //      		$('#closeEditSubjectModal').click()
		   //      	}
		   //      	else if(data.result === 'error')
		   //      	{
		   //      		$("#editSubjectinputId").val('')
		   //      		$('#closeEditSubjectModal').click()
		   //      	}
		   //      }
    	// 	});
    	// 	}
    	// }
    	// function deleteSubject(subject)
    	// {
    	// 	$.ajax({
		   //      url: 'deletesubject',
		   //      type: "POST",
		   //      data: {'subject_name':subject},
		   //      dataType: 'JSON',
		   //      success: function(data){
		   //      	$('#listSubjects').append(trBody).empty()
		   //      	var trBody = ''
		   //      	$.each(data.data,function(index,item){
		   //      		trBody = trBody + '<tr><td>'+(index+1)
		   //      					+'<td>'+item.subject_name+'</td>'
		   //      					+'<td>'+
		   //      					`<button type="button" class="btn btn-warning"                                            	onclick="setOldSubjectValue( '`+ item.subject_name+`' );"                                            		data-toggle="modal" data-target="#editSubject" href="">                                        		<i class="fa fa-edit"></i>
     //                                        		Edit
     //                                        	</button>
					// 							<button type="button" class="btn btn-danger"
					// 							onclick="deleteSubject('`+ item.subject_name+`' );">
					// 								<i class="fa fa-trash-o "></i>
					// 								Delete
					// 							</button>
		   //      					`
		   //      					+'</td>'
		   //      					'</td></tr>'
		   //      	})
		   //      	$('#listSubjects').append(trBody)
		   //      }
    	// 	});
    	// }
    	// function setOldSubjectValue(setOldSubjectValue)
    	// {
    	// 	// var Cookies = window.Cookies;
    	// 	document.cookie="old_subject_value="+setOldSubjectValue
    	// 	console.log()
    	// }
    </script>
@endsection
