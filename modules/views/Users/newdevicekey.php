<?php $users = $this->users; $c_u = count($users);?>
<div class="panel">
  <div class="panel-body">
    <h3 class="title-hero">Új készülékkulcs hozzádása</h3>
    <div class="wrapper">
      <form id="devicekeyform" class="form-horizontal bordered-row">

        <div class="form-group">
          <label class="col-sm-3 control-label">Email</label>
          <div class="col-sm-6">
            <select name="" class="custom-select newdevicekeyemailselect">
            <?php
            for($i = 0; $i < $c_u; $i++) {
            ?>
              <option value="<?php echo $users[$i]["email"];?>"><?php echo $users[$i]["email"];?></option>
            <?php
            }
            ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Készüléknév</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="newdevicenameinput" placeholder="Vass Albert's MacBook Pro Safari">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label">Készülékkulcs</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" id="newdevicekeyinput" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-6">
            <input type="submit" class="btn btn-success" id = "newdevicekey" value="Hozzáadás!">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
