$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#is-available', function() {
        const value = $(this).data('val')

        const avail = (value == 0) ? 'unavailable' : 'available' 
        alertify.confirm('Change Availability', `Are you sure you want to set your self <b>${avail}</b> ?`, function(){ 
            setAvailability(value)
            alertify.success("Availability changed")
            setTimeout(() => {
                location.reload()
            }, 1000) 
        }, function(){});
    });

    const setAvailability = (value) => {
        $.post("/set-availability", {is_available: value}, function (r) {
            console.log(r)
        })
    }
});