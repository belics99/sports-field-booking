$("#next").click(function(){
	$(".calendar_table").load("next.php",{"getDay":$("#dayGet").text()});
});
$("#today").click(function(){
	$(".calendar_table").load("today.php",{"getDay":$("#dayGet").text()});
});
$("#previous").click(function(){
	$(".calendar_table").load("previous.php",{"getDay":$("#dayGet").text()});
});

$("#formRes").submit(function(event){
 	event.preventDefault();

 	let field = $("#field_num").val();
 	let date = $("#date").val();
 	let start = $("#start_time").val();
 	let end = $("#end_time").val();
 	let user = $("#user").val();

 	let today = new Date();
	let dd = String(today.getDate()).padStart(2, '0');
	let mm = String(today.getMonth() + 1).padStart(2, '0');
	let yyyy = today.getFullYear();
	today = mm + '/' + dd + '/' + yyyy;

	if(date>=today && end>start){
		$.ajax({
	 		url:"book_process.php",
	 		type:"post",
	 		dataType:"html",
	 		data:{
	 			field_x:field,
	 			date_x:date,
	 			start_x:start,
	 			end_x:end,
	 			user_x:user
	 		},
	 		success:function(res){
	 			/*just back something to a user if he makes a mess in inserting data
				101 - all cool
				102 - if some smart guy in some way pass data in the wrong way, meaning on start time that is greater than end time
				103 - again if some smart guy trying to break in
				104 - already booked or past
	 			*/
	 			if(res==101){
	 				alert("Successfully booked\n "+field+"\n Time: "+start+" - "+end+"\n Day: "+date+"\n Name: "+user); location.reload();
	 			}else if(res==104){
	 				alert(field+" in time period:\n"+start+" - "+end+" \nday: "+date+"\nis already booked or past.");
	 			}else if(res==102){
					alert("Start time needs to be less than end time!");
	 			}else{
	 				//103
	 				alert(res);
	 			} 			
	 			//alert(res);
	 		},
 		});
	}
	else{
		//just back something to a user if he makes a mess in inserting data
		alert("Already booked or past!\n Try again.");
	}
 	
});