<html>

<head>
  <title>Registration page</title>

  <script src="./include/jquery.min.js"></script>
  <script src="./include/bootstrap.min.js"></script>
  <script src="./include/croppie.js"></script>
  <link rel="stylesheet" href="./include/bootstrap.min.css" />
  <link rel="stylesheet" href="./include/croppie.css" />
  <link rel="stylesheet" href="./include/style.css">

</head>

<body>
  <div class="main_container"><br><br>
    <h1 class=" text-center"> Registration</h1>
    <div class="col-lg-8 m-auto d-block"></div>
    <form action="./back_end/data.php" method="POST" enctype="multipart/form-data">
    <!--  path -->
      <div class="container my-5" style="border:1px solid ; padding:20px;">
        <div class="form-group ">
          <label>First-Name </label>
          <input type="text" name="first_name" class="form-control" id="fname">
        </div>
        <div class="form-group ">
          <label>LastName </label>
          <input type="text" name="Last_name" class="form-control" id="lname">
        </div>
        <div class="form-group ">
          <label>Date Of Birth</label>
          <input type="date" id="dob" name="DOB" placeholder="Date Of Birth" min="1990-01-01" max="2025-01-01">

        </div>
        <div class="form-group ">
          <label>Gender : </label> <br>
          <input type="radio" name="Gender" value="Male" id="gender"> Male
          <input type="radio" name="Gender" value="Female" id="gender"> Female

        </div>

        <div class="form-group">

          <label> Education:</label>
          <div class="education" id="education">
            <label> University :</label>

            <select class="form-group" id="University" name="University[]"></select>
            <select class="form-group" name="joining_date" id='date'></select>

            <button class="add_education_button">+</button>

          </div>
        </div>
        <div class="form-group ">
          <label> Experience :</label>
          <div class="input_experience">
            <div id="company">
              <input type="text" name="company[]" placeholder="Company name" id="company">
              <input type="month" id="bdaymonth" name="Start[]" placeholder="Start Month"> To
              <input type="month" id="bdaymonth" name="end[]" placeholder="End Month">
              <button class="add_experience_button">+</button>
            </div>
          </div>
        </div>
        <div class="container">

          <div class="panel panel-default">
            <div>Select Image</div>
            <br>
            <input type="file" name="upload_image" id="upload_image" accept="image/*" />
            <input type="hidden" id="image_name" name="image_name"/>
          </div>
        </div>
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Save</button>
      </div>
      </form>


 <div id="uploadimageModal" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload & Crop Image</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8 text-center">
            <div id="image_demo" style="width:150px; margin-top:10px"></div>
          </div>
          <div class="col-md-4" style="padding-top:150px;">
           
            <button class="btn btn-success crop_image">Upload</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>
<script src="./include/custom.js"></script>
<script>
  
</script>

</body>

</html>