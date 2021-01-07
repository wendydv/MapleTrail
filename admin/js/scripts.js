// Get the current year for the copyright
$('#year').text(new Date().getFullYear());

$(document).ready(function(){	
	 
	 //CKEditor 5
	 ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
	 

	 //Check all checkBoxes
	 
	 $('#selectAllBoxes').click(function(event){
		
		 if(this.checked){
			
			 $('.checkBoxes').each(function(){
				this.checked = true;
			});
		} else {
			
			$('.checkBoxes').each(function(){
				this.checked = false;
			});
		}
	 });
	 
   //load style
 
  var div_box = "<div id='load-screen'><div id='loading'></div></div>";
	 
   $('body').prepend(div_box);
	 
	$('#load-screen').delay(700).fadeOut(600, function(){
		$(this).remove();
	});
 
 });  


function loadUsersOnline() {
	
	$.get("functions.php?onlineusers=result", function(data){
		$(".usersonline").text(data);
		
	});
}

// with setInterval function the loadUsersOnline is call every 5secs
setInterval(function(){
  loadUsersOnline();
},500);




