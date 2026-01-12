<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
// Toastr Configuration
toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

// Check for URL parameters and display Toastr messages
$(document).ready(function() {
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.has('success')) {
        toastr.success(urlParams.get('success'));
    }

    if (urlParams.has('error')) {
        toastr.error(urlParams.get('error'));
    }

    if (urlParams.has('warning')) {
        toastr.warning(urlParams.get('warning'));
    }

    // Clean URL after showing message (optional, but cleaner)
    if (urlParams.has('success') || urlParams.has('error') || urlParams.has('warning')) {
        const newUrl = window.location.pathname;
        window.history.replaceState({}, document.title, newUrl);
    }
});
</script>