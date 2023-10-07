<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>sell fertilizer</title>
</head>
<body>
    <header>
    <nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <a href="index.html"><span class="navbar-brand mb-0 h1 text-white">AMS</span></a>
  </div>
</nav>
    </header>
    <section id="sellCrops">
        <h3 class="text-center mt-4 md-4">SELL FERTILIZER</h3>
        <div class="container-fluid" style="width: 80%;">
            <form>
                <div class="form-group">
                       <label for="fertilizerName">Fertilizer Name</label>
                       <input type="text" class="form-control" id="fertilizerName" name="fertilizerName">
                </div>
                <div class="form-group">
                    <label for="fertilizerPrice">Fertilizer Price</label>
                    <input type="number" class="form-control" id="fertilizerPrice" name="fertilizerPrice" aria-describedby="fertilizer">
                <small id="fertilizer" class="form-text text-muted">Price is per KG</small>
                </div>
                <div class="form-group">
    <label for="fertilizerDescription">Fertilizer Description</label>
    <textarea class="form-control" id="fertilizerDescription" rows="3"></textarea>
  </div>
                <div class="form-group">
                    <label for="fertilizerImage">Fertilizer Image</label>
                    <input type="file" accept="image/jpg,image/jpeg" class="form-control" id="fertilizerImage" name="machineImage">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>