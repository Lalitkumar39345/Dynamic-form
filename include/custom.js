// validation part

$(document).ready(function () {
  $("#submit").click(function () {
    $(".error").hide();
    var hasError = false;

    // name validation


    // var nameVal = $("#fname").val();
    // if (nameVal == '') {
    //     $("#fname").after('<span class ="error" style=" color : red;"> **Please Enter First Name.</span>');
    //     hasError = true;
    // }
    // if (hasError == true) {
    //     return false;
    // }

    // var lnameVal = $("#lname").val();
    // if (lnameVal == '') {
    //     $("#lname").after('<span class ="error" style=" color : red;"> **Please enter Last Name.</span>');
    //     hasError = true;
    // }
    // if (hasError == true) {
    //     return false;
    // }


    //  university validation 


    // var Universityval = $("#University").val();
    // if (Universityval == "Please select University") {
    //     $("#University").after('<span class = "error" style="color : red;">**Please select University.</span>');
    //     hasError = true;
    // }
    // if (hasError == true) {
    //     return false;
    // }

    // var dateval = $("#date").val();
    // if (dateval == "2022") {
    //     $("#date").after('<span class = "error" style="color : red;">**Please select Year.</span>');
    //     hasError = true;
    // }
    // if (hasError == true) {
    //     return false;
    // }
  });
});

//  start education fields

//  dropdown


var University = ['Please select University', 'Indian Institute of Science (IISc), Bangalore', 'Jawaharlal Nehru University (JNU), New Delhi', 'Jamia Milia Islamia', 'Jadavpur University, Kolkata', 'Amrita Vishwa Vidyapeetham, Coimbatore', 'Banaras Hindu University (BHU), Varanasi', 'University of Hyderabad (UoH), Hyderabad'];
var option = "";
for (var i = 0; i < University.length; i++) {
  option += '<option id = "' + University[i] + '">' + University[i] + "</option>"
}
document.getElementById('University').innerHTML = option;


// end


var dateDropdown = document.getElementById('date');
var currentYear = new Date().getFullYear();
var earliestYear = 1990;
var DateDropDown = "";
while (currentYear >= earliestYear) {
  var dateOption = document.createElement('option');
  dateOption.text = currentYear;
  dateOption.value = currentYear;
  DateDropDown += '<option value = "' + currentYear + '">' + currentYear + "</option>"
  dateDropdown.add(dateOption);
  currentYear -= 1;
}

$(document).ready(function () {
  var max = 5;
  var wrapper = $(".education");
  var add_education_button = $(".add_education_button");
  var a = 1;
  $(add_education_button).click(function (e) {
    e.preventDefault();
    if (a < max) {
      $(wrapper).append(`<div><select class="form-group" name="University[]" id="University">${option}</select><select class="form-group"  name = "joining_date[] "id="date">${DateDropDown}</select><a href="#" class="remove_education"> &nbsp X</a></div>`);
      a++;
    }
  });
  $(wrapper).on("click", ".remove_education", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    a--;
  })
});

//  start education fields


//  start add  experience


$(document).ready(function () {
  var fields = 5;
  var wrapper = $(".input_experience");
  var add_button = $(".add_experience_button");
  var x = 1;
  $(add_button).click(function (e) {
    e.preventDefault();
    if (x < fields) {
      $(wrapper).append('<div> <input type="text" name="company[]" placeholder=" company name"><input type="month" name="Start[]" /> To <input type="month"  name="end[]" /> <a href="#" class="remove_field"> &nbsp X</a></div>');
      x++;
    }
  });
  $(wrapper).on("click", ".remove_field", function (e) {
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })
});


// end  experience


//  image upload part


$(document).ready(function () {

  $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width: 200,
      height: 200,
      // type: 'square' //circle
      type: 'circle' //circle 
    },
    boundary: {
      width: 300,
      height: 300
    }
  });

  $('#upload_image').on('change', function () {
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function () {
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function (e) {
    e.preventDefault();
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    })
      .then(function (response) {
        $.ajax({
          url: "upload.php",
          type: "POST",
          data: {
            "image": response
          },
          success: function (data) {
            $('#uploadimageModal').modal('hide');
           
             document.getElementById("image_name").setAttribute("value",data)
             alert("uploaded");
          }
        });
      })
  });

});