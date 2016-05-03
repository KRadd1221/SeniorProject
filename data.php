<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
    <link href="extra.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>

    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>


    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {

            var table = $('#example').DataTable({
                "fnDrawCallback": function() {
                    $('#example tr').click(function() {
                        var tr = $(this).closest('tr');
                        var row = table.row(tr);
                        var redirection = row.data()[0];
                        var redirection1 = row.data()[1];

                        document.location.href = "?LastName=" + redirection + "&" + "FirstName=" + redirection1;
                    });

                    $('#example tr').hover(function() {
                        $(this).css('cursor', 'pointer');
                    }, function() {
                        $(this).css('cursor', 'auto');
                    });
                },
                "select": true,
                "aProcessing": true,
                "aServerSide": true,
                "ajax": "process.php",

                "order": [
                    [1, 'asc']
                ],


            });



            // Add event listener for opening and closing details



        });
    </script>


</head>

<body class="dt-example">
    <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>

                <th>Last Name</th>
                <th>First Name</th>


            </tr>
    </table>



    </thead>
    </table>
   
   <div class=row>
   <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT Comments FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['Comments']; ?>
       <h2>Student: <?php echo "$firstname $lastname"; ?></h2>
       
        <div>

            <div ID="comment" class="panel panel-default">
                <div class="panel-heading">Comments</div>
                <div class="panel-body">
                    <form name='formcomment' method='post' action="">
                        <?php include "_global.php"; $newGrade=$_POST[ 'newGradecomment']; $sql=( "UPDATE majorCourses SET Comments= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT Comments FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['Comments'];  ?>
                        <input type="text" id="commentGrade" placeholder="Edit Comments" value="<?php echo "$grade";?>" name="newGradecomment" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitcomment" id="submitcomment" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitcomment'])) { include "_global.php"; $newGrade=$_POST[ 'newGradecomment']; $sql=( "UPDATE majorCourses SET Comments= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT Comments FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['Comments']; } ?>
                        <h3><?php echo "Comments: $grade"; ?></h3>


                </div>
                
            </div>
        </div>
    </div>
     
    <!-- CS1 -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS210_CompSci_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS210_CompSci_I']; ?>
    
    <div class="row">
         <h3>Grades</h3>
        <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
            <div ID="cs1">
                <div class="panel-heading">CS-I (4)</div>
                <div class="panel-body">
                    <form name='form' method='post' action="">
                        <input type="text" id="cs1Grade" placeholder="Edit Grade" name="newGrade" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submit" id="submit" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submit'])) 
                        { include "_global.php"; 
                        $newGrade= $_POST[ 'newGrade']; 
                        $sql=( "UPDATE majorCourses SET CPS210_CompSci_I= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); 
                        $result=$conn->query($sql); 
                        $sql="SELECT CPS210_CompSci_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; 
                        $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); 
                        $grade=$row['CPS210_CompSci_I']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>

                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("cs1").className = "panel Panel-success";

        }
        else {
            document.getElementById("cs1").className = "panel Panel-danger";
        }
    </script>
    <!-- CS2 -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS310_CompSci_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS310_CompSci_II']; ?>

    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
            <div ID="cs2">
                <div class="panel-heading">CS-II (4)</div>
                <div class="panel-body">
                    <form name='formCS2' method='post' action="">
                        <input type="text" id="cs2Grade" placeholder="Edit Grade" name="newGradeCS2" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitCS2" id="submitCS2" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitCS2'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeCS2']; $sql=( "UPDATE majorCourses SET CPS310_CompSci_II= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS310_CompSci_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS310_CompSci_II']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("cs2").className = "panel Panel-success";

        }
        else {
            document.getElementById("cs2").className = "panel Panel-danger";
        }
    </script>
    <!-- ASSEMBLY -->
    <h3>Knowledge ~ Must Take All</h3>
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS330_AssemblyArch FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS330_AssemblyArch']; ?>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div ID="assembly">
                <div class="panel-heading">Assembly & Architecture (4)</div>
                <div class="panel-body">
                    <form name='formAssembly' method='post' action="">
                        <input type="text" id="assemblyGrade" placeholder="Edit Grade" name="newGradeAssembly" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitAssembly" id="submitAssembly" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitAssembly'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeAssembly']; $sql=( "UPDATE majorCourses SET CPS330_AssemblyArch= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS330_AssemblyArch FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS330_AssemblyArch']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
        <script type="text/javascript" language="javascript" class="init">
            var grade = "<?php echo $grade?>";
            if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
                document.getElementById("assembly").className = "panel Panel-success";

            }
            else {
                document.getElementById("assembly").className = "panel Panel-danger";
            }
        </script>
        <!-- CS-3 -->

        <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS315_CompSci_III FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS315_CompSci_III']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="CS3">
                <div class="panel-heading">CS-III (4)</div>
                <div class="panel-body">
                    <form name='formCS3' method='post' action="">
                        <input type="text" id="CS3Grade" placeholder="Edit Grade" name="newGradeCS3" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitCS3" id="submitCS3" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitCS3'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeCS3']; $sql=( "UPDATE majorCourses SET CPS315_CompSci_III= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS315_CompSci_III FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS315_CompSci_III']; } ?>
                    <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
     
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("CS3").className = "panel Panel-success";

        }
        else {
            document.getElementById("CS3").className = "panel Panel-danger";
        }
    </script>
    <!-- OOP -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS352_OOP FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS352_OOP']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="OOP">
                <div class="panel-heading">Object Oriented Prog. (3)</div>
                <div class="panel-body">
                    <form name='formOOP' method='post' action="">
                        <input type="text" id="OOPGrade" placeholder="Edit Grade" name="newGradeOOP" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitOOP" id="submitOOP" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitOOP'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeOOP']; $sql=( "UPDATE majorCourses SET CPS352_OOP= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS352_OOP FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS352_OOP']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
        
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("OOP").className = "panel Panel-success";

        }
        else {
            document.getElementById("OOP").className = "panel Panel-danger";
        }
    </script>
    <!-- DM -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT MAT320_DiscreteMath FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['MAT320_DiscreteMath']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="DM">
                <div class="panel-heading">Discrete Math for CS (3)</div>
                <div class="panel-body">
                    <form name='formDM' method='post' action="">
                        <input type="text" id="DMGrade" placeholder="Edit Grade" name="newGradeDM" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitDM" id="submitDM" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitDM'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeDM']; $sql=( "UPDATE majorCourses SET MAT320_DiscreteMath= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT MAT320_DiscreteMath FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['MAT320_DiscreteMath']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("DM").className = "panel Panel-success";

        }
        else {
            document.getElementById("DM").className = "panel Panel-danger";
        }
    </script>
    <div class="row">
        <!-- OpSys -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS340_OpSys FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS340_OpSys']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="OpSys">
                <div class="panel-heading">Operating Systems (4)</div>
                <div class="panel-body">
                    <form name='formOpSys' method='post' action="">
                        <input type="text" id="OpSysGrade" placeholder="Edit Grade" name="newGradeOpSys" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitOpSys" id="submitOpSys" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitOpSys'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeOpSys']; $sql=( "UPDATE majorCourses SET CPS340_OpSys= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS340_OpSys FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS340_OpSys']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("OpSys").className = "panel Panel-success";

        }
        else {
            document.getElementById("OpSys").className = "panel Panel-danger";
        }
    </script>
    <!-- LangPro -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS425_LangProcessing FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS425_LangProcessing']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="LangPro">
                <div class="panel-heading">Language Processing (4)</div>
                <div class="panel-body">
                    <form name='formLangPro' method='post' action="">
                        <input type="text" id="LangProGrade" placeholder="Edit Grade" name="newGradeLangPro" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitLangPro" id="submitLangPro" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitLangPro'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeLangPro']; $sql=( "UPDATE majorCourses SET CPS425_LangProcessing= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS425_LangProcessing FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS425_LangProcessing']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("LangPro").className = "panel Panel-success";

        }
        else {
            document.getElementById("LangPro").className = "panel Panel-danger";
        }
    </script>
    <!-- softeng -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS353_SoftEng FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS353_SoftEng']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="softeng">
                <div class="panel-heading">Software Engineering (3)</div>
                <div class="panel-body">
                    <form name='formsofteng' method='post' action="">
                        <input type="text" id="softengGrade" placeholder="Edit Grade" name="newGradesofteng" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitsofteng" id="submitsofteng" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitsofteng'])) { include "_global.php"; $newGrade=$_POST[ 'newGradesofteng']; $sql=( "UPDATE majorCourses SET CPS353_SoftEng= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS353_SoftEng FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS353_SoftEng']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("softeng").className = "panel Panel-success";

        }
        else {
            document.getElementById("softeng").className = "panel Panel-danger";
        }
    </script>
    <!-- DiscContAlgorithms -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS415_DiscContAlgorithms FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS415_DiscContAlgorithms']; ?>
        <div class="col-lg-3 col-md-3 col-sm-3">

            <div ID="DiscContAlgorithms">
                <div class="panel-heading">Discrete and Cont. Algorithms (3)</div>
                <div class="panel-body">
                    <form name='formDiscContAlgorithms' method='post' action="">
                        <input type="text" id="DiscContAlgorithmsGrade" placeholder="Edit Grade" name="newGradeDiscContAlgorithms" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitDiscContAlgorithms" id="submitDiscContAlgorithms" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitDiscContAlgorithms'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeDiscContAlgorithms']; $sql=( "UPDATE majorCourses SET CPS415_DiscContAlgorithms= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS415_DiscContAlgorithms FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS415_DiscContAlgorithms']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("DiscContAlgorithms").className = "panel Panel-success";

        }
        else {
            document.getElementById("DiscContAlgorithms").className = "panel Panel-danger";
        }
    </script>
     <h3>Skills ~ Must Take One</h3>
     <div class="row">
         <!-- Elective -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS493_Elect_1 FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS493_Elect_1']; ?>
 <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

            <div ID="Elective">
                <div class="panel-heading">Elective (3)</div>
                <div class="panel-body">
                    <form name='formElective' method='post' action="">
                        <input type="text" id="ElectiveGrade" placeholder="Edit Grade" name="newGradeElective" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitElective" id="submitElective" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitElective'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeElective']; $sql=( "UPDATE majorCourses SET CPS493_Elect_1= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS493_Elect_1 FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS493_Elect_1']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("Elective").className = "panel Panel-success";

        }
        else {
            document.getElementById("Elective").className = "panel Panel-danger";
        }
    </script>
      <h3>Math, Science & Engineering (MSE), Must Take All </h3>
     <div class="row">
         <!-- Calc1 -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT MAT251_Calc_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['MAT251_Calc_I']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="Calc1">
                <div class="panel-heading">Calculus I (4)</div>
                <div class="panel-body">
                    <form name='formCalc1' method='post' action="">
                        <input type="text" id="Calc1Grade" placeholder="Edit Grade" name="newGradeCalc1" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitCalc1" id="submitCalc1" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitCalc1'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeCalc1']; $sql=( "UPDATE majorCourses SET MAT251_Calc_I= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT MAT251_Calc_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['MAT251_Calc_I']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("Calc1").className = "panel Panel-success";

        }
        else {
            document.getElementById("Calc1").className = "panel Panel-danger";
        }
    </script>
    <!-- SCIENCE1 -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT SCIENCE_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['SCIENCE_I']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="SCIENCE1">
                <div class="panel-heading">Science I (4)</div>
                <div class="panel-body">
                    <form name='formSCIENCE1' method='post' action="">
                        <input type="text" id="SCIENCE1Grade" placeholder="Edit Grade" name="newGradeSCIENCE1" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitSCIENCE1" id="submitSCIENCE1" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitSCIENCE1'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeSCIENCE1']; $sql=( "UPDATE majorCourses SET SCIENCE_I= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT SCIENCE_I FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['SCIENCE_I']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("SCIENCE1").className = "panel Panel-success";

        }
        else {
            document.getElementById("SCIENCE1").className = "panel Panel-danger";
        }
    </script>
    <!-- DigLogic -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT EGC230_DigLogic FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['EGC230_DigLogic']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="DigLogic">
                <div class="panel-heading">Digital Logic Design (3)</div>
                <div class="panel-body">
                    <form name='formDigLogic' method='post' action="">
                        <input type="text" id="DigLogicGrade" placeholder="Edit Grade" name="newGradeDigLogic" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitDigLogic" id="submitDigLogic" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitDigLogic'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeDigLogic']; $sql=( "UPDATE majorCourses SET EGC230_DigLogic= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT EGC230_DigLogic FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['EGC230_DigLogic']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("DigLogic").className = "panel Panel-success";

        }
        else {
            document.getElementById("DigLogic").className = "panel Panel-danger";
        }
    </script>
    <div class="row">
        <!-- CalcII -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT MAT252_Calc_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['MAT252_Calc_II']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="CalcII">
                <div class="panel-heading">Calculus II (4)</div>
                <div class="panel-body">
                    <form name='formCalcII' method='post' action="">
                        <input type="text" id="CalcIIGrade" placeholder="Edit Grade" name="newGradeCalcII" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitCalcII" id="submitCalcII" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitCalcII'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeCalcII']; $sql=( "UPDATE majorCourses SET MAT252_Calc_II= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT MAT252_Calc_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['MAT252_Calc_II']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("CalcII").className = "panel Panel-success";

        }
        else {
            document.getElementById("CalcII").className = "panel Panel-danger";
        }
    </script>
   
     <!-- sc2 -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT SCIENCE_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['SCIENCE_II']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="sc2" class="panel">
                <div class="panel-heading">Science II (4)</div>
                <div class="panel-body">
                    <form name='formsc2' method='post' action="">
                        <input type="text" id="sc2Grade" placeholder="Edit Grade" name="newGradesc2" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitsc2" id="submitsc2" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitsc2'])) { include "_global.php"; $newGrade=$_POST[ 'newGradesc2']; $sql=( "UPDATE majorCourses SET SCIENCE_II= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT SCIENCE_II FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['SCIENCE_II']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
     
    <script type="text/javascript" language="javascript" class="init">
   
        var grade = "<?php echo $grade?>";
       if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){

            document.getElementById("sc2").className = "panel Panel-success";

        }
        else {
            document.getElementById("sc2").className = "panel Panel-danger";
        }
    </script>
    <!-- LogicLab -->
    <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT EGC208_DigLogicLab FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['EGC208_DigLogicLab']; ?>
        <div class="col-lg-4 col-md-4 col-sm-4">

            <div ID="logiclab">
                <div class="panel-heading">Digital Logic Lab (1)</div>
                <div class="panel-body">
                    <form name='formlogiclab' method='post' action="">
                        <input type="text" id="logiclabGrade" placeholder="Edit Grade" name="newGradelogiclab" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitlogiclab" id="submitlogiclab" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitlogiclab'])) { include "_global.php"; $newGrade=$_POST[ 'newGradelogiclab']; $sql=( "UPDATE majorCourses SET EGC208_DigLogicLab= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT EGC208_DigLogicLab FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['EGC208_DigLogicLab']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("logiclab").className = "panel Panel-success";

        }
        else {
            document.getElementById("logiclab").className = "panel Panel-danger";
        }
    </script>
    <!-- Project -->
   <h3>Project Course </h3>
    <div class="row">
        
        <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
             
            <?php session_start(); include "_global.php"; $lastname=$_GET[ 'LastName']; $firstname=$_GET[ 'FirstName']; $sql="SELECT CPS493_Projects FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql); $row = $result->fetch_assoc(); $grade=$row['CPS493_Projects']; ?>
        

            <div ID="Project">
                <div class="panel-heading">Project (4)</div>
                <div class="panel-body">
                    <form name='formProject' method='post' action="">
                        <input type="text" id="ProjectGrade" placeholder="Edit Grade" name="newGradeProject" style="float:right; width:100%;" />
                        <br />
                        <br />
                        <input type="submit" name="submitProject" id="submitProject" class="submitlink" Value="Update" Style="float:right">

                        <?php if(isset($_POST[ 'submitProject'])) { include "_global.php"; $newGrade=$_POST[ 'newGradeProject']; $sql=( "UPDATE majorCourses SET CPS493_Projects= '$newGrade'  WHERE LastName='$lastname' AND FirstName='$firstname'"); $result=$conn->query($sql); session_start(); include "_global.php"; $lastname=$_GET['LastName']; $firstname=$_GET['FirstName']; $sql="SELECT CPS493_Projects FROM majorCourses WHERE LastName = '$lastname' AND FirstName='$firstname'" ; $result=$conn->query($sql);
                        $row = $result->fetch_assoc(); $grade=$row['CPS493_Projects']; } ?>
                        <h3><?php echo "Grade: $grade"; ?></h3>


                </div>
            </div>
        </div>
     <?php $grade=preg_replace('/\s+/', '', $grade);  ?>
    </div>
    <script type="text/javascript" language="javascript" class="init">
        var grade = "<?php echo $grade?>";
        if (grade == "A" || grade == "A-" || grade == "B" || grade == "B+" || grade == "B-" || grade=="C"|| grade=="C-"|| grade=="C+"){
            document.getElementById("Project").className = "panel Panel-success";

        }
        else {
            document.getElementById("Project").className = "panel Panel-danger";
        }
    </script>
    <?php $conn->close(); ?>
    
        
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</body>

</html>
