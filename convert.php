<?php
include 'conn.php';

if (isset($_POST['convert'])){
    
    

    $namephoto = $_FILES["img"]["name"];
  $size      = $_FILES["img"]["size"];
  $tmp_location_photo = $_FILES["img"]["tmp_name"];
  $typephoto = $_FILES["img"]["type"];

  $target_dir = "pdf/";

  $target_file = $target_dir .rand(). basename($namephoto);

    
$sql = "UPDATE pdf_tbl SET 
    file = '{$target_file}'
      
      WHERE id= 1 ";
    






       
$finish = mysqli_query($conn,$sql);
if ($finish){
  move_uploaded_file($tmp_location_photo, $target_file);
  
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Operation Successful');
    window.location.href='';
    </script>");

    }else{
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Operation Error');
    window.location.href='';
    </script>");                   

       

// //             $finish = mysqli_query($conn,$sql);
// // if ($finish){
               

               
//         echo ("swal('Good job!', 'You clicked the button!', 'success'");

//     }else{
//         echo ("<script LANGUAGE='JavaScript'>
//     window.alert('Settings Error');
//     window.location.href='index.html';
//     </script>");

// }

//         }


}}

include('class.pdf2text.php');

$sql = "SELECT* FROM pdf_tbl order by max(id)";
                    $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                
                                while($row = $result->fetch_assoc()) {
                                    $doc= $row['file'];
                                    
$a = new PDF2Text();
$a->setFilename($doc); 
$a->decodePDF();

 

}}

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title>Speech synthesiser</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <style>
      /* Center the content vertically and horizontally using Flexbox */
      body {
        margin: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #f5f5f5;
        font-family: Arial, sans-serif;
      }

      .container {
        background-color: rgba(227, 225, 225, 0.2);
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        text-align: center;
        width: 100%;
        max-width: 700px; 
      }

      .button-group {
        display: flex;
        justify-content: center;
        gap: 20px; /* Spacing between buttons */
      }

      h1 {
        margin-bottom: 20px;
        font-size: 24px;
      }

      form {
        width: 100%;
        margin: 0;
      }

      input[type="file"],
      select,
      input[type="range"] {
        width: 100%;
        margin-bottom: 15px;
      }

      .form-control {
        margin-bottom: 15px;
        border-radius: 5px;
      }

      label {
        margin-top: 15px;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <h1>PDF TO AUDIO SYSTEM</h1>
      <p>CLICK ENTER TO READ PDF.</p>

      <form>
        <textarea rows="8" cols="16" class="txt form-control" ><?php echo $a->output(); ?></textarea><br>

        <div class="button-group">
          <button class="btn btn-primary" type="submit" id="readBtn" style="margin-right: 120px;">READ OUT DOCUMENT</button>
          <button class="btn btn-primary" type="button" id="pauseBtn" onclick="if (window.speechSynthesis.speaking && !window.speechSynthesis.paused) { window.speechSynthesis.pause(); }">
            PAUSE
          </button>
          <button class="btn btn-primary" type="button" id="resumeBtn" onclick="if (window.speechSynthesis.paused) { window.speechSynthesis.resume(); }">
            RESUME
          </button>
          <button class="btn btn-primary" type="button" id="stopBtn" onclick="if (window.speechSynthesis.speaking) { window.speechSynthesis.cancel(); }">
            STOP
          </button>
        </div>

        <div>
          <label for="rate">Rate</label>
          <input class="form-control" type="range" min="0.5" max="2" value="1" step="0.1" id="rate" oninput="document.querySelector('.rate-value').textContent = this.value; if (window.speechSynthesis.speaking && !window.speechSynthesis.paused) { window.speechSynthesis.cancel(); speak(document.querySelector('.txt').value); }">
          <div class="rate-value">1</div>
          <div class="clearfix"></div>
        </div>

        <div>
          <label for="pitch">Pitch</label>
          <input class="form-control" type="range" min="0" max="2" value="1" step="0.1" id="pitch" oninput="document.querySelector('.pitch-value').textContent = this.value; if (window.speechSynthesis.speaking && !window.speechSynthesis.paused) { window.speechSynthesis.cancel(); speak(document.querySelector('.txt').value); }">
          <div class="pitch-value">1</div>
          <div class="clearfix"></div>
        </div>

        <select class="form-control" onchange="if (window.speechSynthesis.speaking && !window.speechSynthesis.paused) { window.speechSynthesis.cancel(); speak(document.querySelector('.txt').value); }">
        </select>
      </form>
    </div>

    <script src="script.js"></script>
  </body>
</html>


