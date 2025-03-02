<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

    <title>Form Keren</title>
</head>
<body>
<!-- Inline CSS based on choices in "Settings" tab -->
<style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

<!-- HTML Form (wrapped in a .bootstrap-iso div) -->
<div class="bootstrap-iso">
 <div class="container-fluid ">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12 mx-auto">
    <form action="output.php" method="post">
     <div class="form-group">
      <label class="control-label requiredField" for="name">
       Name
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="name" name="name" placeholder="raffa" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label requiredField" for="email">
       Email
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="email" name="email" placeholder="rafa@gmail.com" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="subject">
       Subject
      </label>
      <input class="form-control" id="subject" name="subject" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="message">
       Message
      </label>
      <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>

</body>
</html>