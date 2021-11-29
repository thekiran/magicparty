var objRegExp = /^[a-z0-9]([a-z0-9_\-\.]*)@([a-z0-9_\-\.]*)(\.[a-z]{2,3}(\.[a-z]{2}){0,2})$/i;
$(document).ready(function() {
	$("#bookNowBtn").click(function() {
	    var prefixname = document.getElementById("prefixName").value;
        var nameaddress = document.getElementById("nameaddress").value;
        var email = document.getElementById("email").value;
        var countrycode = document.getElementById("countryCode").value;
        var contactnumber = document.getElementById("contactnumber").value;
        var dateofparty = document.getElementById("dateofparty").value;
        var timeofparty = document.getElementById("timeofparty").value;
        var childname = document.getElementById("childname").value;
        var childgender = document.getElementById("childgender").value;
        var childbirthdate = document.getElementById("childbirthdate").value;
        var message = document.getElementById("message").value;
        if(nameaddress == "")
		{
			$('#epreview').text("Name Required.");
			document.getElementById("nameaddress").focus();
			return false;
		}
		else if(email == "")
		{
			$('#epreview').text("Email Address Required.");
			document.getElementById("email").focus();
			return false;
		}
		else if(!objRegExp.test(email))
		{
			$('#epreview').text("Email Address Invalid.");
			document.getElementById('email').focus();
			return false;
        }
		else if(contactnumber == "")
		{
			$('#epreview').text("Contact Number Required.");
			document.getElementById("contactnumber").focus();
			return false;
		}
		else if(dateofparty == "")
		{
			$('#epreview').text("Date of Party Required.");
			document.getElementById("dateofparty").focus();
			return false;
		}
		else if(childname == "")
		{
			$('#epreview').text("Child Name Required.");
			document.getElementById("childname").focus();
			return false;
		}
		else if(childgender == "")
		{
			$('#spreview').text("");
			$('#epreview').text("Child Gender Required.");
			document.getElementById("childgender").focus();
			return false;
		}
		else if(childbirthdate == "")
		{
			$('#epreview').text("Child Birthdate Required.");
			document.getElementById("childbirthdate").focus();
			return false;
		}
		else
		{
	        $('#epreview').text("");
			$.ajax({
                type: 'POST',
                url: 'https://magicparty.sg/booknow_form_submit.php',
                dataType: 'json',
                data: {
                    prefixname1: prefixname,
                    nameaddress1: nameaddress,
                    email1: email,
                    countrycode1: countrycode,
                    contactnumber1: contactnumber,
                    dateofparty1: dateofparty,
                    timeofparty1: timeofparty,
                    childname1: childname,
                    childgender1: childgender,
                    childbirthdate1: childbirthdate,
                    message1: message
				},				
				success: function (data) {
					if(data.results == "success")
					{
						$('#epreview').text("");
						$('#bookNowForm')[0].reset();
						$('#myModal').modal('show');
					}
				}
			});
		}
	});
});