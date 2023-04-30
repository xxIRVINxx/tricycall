let globalDriverId
let bookingId
$(".book").click(function(e) {
    const data = $(this).data('driver')
    $("#name").html(data.firstname+" "+data.lastname)
    $("#address").html(data.address)
    $("#phone").html(data.phone)
    $("#plate").html(data.plateno)
    $("#description").html(data.description)
    // $(".accept-btn").attr('data-id', data.id)
    globalDriverId = data.id
    $("#myPopup").removeAttr('style')    
})

$(".accept-btn-avail").click(function(e){
    $.post("book", {driver_id: globalDriverId}, function(r) {
        if(r == 1)
            alertify.success("Booking has been made.")
        else
            alertify.error("An error occured")
    })
    $("#myPopup").removeAttr('style')  
    setTimeout(() => {
        location.reload()
    }, 1500)
})

$(".show-popup").click(function(e) {
    const data = $(this).data('value')
    $("#name").html(data.customer.firstname+" "+data.customer.lastname)
    $("#address").html(data.customer.address)
    $("#phone").html(data.customer.phone)
    $("#plate").html(data.customer.plateno)
    $("#description").html(data.customer.description)
    bookingId = data.id
    globalDriverId = data.id
    $("#myPopup").removeAttr('style')    
})

$(".cancel-popup").click(function(e) {
    const data = $(this).data('value')
    const driverId = data.driver.id
    alertify.confirm('Cancel booking?', `Are you sure you want to cancel your booking ?`, function(){ 
        bookingId = data.id 
        $.post("/booking-response", {status: 'Cancelled', bookingId, driver: driverId}, function(r) {
            if(r == 1)
                alertify.success(`Booking has been Cancelled`)
            else
                alertify.error("An error occured")
            setTimeout(() => {
                location.reload()
            }, 1500)
            
        })
    }, function(){});
})

const response = (status) => {
    $.post("/booking-response", {status, bookingId}, function(r) {
        if(r == 1)
            alertify.success(`Booking has been ${status}`)
        else
            alertify.error("An error occured")
        $("#myPopup").removeAttr('style')  
        setTimeout(() => {
            location.reload()
        }, 1500)
        
    })
}
