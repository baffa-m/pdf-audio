<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">

    <title>Speech synthesiser</title>

    <link rel="stylesheet" href="style.css">
    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>

  <body>
    <h1>Design and Implementation of Text to Speech/Audio System </h1>

    <p>Enter some text in the input below and press ENTER to hear it. change voices using the dropdown menu.</p>
    
    <form>
    <input type="text" class="txt" value="">
    <div>
      <label for="rate">Rate</label><input type="range" min="0.5" max="2" value="1" step="0.1" id="rate">
      <div class="rate-value">1</div>
      <div class="clearfix"></div>
    </div>
    <div>
      <label for="pitch">Pitch</label><input type="range" min="0" max="2" value="1" step="0.1" id="pitch">
      <div class="pitch-value">1</div>
      <div class="clearfix"></div>
    </div>
    <select>

    </select>
    </form>

    <script src="script.js"></script>
  </body>
</html>