function checkForm(form) {


			  if(form.fname.value == "") {
      				  alert("Error: Firstname cannot be blank!");
     				 form.fname.focus();
    				  return false;
      			 }

   			  re = /^[A-Z]+$/;
  			  if(!re.test(form.fname.value)) {
     			 	 alert("Error: First Name must be consist of captial characters only!");
     				 form.fname.focus();
     				 return false;
   			 }

			

					if(form.mail.value == "") {
    						  alert("Error: Mail cannot be blank!");
     						  form.mail.focus();
     						  return false;
   					 }
  			 		 re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  			  		if(!re.test(form.mail.value)) {
   				  		 alert("Error: mail must contain only letters, numbers and underscores!");
    				 		 form.mail.focus();
   				 		  return false;
    					}
				
			 
	
  			  if(form.pwd1.value != "" && form.pwd1.value == form.pwd2.value) {
   					   if(form.pwd1.value.length < 8) {
       						 alert("Error: Password must contain at least 8 characters!");
     						   form.pwd1.focus();
     						   return false;
    					  }
    					  if(form.pwd1.value == form.username.value) {
     						   alert("Error: Password must be different from Username!");
     						   form.pwd1.focus();
        					   return false;
  					    }
    					  re = /[0-9]/;
    					  if(!re.test(form.pwd1.value)) {
     						   alert("Error: password must contain at least one number (0-9)!");
       						   form.pwd1.focus();
      						   return false;
     						 }
    					  re = /[a-z]/;
    					  if(!re.test(form.pwd1.value)) {
     						   alert("Error: password must contain at least one lowercase letter (a-z)!");
     						   form.pwd1.focus();
       						   return false;
    					  }
   					   re = /[A-Z]/;
   					   if(!re.test(form.pwd1.value)) {
  						      alert("Error: password must contain at least one uppercase letter (A-Z)!");
  						      form.pwd1.focus();
 						       return false;
 					     }
					   re = /[\W_]/g;
   					   if(!re.test(form.pwd1.value)) {
  						      alert("Error: password must contain at least onespecial character");
  						      form.pwd1.focus();
 						       return false;
 					     }
					
  				  } 
				else {
     					 alert("Error: Please check that you've entered and confirmed your password!");
     					 form.pwd1.focus();
     					 return false;
   				 }

   				
  				

			
  					

			 		
    			  		  

   alert("You entered a valid password: " + form.pwd1.value);			
 return true;
			
  }

