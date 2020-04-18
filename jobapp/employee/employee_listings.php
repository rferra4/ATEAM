<?php include 'inc/eheader.php'; ?>
      <div class="jumbotron">
        <h1 class="display-4">Employee Listings Page</h1>
        <form>
            <select name= "category" class = "form-control">
            <option value = "0" > Choose Company </option>
            <?php foreach($Company as $category): ?>
                <option value = "<?php echo $category->ID_Number; ?>"><?php echo $category->Name; ?></option>
            <?php endforeach; ?>
            </select>
            <br>
            <input type = "submit" class = "btn btn-lg btn-success" value = "Search">
        </form>
      </div>


        <?php foreach($Job_Opening as $job): ?>
        <div class="row marketing">
            <div class="col-md-10">
              <h4><?php echo $job->c_name; ?></h4>
              <p><?php echo $job->Title; ?></p>
              <p><?php echo $job->Status; ?></p>
              <p><?php echo $job->c_add; ?></p>


            </div>
            <div class = "col-md-2">
                    <a class = "btn btn-default" href = "job.php?Opening_ID=<?php echo $job->Opening_ID;
                    ?>">View</a>
            </div>
        </div>
        <?php endforeach; ?>
<?php include 'inc/efooter.php'; ?>
