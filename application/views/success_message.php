<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php if ($this->session->flashdata('success')) : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "<?php echo $this->session->flashdata('success'); ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "<?php echo $this->session->flashdata('error'); ?>",
                confirmButtonText: 'OK'
            });
        </script>
    <?php endif; ?>

</body>

</html>