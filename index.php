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
        <input type="file" id="pdfInput" class="txt form-control" name="img" required="">
        <span class="text-danger" id="fileError"></span>
        <input type="submit" id="submitButton" name="convert" value="Convert to Audio" class="form-control btn btn-success">
      </form>
    </div>

    <script src="jquery-3.7.1.min.js"></script>
    <script>
      $(document).ready(function() {
        
        // Validate PDF file input in real-time
        $('#pdfInput').on('change', function() {
          var file = this.files[0];
          var fileType = file.type;
          var fileSize = file.size;

          // Reset error message
          $('#fileError').text('');

          // Check if the file is a PDF
          if (fileType !== 'application/pdf') {
            $('#fileError').text('Please upload a valid PDF file.');
            this.value = ''; // Clear the input
          }
          

          // Set file size limit (e.g., 5MB)
          var maxSize = 5 * 1024 * 1024; // 5MB in bytes
          if (fileSize > maxSize) {
            $('#fileError').text('File size should not exceed 5MB.');
            this.value = ''; // Clear the input
          }
        });

        // Final validation before form submission
        $('#pdfForm').on('submit', function(e) {
          var file = $('#pdfInput')[0].files[0];
          if (!file) {
            e.preventDefault();
            $('#fileError').text('Please upload a PDF file.');
          }
        });
      });
    </script>

    <script src="script.js"></script>
  </body>
</html>
