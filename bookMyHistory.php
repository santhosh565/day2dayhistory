<?php require_once "eventMangement.php";
  $events = new event_management();
 require_once "user_defined.php"; 
$cmain = new user_defined();
$page="bookMyHistory";
// If form is submitted 
if(isset($_REQUEST['userName']) || isset($_REQUEST['user_Email']))
{ 
    // Get the submitted form data 

      $userName =$_REQUEST['userName']; 
      $user_Email =$_REQUEST['user_Email']; 
      $usernickName =$_REQUEST['usernickName']; 
      $datepicker =$_REQUEST['datepicker']; 
      $userMsg =$_REQUEST['userMsg']; 
      $userUpload =$_FILES['userUpload']['name']; 

      if(isset($_FILES['userUpload']['name']))
        {
           /* Getting file name */
           $filename = $_FILES['userUpload']['name'];
           $dyn = date("YmdHis");
           /* Location */
           $location = "image/profile/" .$dyn.$filename;
           $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
           $imageFileType = strtolower($imageFileType);

           /* Valid extensions */
           $valid_extensions = array("jpg","jpeg","png");

           $img_path = 0;
           /* Check file extension */
           if(in_array(strtolower($imageFileType), $valid_extensions)) {
              /* Upload file */
               
              if(move_uploaded_file($_FILES['userUpload']['tmp_name'],$location)){
                 $img_path = $location;
              }
           }
        }
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) 
        {
            $ip_addr = $_SERVER['HTTP_CLIENT_IP'];
        } 
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip_addr = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } 
        else 
        {
            $ip_addr = $_SERVER['REMOTE_ADDR'];
        }

        date_default_timezone_set('America/New_York');
        $timestamp = date("Y-m-d H:i:s");

        $qry_exe= $cmain->insert("INSERT INTO hy_book_history( `name`, `nick_name`, `dob`, `email`,`interesting_fact`, `img_path`, `reg_date`, `reg_ip` ) VALUES('$userName','$usernickName','$datepicker','$user_Email','$userMsg','$userUpload','$timestamp','$ip_addr')");

        if($qry_exe) {
            echo "Registered Successfully";          
        }
        else {
                
                echo "Already Registered";
        }

    exit;
}

 include 'header.php';
 
 ?>
<link rel='stylesheet' id='contact-form-7-css' href='css/bootstrap.min.css' media='all' />
 
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css">

 <style type="text/css">
   .hm-gradient{background-image:linear-gradient(to top,#f3e7e9 0,#e3eeff 99%,#e3eeff 100%)}.darken-grey-text{color:#2e2e2e}.danger-text{color:#ff3547}.default-text{color:#2bbbad}.info-text{color:#33b5e5}.form-white .form-control,.form-white .md-form label{color:#fff}.form-white input[type=password]:focus:not([readonly]),.form-white input[type=text]:focus:not([readonly]){border-bottom:1px solid #fff;-webkit-box-shadow:0 1px 0 0#fff;box-shadow:0 1px 0 0#fff}.form-white input[type=password]:focus:not([readonly])+label,.form-white input[type=text]:focus:not([readonly])+label,.form-white textarea.md-textarea:focus:not([readonly])+label{color:#fff}.form-white input[type=password],.form-white input[type=text]{border-bottom:1px solid #fff}.form-white .form-control:focus{color:#fff}.form-white textarea.md-textarea:focus:not([readonly]){border-bottom:1px solid #fff;box-shadow:0 1px 0 0#fff;color:#fff}.form-white textarea.md-textarea{border-bottom:1px solid #fff;color:#fff}.ripe-malinka-gradient{background-image:linear-gradient(120deg,#f093fb 0,#f5576c 100%)}.near-moon-gradient{background-image:linear-gradient(to bottom,#5ee7df 0,#b490ca 100%)}.md-form .prefix~input,.md-form .prefix~textarea{width:80%!important}input#form322{outline:0;border:0}label{display:none}
   .md-form .prefix {
    -webkit-transition: color .2s;
    transition: color .2s;
    position: absolute;
    width: 3rem;
    font-size: 2rem;
}
 </style>
    <div class="container">
        <div class="row">
           <div class="col-md-6 " style=" margin: 0 auto;">
                    <div class="card bg-warning form-white" style=" background-color: #2c2b34!important;  margin-top:30px;">
                        <div class="card-body">
                            <!-- Form contact -->
                   
                            <form  action="#" id="addUser_form" enctype="multipart/form-data" onsubmit="return false">

                                <h2 class="text-center py-4 font-bold font-up white-text">BOOK MY HISTORY</h2>
                                <p class="text-center white-text" style="margin:10px 0 50px; ">Help us to celebrate you.And get ready for the Surprise</p>
                                 <div class="text-center white-text" id="useName_error"></div>
                                <div class="md-form">
                                    <i class="fa fa-user prefix white-text"></i>
                                    <input type="text" name="userName" id="userName" class="form-control" placeholder="Your name">
                                    <label for="userName">Your name</label>
                                   
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-user-circle prefix white-text"></i>
                                    <input type="text" name="usernickName" id="usernickName" class="form-control" placeholder="Your Nick Name">
                                    <label for="usernickName">Nick Name</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix white-text"></i>
                                    <input type="text" name="user_Email" id="user_Email" class="form-control" placeholder="Your Email">
                                    <label for="user_Email">Your email</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-calendar prefix white-text"></i>

                                    <input type="text" name="datepickers" id="datepickers" class="form-control" placeholder="Date of birth" >
                                    <label for="datepickers">Date of Birth</label>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-pencil prefix white-text"></i>
                                    <textarea type="text" name="userMsg" id="userMsg" class="md-textarea" style="height: 100px" placeholder="Your message"></textarea>
                                    <label for="userMsg">Your message</label>
                                    <span id="useText_error"><span>
                                </div>

                                 <div class="md-form">
                                     <i class="fa fa-upload prefix white-text"></i>

                                    <input type="file"  class="form-control" name="userUpload" id="userUpload" >
                                    
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-warning btn-lg" style="width: 50%;" id="userSubmit" >Submit</button>
                                </div>
                            </form>
                            <div id="response" style="color: #fff; text-align: center; margin-top: 20px;" ></div>
                            <!-- Form contact -->
                        </div>
                    </div>
                </div>
        </div>
    </div>

<script type="text/javascript">
    
     $( document ).ready(function() {
        // e.preventDefault();
      

        $('#userSubmit').click(function(e){
               e.preventDefault();
        var userName = document.getElementById("userName").value;
        var usernickName = document.getElementById("usernickName").value;
        var user_Email = document.getElementById("user_Email").value;
        var datepicker = document.getElementById("datepickers").value;
        var userMsg = document.getElementById("userMsg").value;

       var formdata = new FormData($("#bulkAttributeForm").get(0));
        // validation 
        $('#userName').css("border-bottom", "1px solid #fff");
        $('#usernickName').css("border-bottom", "1px solid #fff");
        $('#user_Email').css("border-bottom", "1px solid #fff");
        $('#userMsg').css("border-bottom", "1px solid #fff");

         $('#useName_error').text("");
        if (userName==null || userName==""){  
              $('#userName').css("border-bottom", "1px solid red");
          return false;  
        }
        else if( userName.length<1 ){
             $('#userName').css("border-bottom", "1px solid red");
              $('#useName_error').text("test");
            return false;

        }
        else if(usernickName==null || usernickName==""){  
              $('#usernickName').css("border-bottom", "1px solid red");
             
          return false;  
        }
        
        else if(user_Email==null || user_Email==""){  
              $('#user_Email').css("border-bottom", "1px solid red");
          return false;  
        }
         else if(userMsg==null || userMsg==""){  
              $('#userMsg').css("border-bottom", "1px solid red");
          return false;  
        }
        
         else if( userMsg.length<2 ){
             $('#userMsg').css("border-bottom", "1px solid red");
              $('#useName_error').text("test");
            return false;

        }
      
         var form_data = new FormData(document.getElementById("addUser_form"));
         //var formdata = new FormData($("#fupForm").get(0));

            $.ajax({
                url:'bookMyHistory.php',
                type:'POST',
                data: form_data,
                contentType: false,       
                cache: false,             
                processData:false, 
                success: function(data) {
                     $("#response").html(data);
                    setTimeout(function() {
                         $("#response").hide('slow');
                    }, 3000);

                    document.getElementById("addUser_form").reset();
                     $('#datepickers').datepicker();
                   // $("#addUser_form")[0].reset();
                }
            });

        });
        
       $('#datepickers').datepicker();
       });


</script> 
<?php include 'footer.php';?>    