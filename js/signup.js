$(document).ready(function(){
    $(document).on("submit","#signupData", function(e){
        e.preventDefault();
        // get all form data
        let formData = new FormData(this);
        formData.append("Signup","Signup");
        // get & post request in jquery
        $.ajax({
            type: "POST",
            url:"php/signup.php",
            data: formData,
            contentType: false,
            processData: false,
            // get response
            success: function(response) {
                console.log("Response:", response);
                if(response == "success"){
                    window.location.href = "login.php";
                }else{
                    $("#errors").css("display", "block");
                    $("#errors").html(response);
                }
            }
        })
    })
})
