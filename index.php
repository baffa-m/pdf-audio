<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title>Speech Synthesiser</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <style>
      /* Flexbox to center content horizontally and vertically */
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5; /* Optional: a light background color */
      }

      .container {
        text-align: center;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: rgba(227, 225, 225, 0.2);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 700px; /* Control max width of the container */
        margin: auto; /* Ensure it's centered horizontally */
      }


      h1 {
        margin-bottom: 20px;
        font-size: 24px;
      }

      form {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
      }

      .form-control {
        margin-bottom: 15px;
        border-radius: 10px;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1>PDF TO AUDIO SYSTEM</h1>

      <p>UPLOAD YOUR PDF DOCUMENT TO READ OUT</p>

      <form action="convert.php" method="post" enctype="multipart/form-data">
        <input type="file" class="txt form-control" name="img" required="">
        <input type="submit" name="convert" value="Convert to Audio" class="form-control btn btn-success">
      </form>
    </div>

    <script src="script.js"></script>
  </body>
</html>
