<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <!-- Navbar content -->
        </nav>

        <!-- Modal -->
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
            <!-- Modal content -->
        </div>

        <table class="table table-success table-striped-columns mt-10">
            <!-- Table content -->
        </table>

        <div class="modal fade" id="edit-modal" data-bs-keyboard="false" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('usercreate') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="edit-name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="edit-name">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDf" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $(document).on('click', '.edit', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "/user/" + id + "/edit",
                    success: function(res) {
                        console.log(res);
                        $('#edit-modal').modal('show');
                        $('#edit-name').val(res.name);
                        $('#phone').val(res.phone);
                        $('#address').val(res.address);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>