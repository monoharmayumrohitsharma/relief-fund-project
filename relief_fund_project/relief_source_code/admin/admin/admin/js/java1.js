function checkValidState(){
	var states = ['Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chhattisgarh','Goa','Gujarat',
					'Haryana','Himachal Pradesh','Jammu and Kashmir','Jharkhand','Karnataka','Kerala',
					'Madhya Pradesh','Maharashtra','Manipur','Meghalayab','Mizoram','Nagaland','Odisha,Punjab',
					'Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal',
					'Andaman and Nicobar','Chandigarh','Dadra and Nagar Haveli','Daman and Diu','Lakshadweep',
					'Delhi','Puducherry'];
	var ustate = document.forms["myForm1"]["state"].value ;
	


}


function validateForm() {
    var ustate = document.forms["myForm1"]["state"].value;
    var states = ['Andhra Pradesh','Arunachal Pradesh','Assam','Bihar','Chhattisgarh','Goa','Gujarat',
					'Haryana','Himachal Pradesh','Jammu and Kashmir','Jharkhand','Karnataka','Kerala',
					'Madhya Pradesh','Maharashtra','Manipur','Meghalayab','Mizoram','Nagaland','Odisha,Punjab',
					'Rajasthan','Sikkim','Tamil Nadu','Telangana','Tripura','Uttar Pradesh','Uttarakhand','West Bengal',
					'Andaman and Nicobar','Chandigarh','Dadra and Nagar Haveli','Daman and Diu','Lakshadweep',
					'Delhi','Puducherry'];
	for(var i=0;i<array.length(states);i++){
		if(ustate.match(/karnataka/i))
		{	
			alert("matched");
			return true ;
		}
	}
}