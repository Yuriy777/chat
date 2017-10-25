<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="js.js"></script>
</head>

<body>
    <div class="container">
        <form class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Name">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Message"></textarea>
            </div>
            <button type="submit"  class="btn btn-default" id="submit">Submit</button>
        </form>

        <div id="result">

        </div>
    </div>
</body>
</html>