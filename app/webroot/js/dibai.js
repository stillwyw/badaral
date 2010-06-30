$(document).ready(function(){  
	
});


	function addWord(form){
		var datas = $(form).serialize();
		$(form).children().attr('disabled','disabled');
		$.ajax({
		  url: '/words/add',
		  type: 'POST',
		  dataType: 'json',
		  data: datas,
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    //called when successful
				$(form).children().removeAttr('disabled');
				$("#word-list :first-child").before("<li>"+data.word+"["+data.language+"] : "+data.description+"</li>");
				 

		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		    alert(errorThrown);
    		$(form).children().removeAttr('disabled');

		  }
		});	
   	 	return false;
	}
	
	function addGuest (form) {
		var datas = $(form).serialize();
		$(form).children().attr('disabled','disabled');
		$.ajax({
		  url: '/guest/add',
		  type: 'POST',
		  dataType: 'json',
		  data: datas,
		  complete: function(xhr, textStatus) {
		    //called when complete
		  },
		  success: function(data, textStatus, xhr) {
		    //called when successful
				$(form).children().removeAttr('disabled');
				$("#guest-list :first-child").before("<li>"+data.word+"["+data.language+"] : "+data.description+"</li>");
				 

		  },
		  error: function(xhr, textStatus, errorThrown) {
		    //called when there is an error
		    alert(errorThrown);
    		$(form).children().removeAttr('disabled');

		  }
		});	
   	 	return false;
	}
