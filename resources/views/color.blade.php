<html>

<head>

  <title>Laravel Bootstrap Colorpicker Example</title>

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.min.js"></script>  

</head>

<body>

<div class="container">

    <h1>Laravel Bootstrap Colorpicker Example</h1>

    <div id="cp2" class="input-group colorpicker colorpicker-component"> 

      <input type="text" value="#00AABB" class="form-control" /> 

      <span class="input-group-addon"><i></i></span> 

    </div>

</div>

<script type="text/javascript">

  $('.colorpicker').colorpicker();

</script>

</body>

</html>