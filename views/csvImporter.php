
        <p class="lead">Upload an appropriate CSV file. This will replace all current data.</p>
       <form action="upload.php" method="post" enctype="multipart/form-data">
<div class="row">
    <div class="col-lg-4 col-sm-4 col-12">
            <h4>1) Select CSV File to upload</h4>
            <div class="input-group">
                <span class="input-group-btn">
                    <span class="btn btn-primary btn-file">
                        Browse&hellip; <input type="file" name="fileToUpload" id="fileToUpload">
                    </span>
                </span>
                <input type="text" class="form-control" readonly>
            </div>
           
        </div>
         <div class="col-lg-4 col-sm-4 col-12">
            <h4>2) Submit</h4>
           
                <input class="btn btn-primary " type="submit" value="Upload" name="submit">
            
        </div>
         </div>
    
</form>
<div class="row">
    <form action="download.php" method="post" enctype="multipart/form-data">
<div class="col-lg-4 col-sm-4 col-12 col-offset-7">
            <h4>3) Download</h4>
           
                <input class="btn btn-primary " type="submit" value="Download" name="submit">
            
        </div>
        </form>
      </div>
</div>
      



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</body>
</html>

