<?php
  $sites = $this->sites;
  $c_sites = count($sites);

  $dbs = $this->dbs;
  $c_dbs = count($dbs);

  $modulesstore = $this->modulesstore;
  $c_modulesstore = count($modulesstore);
?>
<div class="panel">
  <div class="panel-body">
    <h3 class="title-hero">Új felhasználó hozzáadása</h3>
    <div class="wrapper">
      <form id="nuform" class="form-horizontal bordered-row">

        <div class="form-group">
          <label class="col-sm-3 control-label">Keresztnév</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nufirstname" placeholder="Ádám">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Vezetéknév</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nulastname" placeholder="Vass">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Születési idő</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="nubirth" placeholder="2017.03.13">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" id="nuemail" placeholder="example@letsnet.hu">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Jelszó</label>
          <div class="col-sm-6">
            <input type="password" class="form-control" id="nupassword" placeholder="**********">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Oldal</label>
          <div class="col-sm-6">
            <select class="custom-select nusitekey">
            <?php
            for($i = 0; $i < $c_sites; $i++) {
            ?>
              <option value="<?php echo $sites[$i]["sitekey"];?>"><?php echo $sites[$i]["sitename"];?></option>
            <?php
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Online adatbázis</label>
          <div class="col-sm-6">
            <select name="" class="custom-select nudb">
            <?php
            for($i = 0; $i < $c_dbs; $i++) {
            ?>
              <option value="<?php echo $dbs[$i]["databasekey"];?>" > <?php echo $dbs[$i]["databasename"];?> </option>
            <?php
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Modulok</label>
          <div class="col-sm-6 ">
            <select multiple class="multi-select numodules">
            <?php
            for($i = 0; $i < $c_modulesstore; $i++) {
            ?>
              <option value="<?php echo $modulesstore[$i]["viewid"];?>"><?php echo $modulesstore[$i]["name"];?></option>
            <?php
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Státusz</label>
          <div class="col-sm-6">
            <select name="" class="custom-select nustatus">
              <option>Tulajdonos</option>
              <option>Viszonteladó</option>
              <option>Munkatárs</option>
              <option>Látogató</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label ">Hozzáférés</label>
          <div class="col-sm-6">
            <select name="" class="custom-select nuallow">
              <option value="admin">Admin</option>
              <option value="developer">Fejlesztő</option>
              <option value="visitor">Látogató</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-6">
            <input type="submit" class="btn btn-success" id = "newuser" value="Hozzáadás!">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
