// NOTE : Put the label tag below the input/textarea tag

$(document).ready(function(){
	
  $("input").blur(function(){
	   if($(this).val()!=""){
		   $(this).siblings("label").addClass("fl-active");
	   }else{
		    $(this).siblings("label").removeClass("fl-active");
	   }
  });	
  $("textarea").blur(function(){
	   if($(this).val()!=""){
		   $(this).siblings("label").addClass("fl-active");
	   }else{
		    $(this).siblings("label").removeClass("fl-active");
	   }
  });	
});
