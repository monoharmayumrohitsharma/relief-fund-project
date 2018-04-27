function validate(){
				var phone = document.forms["form1"]["headphone"].value;
				if(!phone.match(/^([7-9])[0-9]{9}/))
					alert("wrong format");
			return true;
			}
