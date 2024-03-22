<!DOCTYPE html>
<html>

<head>
    <title>Word to PDF Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Word to PDF Laravel</h2>
            </div>
            <div class="panel-body">
                <form action="{{ route('word.to.pdf.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <strong class="form-label" for="inputFile">Upload Word File:</strong>
                        <input type="file" name="file" id="inputFile">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Convert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>