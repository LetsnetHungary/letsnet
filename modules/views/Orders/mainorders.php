<?php $data = $this->data; $c_data = count($data);  ?>
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

<div class="mainorders__holder">
  <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>#</th>
        <th>Dátum</th>
        <th>Kosár</th>
        <th>Név</th>
        <th>E-mail</th>
        <th>Telefon</th>
        <th>Típus</th>
        <th>Állapot</th>
      </tr>
    </thead>

  <tfoot>
    <tr>
      <th>#</th>
      <th>Dátum</th>
      <th>Kosár</th>
      <th>Név</th>
      <th>E-mail</th>
      <th>Telefon</th>
      <th>Típus</th>
      <th>Állapot</th>
    </tr>
  </tfoot>
<tbody>
<?php
for($i = 0; $i < $c_data; $i++) {
 $cart = json_decode($data[$i]["cart"]);
 $minus = ($c_data - $i);
 ?>
 <tr class = "<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?> orderline orderView"
   data-id="<?php echo $data[$i]["id"];?>"
 >
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $i?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $data[$i]["datee"];?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php

   foreach ($cart as $keyb => $bracelet) {
     echo "$bracelet->prod_name ($bracelet->count) <br>";
   }
  ?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $data[$i]["name"];?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $data[$i]["email"];?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $data[$i]["phone"];?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php echo $data[$i]["type"];?></td>
 <td class="<?php if($data[$i]["state"] == 0){echo "denytr";}else if($data[$i]["state"] == 1){echo "waitingtr";}else if($data[$i]["state"] == 2){echo "activetr";}?>"><?php
 if($data[$i]["state"] == 0)
 {
   echo "Nincs kezelve";
 }
 else if($data[$i]["state"] == 1)
 {
   echo "Kiszállítás alatt";
 }
 else if($data[$i]["state"] == 2)
 {
   echo "Kiszállítva";
 }

 ?></td>
 </tr>

<?php
}
?>
</tbody>
  </table>
</div>

<?php require("_views/_includes/_modals/_ordermodal.php") ?>
