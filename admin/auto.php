
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>autocomplete</title>
    <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#no_identitas").autocomplete({
                source: "source.php"
            });
        });
    </script>
</head>

<body>
    <div class="container">

        <h4>Cara Membuat Autocomplete dengan PHP dan MySql</h4>

        <form action="hasil.php" method="post">
            <div class="form-group">
                <label for="nama">No Identitas:</label>
                <input type="text" id="no_identitas" name="no_identitas" value="" class="form-control" required />
            </div>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
</body>

</html>