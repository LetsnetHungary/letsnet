<div class="panel">
  <div class="panel-body">
    <h3 class="title-hero">Felhasználó modulok kezelése</h3>
    <div class="wrapper">
      <form id="usermodulesconfigform" class="form-horizontal bordered-row">

        <div class="form-group">
          <label class="col-sm-3 control-label">Felhasználó</label>
          <div class="col-sm-6">
            <select name="" class="custom-select usermodulesconfigemailselect">
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
          <label class="col-sm-3 control-label">Modulok</label>
          <div class="col-sm-6 ">
            <select multiple class="multi-select usermodulesconfigmodulesselect" name="">
            <?php
            for($i = 0; $i < $c_modulesstore; $i++) {
            ?>
              <option><?php echo $modulesstore[$i]["name"];?></option>
            <?php
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-6">
            <input type="submit" class="btn btn-success" id = "usermodulesconfig" value="Mentés!">
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
