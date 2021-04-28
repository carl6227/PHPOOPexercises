<?php
//number1
class dateClass
{
    public $date1;
    public $date2;

}
$myDate = new dateClass();
if (isset($_POST['submit'])) {
    $myDate->date1 = $_POST['first'];
    $myDate->date2 = $_POST['second'];

    $answer = strtotime($myDate->date1) - strtotime($myDate->date2);//store the diffrence between dates
    $years = $years = floor($answer / (365 * 60 * 60 * 24));// then calculate the years and store it on a variable as well as the months
    $months = floor(($answer - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));//and days.
    $days = floor(($answer - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

}


//number2

class selectClass{
    public $optionsArray=[];
   

    function addOption($inputedOption){//defining a function that will push a value to an array "optionArray"
      array_push($this->optionsArray,$inputedOption);
    }

}
$addOption=new selectClass();
if (isset($_POST['add'])){
$addOption->addOption('option1');// adding option 1 in the select tag
$addOption->addOption('option2'); // adding option 2 in the select tag
$addOption->addOption($_POST['inputOption']);//adding the value of the input value to the select tag
}




//number3
if(isset($_POST['emailSub'])){
class emailCheck{
    public $email;
    public $result;
    
    function validateEmail($email){//defining a function 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $this->result= " Email address in Valid!";
          } else {
            $this->result="Email address is Not Valid!";
          }
    }

}
$newEmail=new emailCheck();
$newEmail->validateEmail($_POST['email']);
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<div class="container">
     <div class="col-sm-4 border border-primary mt-5">
            <form  method="post">
                <div class="form-group mt-5">
                        <input type="text" class="form-control"  name="first"aria-describedby="emailHelp" placeholder="Enter first Date">
                </div>
                <div class="form-group">
                        <input type="text" class="form-control"  name="second"aria-describedby="emailHelp" placeholder="Enter second Date">
                </div>
                <div class="form-group">
                        <input type="text" class="form-control" n aria-describedby="emailHelp"value="<?php echo $years . " years, " . $months . " months, " . $days . " days"; ?>" placeholder="Answer">
                </div>
                <div class="form-group">
                        <input type="submit" class="btn btn-primary"name="submit" value="Subtract Date">
                </div>
            </form>
    </div>

    <div class="col-sm-4 mt-5 border  border-success" >
        <form action="index.php" method="post">
            <div class="form-group">
                            <input type="text" class="form-control mt-5" name="inputOption" aria-describedby="emailHelp" placeholder="Enter options">
                    </div>
                    <select class="custom-select mb-5" id="inputGroupSelect01">
                       <?php 
                       foreach($addOption->optionsArray as $option){
                           echo "<option>$option</option>";
                       }
                       ?>
                    </select>
                    <div class="form-group">
                            <input type="submit" class="btn btn-success"name="add" value="Add">
                    </div>
        </form>
       
    </div>
    <div class="col-sm-4 border border-warning mt-5 mb-5">
        <form  method="post">
            <div class="form-group">
               <input type="text" class="form-control mt-5 " name="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
               <input type="text" class="form-control mt-5 " value="<?php echo $newEmail->result;?>" aria-describedby="emailHelp" placeholder="Valid or Not?">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning text-light"name="emailSub" value="Validate Email">
            </div>
        </form>
       
    </div>

</div>
</body>
</html>
