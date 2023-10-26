$(document).ready(function () {
    var quoteForm = $('#quoteForm');

    if (quoteForm.length > 0) {
        quoteForm.submit(function (event) {
            event.preventDefault();
            var formData = new FormData(this);
            $('#loadingSVG').show();
            $('#normalSVG').hide();
            $('#btnMessage').text("Sending...");

            $.ajax({
                url: 'index/intent/sendqoute',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#btnMessage').text("Get Your Custom Quote");
                    if (response.errors) {
                        // Handle errors
                        console.log('Errors:', response.errors);
                    } else if (response.success) {
                        // Handle success
                        console.log('Success:', response.success);
                        resetForm();
                        $('#closeQouteModal').click();
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                },
                complete: function () {
                    $('#loadingSVG').hide();
                    $('#normalSVG').show();
                    $('#btnMessage').text("Get Your Custom Quote");
                },
            });
        });
    }

    function resetForm() {
        if (quoteForm.length > 0) {
            quoteForm[0].reset();
        }
    }
});