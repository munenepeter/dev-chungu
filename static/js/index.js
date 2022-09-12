


$("#signin").submit(function (event) {
    event.preventDefault();
    $.ajax({
        type: 'POST',
        url: '/signin',
        data: $(this).serialize(),
        success: function (data) {
            if (typeof data === 'object' && data !== null) {
                data = JSON.stringify(JSON.parse(data));
                notify(data);
            } else {
                data = JSON.parse(data);
                if (data === "logged_in") {
                    window.location.replace("/dashboard");
                    notify("Success Login");
                }
                notify(data);
            }
        }
    });
});


