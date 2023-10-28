<center>
    <h2><?php echo $_settings->info('name') ?> - <strong>Inicio</strong> </h2>
</center>
<hr class="border-purple">
<style>
    #website-cover {
        width: 100%;
        height: 30em;
        object-fit: cover;
        object-position: center center;
    }
</style>

<hr>


<div class="container">
    <div class="row">




        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://media1.giphy.com/media/uMN4TrmpHbkYmrzgok/giphy.gif?cid=6c09b952aeomsghc5j3vozom346yu7vxtz3mzcj18kv3dh46&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Cursos</h5>
    <center>
        <p class="card-text"><h2> <?php
                    echo $conn->query("SELECT * FROM `course_list` where delete_flag= 0 and `status` = 1 ")->num_rows;
                    ?></h2></p>
    </center>
  </div>
</div>
        </div>

  <div class="col-md-4">
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://i.pinimg.com/originals/5c/37/14/5c3714cba608140b1d6c15ce3f699068.gif" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Alumnos/Estudiantes</h5>
    <center>
        <p class="card-text"><h2>  <?php
                    echo $conn->query("SELECT * FROM `student_list`")->num_rows;
                    ?></h2></p>
    </center>
  </div>
</div>
        </div>

                <div class="col-md-4">
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://solounclic.cl/wp-content/uploads/test7.gif" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Aulas</h5>
    <center>
        <p class="card-text"><h2><?php
                    echo $conn->query("SELECT * FROM `department_list` where delete_flag= 0 and `status` = 1 ")->num_rows;
                    ?></h2></p>
    </center>
  </div>
</div>
        </div>

      <!--<div class="col-md-6">
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Cursos</h5>
    <center>
        <p class="card-text"><h2> <?php
                    echo $conn->query("SELECT * FROM `academic_history`")->num_rows;
                    ?></h2></p>
    </center>
  </div>
</div>
        </div>-->



    </div>
</div>
<!--<div class="row">
    <div class="col-md-12">
        <img src="<?= validate_image($_settings->info('cover')) ?>" alt="Website Cover" class="img-fluid border w-100" id="website-cover">
    </div>
</div>-->