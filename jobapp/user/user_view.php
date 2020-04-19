<?php include_once '../config/init.php'; ?>

<?php include 'inc/uheader.php'; ?>
      <div class="jumbotron">
        <h1 class="display-4">Find Your Dream Job</h1>
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
            <h4><?php echo $job->company; ?></h4>
            <p><?php echo $job->name; ?></p>
            <p><?php echo $job->address; ?></p>


          </div>
          <div class = "col-md-2">
                  <a class = "btn btn-default" href = "job.php?id=<?php echo $job->id;
                  ?>">View</a>
          </div>
      </div>
      <?php endforeach; ?>
