import './bootstrap';
$(document).ready(function() {
    $('form').on('submit', function(e) {
        e.preventDefault(); // Menghentikan form dari submit biasa

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function(data) {
                if (data.success) {
                    $('#popupMessage').text(data.message); // Mengisi pesan di pop-up
                    $('#overlay').show(); // Menampilkan overlay
                    $('#loginPopup').show(); // Menampilkan pop-up

                    // Menangani redirect setelah pop-up ditutup
                    window.closePopup = function() {
                        $('#loginPopup').hide();
                        $('#overlay').hide();
                        window.location.href = data.redirect; // Redirect ke dashboard
                    };
                }
            },
            error: function(data) {
                var errors = data.responseJSON.errors;
                for (var error in errors) {
                    alert(errors[error][0]); // Menampilkan error
                }
            }
        });
    });
});
