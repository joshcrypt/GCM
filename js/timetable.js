// JavaScript Document
function fetchdefault(){
	$.post('php/class_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#txtUnit').typeahead({
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
							typeahead.process(data);
						}
					});
				}
			});
			getVenue();
				
		});
}
function addContent(fetch){
	
	if(fetch=='course'){
	$.post('php/displaycourse.php',{},function(data){
		$('#dynamicCont').html(data);
		$('#btnSavecourse').click(function(e) {
		var Coursename=$('#coursename').val();
		var Coursedepartment=$('#department').val();
		var Coursedescription=$('#coursedescription').val();
		var Coursealias=$('#coursealias').val();
		if(Coursename == "" || Coursename == null){
			$('#AlertSpanShow').removeClass().html('Course Name Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
			$('#coursename').focus();
			return false;
		}
		else if(Coursedepartment == '0'){
			$('#AlertSpanShow').removeClass().html('Course Department Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
			$('#coursedescription').focus();
			return false;
		}
		else if(Coursedescription == "" || Coursedescription == null){
			$('#AlertSpanShow').removeClass().html('Course Description Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
			$('#department').focus();
			return false;
		}
		else if(Coursealias == "" || Coursealias == null){
			$('#AlertSpanShow').removeClass().html('Course Alias Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
			$('#coursealias').focus();
			return false;
		}
		else{
		$.post('php/add_Course.php',{
			Coursename:Coursename,
			Coursedepartment:Coursedepartment,
			Coursedescription:Coursedescription,
			Coursealias:Coursealias
		},function(data){
			if(data==1){
				$('#AlertSpanShow').removeClass().html('Course Added Successfully').addClass('alert alert-success').show().fadeOut(10000,0,function(){});
				$('#btnResetcourse').click();					
			}
			else if(data==2){
				$('#AlertSpanShow').removeClass().html('Failed To Add Course').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
			}
			else{
				$('#AlertSpanShow').removeClass().html('An Error Occurred: '+data).addClass('alert alert-error').show().fadeOut(10000,0,function(){});

			}
			});	
		
		}
        });		
		});	
	}
	else if(fetch=='unit'){
		$.post('php/displayunit.php',{},function(data){
		$('#dynamicCont').html(data);
		$('#btnSaveunit').click(function(e) {
            var unitCode=$('#unitcode').val();
			var unitName=$('#unitname').val();
			
			if(unitCode == "" || unitCode==null){
				$('#AlertSpanShow').removeClass().html('Unit Code Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				$('#unitcode').focus();				
			}
			else if(unitName=="" || unitName==null){
				$('#AlertSpanShow').removeClass().html('Unit Name Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				$('#unitname').focus();				
			}
			else{
			$.post('php/add_Unit.php',{
				unitCode:unitCode,
				unitName:unitName,				
			},function(data){
				if(data==1){
					$('#AlertSpanShow').removeClass().html('Unit Successfully Saved').addClass('alert alert-success').show().fadeOut(10000,0,function(){});
					$('#btnResetunit').click();	
				}
				else if(data==2){
					$('#AlertSpanShow').removeClass().html('Failed To Save Unit').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
					$('#btnResetunit').click();	
				}
				//Duplicate entry 'ICS 2301' for key 'PRIMARY'
				else if(data=="Duplicate entry '"+unitCode+"' for key 'PRIMARY'"){
					$('#AlertSpanShow').removeClass().html('Unit Code Already Exists').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
					$('#btnResetunit').click();	
				}
				else{
					$('#AlertSpanShow').removeClass().html('Error Occured: '+data).addClass('alert alert-error').show().fadeOut(10000,0,function(){});
					
				}
				
			});
			}
        });
			
			
		});		
		//alert('data');
		
	}
}
function getcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'drpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#tdcourseSelect').html(data);
	});
	
}
function change_exam_getcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'changedrpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#tdcourseSelect').html(data);
	});
	
}

function edit_course_getcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'editdrpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#edit_exam_tdcourseSelect').html(data);
	});
	
}
function change_class_getcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'classdrpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#tdcourseSelect').html(data);
	});
	
}
function examgetcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'exam_drpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#exam_tdcourseSelect').html(data);
	});
	
}
function edit_examgetcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'edit_exam_drpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#edit_tdcourseSelect').html(data);
	});
	
}
//edit_class_course_getcourse
function edit_class_course_getcourse(dept){
	var deptval=$(dept).val();
	$.post('php/getcoursename.php',
	{
		deptval:deptval,
		selectId:'edit_class_drpcourse',
		onChange:'abc()'	
	},
	function(data){	
		$('#edit_classs_tdcourseSelect').html(data);
	});
	
}


function getVenue(venue){
	$.post('php/getVenues.php',
	{
		selectId:'drpVenue',
		onChange:'venue()'	
	},
	function(data){	
		$('#tdVenue').html(data);
	});
	
}
function examgetVenue(venue){
	$.post('php/getVenues.php',
	{
		selectId:'exam_drpVenue',
		onChange:'venue()'	
	},
	function(data){	
		$('#exam_tdVenue').html(data);
	});
	
}
function edit_examgetVenue(){
	$.post('php/getVenues.php',
	{
		selectId:'edit_exam_drpVenue',
		onChange:'venue()'	
	},
	function(data){	
		$('#edit_exam_tdVenue').html(data);
	});
	
}

function addVenue(){
	bootbox.dialog(''+
					'<table>'+
						'<tr>'+
							'<td><label class="labelstyle">Enter Venue Name</label></td>'+
							'<td></td>'+
							'<td><input type="text" class="input-large" id="txtVenueName" maxLength="20" style="text-transform:uppercase"></td>'+
						'</tr>'+
					'</table>'
					

	,
	[
		{
			"label":"Cancel",
			"class":"btn",
			"callback":function(){
			}
		},
		{
			"label":"Add Venue",
			"class":"btn btn-primary",
			"callback":function(){
				var venue=$('#txtVenueName').val();
				if(venue==''){
					bootbox.alert('Please Enter A Venue');
					return false;
				}
				else{
					$.post('php/addVenue.php',{venue:venue},function(data){
						if(data==1){
							bootbox.alert('Venue Added Successfully');
						}
						else if(data==2){
							bootbox.alert('Adding new venue failed. Please try again',function(){
								addVenue();
							});
							
							
						}
						else if(data==3){
							bootbox.alert('Venue Already Exists',function(){
								addVenue();
							});
							
						}
						else{
							bootbox.alert('An Error Occured : '+data);
							return false;
						}
					});
				}
				
				
			}
		}
	
	],
	{
		"backdrop":"static",
		"keyboard":false
	}
	);
}
$(document).ready(function(e) {
	/*$('#classtt').click(function(e) {
		
		$.post('php/class_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#txtUnit').typeahead({
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
							typeahead.process(data);
						}
					});
				}
			});
			getVenue();
				
		});
		
		
		
    });*/
	$('#click_classtt').click(function(e) {
		
		$.post('php/class_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#txtUnit').typeahead({
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
							typeahead.process(data);
						}
					});
				}
			});
			getVenue();
				
		});
		
		
		
    });
	$('#examtt').click(function(e) {
		
		$.post('php/exam_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#exam_txtUnit').typeahead({
				
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
						typeahead.process(data);
						}
					});
				}
			});
			
			examgetVenue();
				
		});
		
		
		
    });
});
function createclass(){
	
	$.post('php/class_TimeTable.php',{},function(data){
			$('#dynamicCont').html(data);	
			//document.getElementById('drpcourse');	
			
			$('#txtUnit').typeahead({
				source:function(typeahead,query){
					$.ajax({
						url:'php/getUnits.php',
						type:'POST',
						data:'query='+query,
						dataType:"JSON",
						async:'false',
						success: function(data){
							typeahead.process(data);
						}
					});
				}
			});
			getVenue();
				
		});
			
}

function savetimetable(){
	var department=$('#coursedepartment').val();
	var drpcourse=$('#drpcourse').val();
	var yearofstudy=$('#yearofstudy').val();
	var day=$('#day').val();
	var starttime=$('#starttime').val();
	var endtime=$('#endtime').val();
	var txtUnit=$('#txtUnit').val();
	var drpVenue=$('#drpVenue').val();
	var txtLecturersname=$('#txtLecturersname').val();
	
	if(department=='0'){
		$('#AlertSpanTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(drpcourse=='0'){
		$('#AlertSpanTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(yearofstudy=='0'){
		$('#AlertSpanTimetable').removeClass().html('Year of Study Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(day=='0'){
		$('#AlertSpanTimetable').removeClass().html('Day Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(starttime=='0'){
		$('#AlertSpanTimetable').removeClass().html('Start Time Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(endtime=='0'){
		$('#AlertSpanTimetable').removeClass().html('Stop Time Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(txtUnit==''){
		$('#AlertSpanTimetable').removeClass().html('Unit Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(drpVenue=='0'){
		$('#AlertSpanTimetable').removeClass().html('Venue Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else if(txtLecturersname==''){
		$('#AlertSpanTimetable').removeClass().html('Lecturer Is Blank').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
		return false;
	}
	else{
		$.post('php/addClassTimetable.php',{department:department,drpcourse:drpcourse,
		yearofstudy:yearofstudy,day:day,starttime:starttime,endtime:endtime,txtUnit:txtUnit,drpVenue:drpVenue,txtLecturersname:txtLecturersname},
		function(data){
			
			if(data==1){				
				//$('#AlertSpanTimetable').removeClass().html('Record added Successfully').addClass('alert alert-success').show().fadeOut(10000,0,function(){});
				bootbox.confirm('Record added Successfully Do you want to continue creating class timetable', function(result) {
				if(result==true){
				$('#day').val([]);
				$('#starttime').val([]);
				$('#endtime').val([]);
				$('#txtUnit').val('');
				$('#drpVenue').val([]);
				$('#txtLecturersname').val([]);
				
			}
			else{
				$('#cleartable').click();
			}
				
				}); 
		}
			else if(data==2){
				$('#AlertSpanTimetable').removeClass().html('Failed To Save Record').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				$('#cleartable').click();	
			}
			else{
				$('#AlertSpanTimetable').removeClass().html('Error Occured: '+data).addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				
			}
			
		});
	}
}

function fetchtable(ths){
	var idtable = $(ths).attr('id');
	$.post('php/edit_exam_timetable.php',
								{idtable:idtable},
									function(data){
										$('#tableModal').html(data);
										$('#tableModal').modal({
											keyboard: false,
											backdrop:'static'
										});
										//alert(data);
									
							
									});
						
	//alert(idtable);
	
}

function fetchclasstable(ths){
	var idtable = $(ths).attr('id');
	$.post('php/edit_class_timetable.php',
								{idtable:idtable},
									function(data){
										$('#tableModal').html(data);
										$('#tableModal').modal({
											keyboard: false,
											backdrop:'static'
										});
										//alert(data);
									
							
									});
	
}

function viewexamtimetable(){
	//alert('yes');						
	
	var getdepartment = $('#getcoursedepartment').val();
	var tdcourseSelect = $('#changedrpcourse').val();
	var getyearofstudy = $('#getyearofstudy').val();

	if(getdepartment=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(tdcourseSelect=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(getyearofstudy=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Year Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else{
	
	$.post('php/get_editable_exam_timetable.php',{
												getdepartment:getdepartment,
												tdcourseSelect:tdcourseSelect,
												getyearofstudy:getyearofstudy}
												,function(data){
													
													$('#displaycontentmodal').html(data);
													
													
													
													
												});
	}

}

function viewclasstimetable(){
						
	
	var getclassdepartment = $('#classcoursedepartment').val();
	var tdclasscourseSelect = $('#classdrpcourse').val();
	var getclassyearofstudy = $('#classyearofstudy').val();

	if(getclassdepartment=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(tdclasscourseSelect=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(getclassyearofstudy=='0'){
		
		$('#AlertchangeTimetable').removeClass().html('Year Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else{
	
	$.post('php/get_editable_class_timetable.php',{
												getclassdepartment:getclassdepartment,
												tdclasscourseSelect:tdclasscourseSelect,
												getclassyearofstudy:getclassyearofstudy}
												,function(data){
													
													$('#displaycontentmodal').html(data);
													
													
													
													
												});
	}

}

function edittable(ths){
	
	var edittableid = $(ths).attr('id');
	
	$.post('php/fetch_timetables.php',{
										edittableid:edittableid
									},function(data){
										$('#dynamicCont').html(data);										
										});
	
	//alert(edittableid);editdrpcourse,edit_classtimetable
	
	
}

function edit_examtimetable(){
			
	var editclassdepartment = $('#editcoursedepartment').val();
	var editclasscourseSelect = $('#editdrpcourse').val();
	var editclassyearofstudy = $('#edityearofstudy').val();

	//alert(getclassdepartment+tdclasscourseSelect+getclassyearofstudy);
	if(editclassdepartment=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(editclasscourseSelect=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(editclassyearofstudy=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Year Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else{
	
	$.post('php/display_exam_timetable.php',{
												editclassdepartment:editclassdepartment,
												editclasscourseSelect:editclasscourseSelect,
												editclassyearofstudy:editclassyearofstudy}
												,function(data){
													
													$('#displayeditdata').html(data);
													
													

													/*$('#editcoursedepartment').val([]);edit_exam_drpcourse
													$('#editdrpcourse').val([]);
													$('#edityearofstudy').val([]);*/																										
													
													
													
												});
	}
}

function edit_classtimetable(){
	//alert('yes');
			
	var editclassdepartment = $('#editclasscoursedepartment').val();
	var editclasscourseSelect = $('#edit_class_drpcourse').val();
	var editclassyearofstudy = $('#editclassyearofstudy').val();

	//alert(getclassdepartment+tdclasscourseSelect+getclassyearofstudy);
	if(editclassdepartment=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(editclasscourseSelect=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else if(editclassyearofstudy=='0'){
		
		$('#AlerteditExamTimetable').removeClass().html('Year Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
		
	}
	else{
	
	$.post('php/display_class_timetable.php',{
												editclassdepartment:editclassdepartment,
												editclasscourseSelect:editclasscourseSelect,
												editclassyearofstudy:editclassyearofstudy}
												,function(data){
													
													$('#displayeditdata').html(data);
													
													

													/*$('#editcoursedepartment').val([]);edit_exam_drpcourse
													$('#editdrpcourse').val([]);
													$('#edityearofstudy').val([]);*/																										
													
													
													
												});
	}
}


function editTable(table){
	edit_examgetVenue();
	
	var idtable=$(table).attr('id');
	//alert(idtable);
	$.post('php/fetch_edit_timetable.php',{idtable:idtable},function(data){
			edit_examgetVenue();		
			$('#tableModal').html(data);
			$('#tableModal').modal({
				keyboard: false,
				backdrop:'static'
			});
			$('#edit_exam_txtUnit').typeahead({
				source:function(typeahead,query){
				$.ajax({
					url:'php/getUnits.php',
					type:'POST',
					data:'query='+query,
					dataType:"JSON",
					async:'false',
					success: function(data){
					typeahead.process(data);
					}
				});

				}
				
			});
		
		});


}

function editclassTable(table){
	
	edit_examgetVenue();
	
	var idtable=$(table).attr('id');
	//alert(idtable);
	$.post('php/fetch_edit_class_timetable.php',{idtable:idtable},function(data){
			edit_examgetVenue();		
			$('#tableModal').html(data);
			$('#tableModal').modal({
				keyboard: false,
				backdrop:'static'
			});
			$('#edit_exam_txtUnit').typeahead({
				source:function(typeahead,query){
				$.ajax({
					url:'php/getUnits.php',
					type:'POST',
					data:'query='+query,
					dataType:"JSON",
					async:'false',
					success: function(data){
					typeahead.process(data);
					}
				});

				}
				
			});
		
		});


}

function save_edit_examtimetable(ths){
	
	//edit_exam_coursedepartment,edit_exam_yearofstudy,edit_exam_day,edit_exam_starttime,edit_exam_endtime,edit_exam_txtUnit,edit_exam_tdVenue,edit_exam_days_int
	
	var save_edit_id=$(ths).attr('id');
	
	var edit_exam_coursedepartment=$('#edit_exam_coursedepartment').val();
	var edit_exam_drpcourse=$('#edit_exam_drpcourse').val();
	var edit_exam_yearofstudy=$('#edit_exam_yearofstudy').val();
	var edit_exam_day=$('#edit_exam_day').val();
	var edit_exam_starttime=$('#edit_exam_starttime').val();
	var edit_exam_endtime=$('#edit_exam_endtime').val();
	var edit_exam_txtUnit=$('#edit_exam_txtUnit').val();
	var edit_exam_drpVenue=$('#edit_exam_drpVenue').val();
	var edit_exam_days_int=$('#edit_exam_days_int').val();
		
	if(edit_exam_coursedepartment=='0'){
		$('#AlerteditTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_drpcourse=='0'){
		$('#AlerteditTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_yearofstudy=='0'){
		$('#AlerteditTimetable').removeClass().html('Year of Study Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_day=='0'){
		$('#AlerteditTimetable').removeClass().html('Day Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_starttime=='0'){
		$('#AlerteditTimetable').removeClass().html('Start Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_endtime=='0'){
		$('#AlerteditTimetable').removeClass().html('Stop Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_txtUnit==''){
		$('#AlerteditTimetable').removeClass().html('Unit Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_drpVenue=='0'){
		$('#AlerteditTimetable').removeClass().html('Venue Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_days_int==''){
		$('#AlerteditTimetable').removeClass().html('Exam Day Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else{
		var edit_exam_coursedepartment=$('#edit_exam_coursedepartment').val();
		var edit_exam_drpcourse=$('#edit_exam_drpcourse').val();
		var edit_exam_yearofstudy=$('#edit_exam_yearofstudy').val();
		var edit_exam_day=$('#edit_exam_day').val();
		var edit_exam_starttime=$('#edit_exam_starttime').val();
		var edit_exam_endtime=$('#edit_exam_endtime').val();
		var edit_exam_txtUnit=$('#edit_exam_txtUnit').val();
		var edit_exam_drpVenue=$('#edit_exam_drpVenue').val();
		var edit_exam_days_int=$('#edit_exam_days_int').val();
	
		$.post('php/edit_timetable_live.php',{save_edit_id:save_edit_id,edit_exam_coursedepartment:edit_exam_coursedepartment,edit_exam_drpcourse:edit_exam_drpcourse,edit_exam_yearofstudy:edit_exam_yearofstudy,edit_exam_day:edit_exam_day,edit_exam_starttime:edit_exam_starttime,edit_exam_endtime:edit_exam_endtime,edit_exam_txtUnit:edit_exam_txtUnit,edit_exam_drpVenue:edit_exam_drpVenue,edit_exam_days_int:edit_exam_days_int	
			
		},function(data){
			alert(data);
			
		});
	}
}
function save_edit_classtimetable(ths){
	
	//edit_exam_coursedepartment,edit_exam_yearofstudy,edit_exam_day,edit_exam_starttime,edit_exam_endtime,edit_exam_txtUnit,edit_exam_tdVenue,edit_exam_days_int
	
	var save_edit_id=$(ths).attr('id');
	
	var edit_exam_coursedepartment=$('#edit_exam_coursedepartment').val();
	var edit_exam_drpcourse=$('#edit_exam_drpcourse').val();
	var edit_exam_yearofstudy=$('#edit_exam_yearofstudy').val();
	var edit_exam_day=$('#edit_exam_day').val();
	var edit_exam_starttime=$('#edit_exam_starttime').val();
	var edit_exam_endtime=$('#edit_exam_endtime').val();
	var edit_exam_txtUnit=$('#edit_exam_txtUnit').val();
	var edit_exam_drpVenue=$('#edit_exam_drpVenue').val();
	var txtclassLecturersname=$('#txtclassLecturersname').val();
		
	if(edit_exam_coursedepartment=='0'){
		$('#AlerteditTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_drpcourse=='0'){
		$('#AlerteditTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_yearofstudy=='0'){
		$('#AlerteditTimetable').removeClass().html('Year of Study Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_day=='0'){
		$('#AlerteditTimetable').removeClass().html('Day Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_starttime=='0'){
		$('#AlerteditTimetable').removeClass().html('Start Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_endtime=='0'){
		$('#AlerteditTimetable').removeClass().html('Stop Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_txtUnit==''){
		$('#AlerteditTimetable').removeClass().html('Unit Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(edit_exam_drpVenue=='0'){
		$('#AlerteditTimetable').removeClass().html('Venue Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(txtclassLecturersname==''){
		$('#AlerteditTimetable').removeClass().html('Lecturer Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else{
			$.post('php/edit_classtimetable_live.php',{save_edit_id:save_edit_id,edit_exam_coursedepartment:edit_exam_coursedepartment,edit_exam_drpcourse:edit_exam_drpcourse,edit_exam_yearofstudy:edit_exam_yearofstudy,edit_exam_day:edit_exam_day,edit_exam_starttime:edit_exam_starttime,edit_exam_endtime:edit_exam_endtime,edit_exam_txtUnit:edit_exam_txtUnit,edit_exam_drpVenue:edit_exam_drpVenue,txtclassLecturersname:txtclassLecturersname	
			
		},function(data){
			alert(data);
			
		});
	}
}

function saveexamtimetable(){
	var examdepartment=$('#exam_coursedepartment').val();
	var examdrpcourse=$('#exam_drpcourse').val();
	var examyearofstudy=$('#exam_yearofstudy').val();
	var examday=$('#exam_day').val();
	var examstarttime=$('#exam_starttime').val();
	var examendtime=$('#exam_endtime').val();
	var examtxtUnit=$('#exam_txtUnit').val();
	var examdrpVenue=$('#exam_drpVenue').val();
	var examdays=$('#exam_days_int').val();
	
	if(examdepartment=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Department Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examdrpcourse=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Course Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examyearofstudy=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Year of Study Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examday=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Day Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examstarttime=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Start Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examendtime=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Stop Time Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examtxtUnit==''){
		$('#AlertSpanExamTimetable').removeClass().html('Unit Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examdrpVenue=='0'){
		$('#AlertSpanExamTimetable').removeClass().html('Venue Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else if(examdays==''){
		$('#AlertSpanExamTimetable').removeClass().html('Exam Day Is Blank').addClass('alert alert-error').show().fadeOut(5000,0,function(){});
		return false;
	}
	else{
		$.post('php/add_ExamTimetable.php',{examdepartment:examdepartment,examdrpcourse:examdrpcourse,
		examyearofstudy:examyearofstudy,examday:examday,examstarttime:examstarttime,examendtime:examendtime,examtxtUnit:examtxtUnit,examdrpVenue:examdrpVenue,examdays:examdays},
		function(data){
			
			if(data==1){				

				bootbox.confirm('Record added Successfully Do you want to continue creating class timetable', function(result) {
				if(result==true){
				$('#exam_day').val([]);
				$('#exam_starttime').val([]);
				$('#exam_endtime').val([]);
				$('#exam_txtUnit').val('');
				$('#exam_drpVenue').val([]);
				$('#exam_days_int').val([]);
				
			}
			else{
				$('#cleartable').click();
			}
				
				}); 
		}
			else if(data==2){
				$('#AlertSpanExamTimetable').removeClass().html('Failed To Save Record').addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				$('#cleartable').click();	
			}
			else{
				$('#AlertSpanExamTimetable').removeClass().html('Error Occured: '+data).addClass('alert alert-error').show().fadeOut(10000,0,function(){});
				
			}
			
		});
	}
}