<?php $commissions = $this->commissions; $sitekey = $this->sitekey; $products = $this->products; $cp = count($products); $shops = $this->shops; $css = count($shops); $prices = $this->prices; $cpr = count($prices);?>
<!-- Data tables -->

<!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="../../assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="../../assets/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="../../assets/widgets/datatable/datatable-responsive.js"></script>

<script type="text/javascript">

    /* Datatables responsive */

    $(document).ready(function() {
        $('#datatable-responsive').DataTable( {
            responsive: true
        } );
    } );

    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Keresés...");
    });

</script>


<?php
  foreach($commissions as $key => $value) {
?>
  <div class="panel" style = "overflow: auto;">
    <div class="panel-body">
      <div class="example-box-wrapper">
        <table id="datatable" class="table table-striped table-bordered no-wrap" cellspacing="0" width="100%">
        <tr class = "maintr">
          <td><img class="image-responsive" src = "../_cms/<?php echo $sitekey ?>/_img/Products/<?php echo $value->records[0]->prod_id;?>/1.jpeg" style = "max-height: 100px;"></td>
          <td><span style = "font-size: 120%;"><?php echo $value->prod_name;?></span></td>
          <td><!--<button class="btn btn-success">Új elem hozzáadása</button> --></td>
          <td><!--<button class="btn btn-primary display__button" id="<?php echo $key;?>">Eladások megjelenítése</button>--></td>
          <td></td>
          <td></td>
          <td></td>
          <td> </td>
        </tr>
        <tr class="l">
          <td>Átadás dátuma</td>
          <td>Határidő</td>
          <td>Eladó neve</td>
          <td>Ár</td>
          <td>Odaadott mennyiség</td>
          <td>Eladott mennyiség</td>
          <td>Hátramaradt</td>
          <td>Törlés</td>
        </tr>

        <?php
          $c = count($value->records);
          for ($k=0; $k < $c; $k++) {
        ?>
        <tr class="">
          <td><?php echo $value->records[$k]->givedate; ?> </td>
          <td><?php echo $value->records[$k]->deadline; ?> </td>
          <td><?php echo $value->records[$k]->who; ?> </td>
          <td><?php echo $value->records[$k]->price; ?> Ft </td>
          <td><?php echo $value->records[$k]->count; ?> db | <?php echo $value->records[$k]->count * $value->records[$k]->price * 1000;?> Ft</td>
          <td><input class= "refreshcount" id="<?php echo $value->records[$k]->id;?>" type="text" style="max-width:50px;" value="<?php echo $value->records[$k]->sold; ?>"> db | <?php echo $value->records[$k]->sold * $value->records[$k]->price * 1000;?> Ft </td>
          <td><?php echo $value->records[$k]->count - $value->records[$k]->sold; ?> db |  <?php echo ($value->records[$k]->count - $value->records[$k]->sold) * $value->records[$k]->price * 1000;?> Ft</td>
          <td><input type="submit" class="btn btn-danger deleteitem" id = "<?php echo $value->records[$k]->id;?>"value = "Törlés!"></td>
        </tr>
        <?php
      }?>
          </table>
        </div>
      </div>
    </div>
      <?php  }
        ?>
           <div class="panel" style = "overflow: auto;">
             <div class="panel-body">
               <h3 class="title-hero">
                 Új bizomány hozzáadása
               </h3>
               <div class="example-box-wrapper">
                   <table id="datatable" class="table table-striped table-bordered no-wrap" cellspacing="0" width="100%">
                     <thead>
                       <th>Termék kiválasztása</th>
                       <th>Eladó neve</th>
                       <th>Határidő</th>
                       <th>Ár</th>
                       <th>Odaadott mennyiség</th>
                     </thead>
                     <tr class="">
                       <form id = "newitem">
                       <td class="">
                           <select name="product">
                           <?php
                           for($i = 0; $i < $cp; $i++) {
                             ?>
                             <option value="<?php echo $products[$i]["prod_id"]?>"><?php echo $products[$i]["prod_name"]?></option>
                             <?php
                           }
                           ?>
                         </select>
                       <!--  </datalist> -->
                       </td>
                       <td class="">
                         <input type="text" name="name" list="names"/>
                         <datalist id="names">
                           <?php
                           for($i = 0; $i < $css; $i++) {
                             ?>
                             <option value="<?php echo $shops[$i]["who"];?>"><?php echo $shops[$i]["who"];?></option>
                             <?php
                           }
                           ?>
                         </datalist>
                       </td>
                       <td class="">
                         <input type="text" name="deadline"/>
                       </td>
                       <td class="">
                         <input type="text" name="price" list="price"/>
                         <datalist id="price">
                           <?php
                           for($i = 0; $i < $cpr; $i++) {
                             ?>
                             <option value="<?php echo $prices[$i]["price"];?>"><?php echo $prices[$i]["price"];?></option>
                             <?php
                           }
                           ?>
                         </datalist>
                       </td>
                       <td class="">
                         <input type="text" name="count"/>
                       </td>
                       </td>
                     </form>
                     </tr>
                   </table>
               </div>
             </div>
           </div>
           <button id = "pluscommission" class = "btn btn-success">Hozzáadás!</burtton>


            </div>
