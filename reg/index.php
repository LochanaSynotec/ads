<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>



    <div class="container mt-3">
        <h2>Ad post</h2>
        <form action="save.php" method="post">
            <div class="row">
                <div class="col-sm-6 p-3">

                    <div class="mb-3 mt-3">
                        <label for="email">Title:</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Your Name:</label>
                        <input type="text" class="form-control"  name="name">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Gender:</label>
                        <select class="form-control" name="gender">
                            <option>Female</option>
                            <option>Male</option>
                        </select>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Description:</label>
                        <textarea name="" class="form-control"  cols="30" rows="5" name="des"></textarea>
                    </div>
                </div>

                <div class="col-sm-6 p-3">

                    <div class="mb-3 mt-3">
                        <label for="email">Address:</label>
                        <input type="email" class="form-control" name="address">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Tel No:</label>
                        <input type="email" class="form-control" name="tel1">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="email">Tag (Key is searching )*:</label>
                        <textarea name="" class="form-control"  cols="30" rows="5" name="tag"></textarea>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>