$("#role").change(function(){
    const role = $("#role").val()
    if(role == 0) {
        $(".driver").removeAttr("required")
        $(".driver").hide()
    }
    else {
        $(".driver").show()
    }
})