$(document).ready(function(){
    $(document).on("submit","#loginForm", function(e){
        e.preventDefault();
        // get all form data
        let formData = new FormData(this);
        formData.append("login","login");
        // get & post request in jquery
        $.ajax({
            type: "POST",
            url:"php/login.php",
            data: formData,
            contentType: false,
            processData: false,

            // get response
            success: function(response) {
                if(response == "success"){
                    console.log("Redirecting to users.php...");
                    window.location.href = "users.php";
                }else{
                    console.log("Login failed.");
                    $("#errors").css("display", "block");
                    $("#errors").html(response);
                }
                
            }
            
        })
    })
})
