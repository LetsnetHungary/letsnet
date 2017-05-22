<?php $sells = $this->sells; $c_sells = count($sells); $sitekey = $this->sitekey;  ?>
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
<div class="mainsells__holder">
  <table id="datatable-responsive" class="table table-striped table-bordered responsive no-wrap" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th></th>
        <th>Terméknév</th>
        <th>Raktáron</th>
        <th>Webshop raktáron</th>
        <th>Webshop eladások</th>
        <th>Promóciós eladások</th>
        <th>Bizományi eladások</th>
        <th>Összes eladások</th>
      </tr>
    </thead>

  <tfoot>
    <tr>
      <th></th>
      <th>Terméknév</th>
      <th>Raktáron</th>
      <th>Webshop raktáron</th>
      <th>Webshop eladások</th>
      <th>Promóciós eladások</th>
      <th>Bizományi eladások</th>
      <th>Összes eladások</th>
    </tr>
  </tfoot>
<tbody>
 <?php
         for($i=0; $i < $c_sells; $i++) {
           ?>
           <tr>
             <td class="text-center"><img style="max-height:80px;" class="image-responsive" src = "../_cms/<?php echo $sitekey; ?>/_img/Products/<?php echo $sells[$i]["prod_id"];?>.jpg" alt="<?php echo $sells[$i]["prod_id"];?>"></td>
             <td class=""><?php echo $sells[$i]["prod_name"];?></td>
             <td class=""> <input class= "addStock" type="text" data-prodid="<?php echo $sells[$i]["prod_id"];?>" style="max-width:50px; text-align: center;" value="<?php echo $sells[$i]["stock"];?>"> </td>
             <td class=""><input class= "addWebshopStock" type="text" data-prodid="<?php echo $sells[$i]["prod_id"];?>" style="max-width:50px; text-align: center;" value="<?php echo $sells[$i]["webshopstock"];?>"></td>
             <td class=""><?php echo $sells[$i]["webshopsold"];?></td>
             <td class=""><input class= "addFriendlySold" type="text" data-prodid="<?php echo $sells[$i]["prod_id"];?>" style="max-width:50px; text-align: center;" value="<?php echo $sells[$i]["friendlysold"];?>"></td>
             <td class=""><?php echo $sells[$i]["marketsold"];?></td>
             <td class=""><?php echo $sells[$i]["webshopsold"] + $sells[$i]["marketsold"] + $sells[$i]["friendlysold"];?></td>

           </tr>
           <?php
         }
       ?>
</tbody>
  </table>
</div>
