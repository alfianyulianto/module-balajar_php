</body>

<!-- JQuery -->
<script src="<?= BASE_URL; ?>/js/jquery-3.6.0.min.js"></script>

<!-- JS Bootstrap -->
<script src='<?= BASE_URL; ?>/js/bootstrap.bundle.js'></script>

<!-- sweet alert -->
<script src='<?= BASE_URL; ?>/js/sweetalert2.min.js'></script>

<!-- myJs -->
<script src='<?= BASE_URL; ?>/js/script.js'></script>

<script>
    $(function() {
        $(".hapus").on("click", function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You want to delete record",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Your work has been saved',
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        if (result.isDismissed) {
                            window.location = $(this).attr("href");
                        }
                    })
                }
            });
        });
    });
</script>


</html>