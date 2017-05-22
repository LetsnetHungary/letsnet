
<?php $pagemodules = $this->pageModules; ?>

<div id="sb-site">

  <div id="loading">
      <div class="svg-icon-loader">
          <img src="../../assets/images/svg-loaders/bars.svg" width="40" alt="">
      </div>
  </div>

  <div id="page-wrapper">

    <div id="mobile-navigation">
      <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
    </div>

    <!-- SIDEBAR -->
    <?php require '_views/_includes/_headers/pagesidebar.php'; ?>

    <div id="page-content-wrapper">
      <div id="page-content">

        <!-- HEADER -->
        <?php require '_views/_includes/_headers/_mainHeader.php'; ?>

        <!-- jQueryUI Spinner -->
        <script type="text/javascript" src="../../assets/widgets/spinner/spinner.js"></script>

        <script type="text/javascript">
          /* jQuery UI Spinner */

          $(function() { "use strict";
            $(".spinner-input").spinner();
          });
        </script>

        <!-- jQueryUI Autocomplete -->

        <script type="text/javascript" src="../../assets/widgets/autocomplete/autocomplete.js"></script>
        <script type="text/javascript" src="../../assets/widgets/autocomplete/menu.js"></script>
        <script type="text/javascript" src="../../assets/widgets/autocomplete/autocomplete-demo.js"></script>

        <!-- Touchspin -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/touchspin/touchspin.css">-->
        <script type="text/javascript" src="../../assets/widgets/touchspin/touchspin.js"></script>
        <script type="text/javascript" src="../../assets/widgets/touchspin/touchspin-demo.js"></script>

        <!-- Input switch -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch.css">-->
        <script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch.js"></script>

        <script type="text/javascript">
          /* Input switch */

          $(function() { "use strict";
            $('.input-switch').bootstrapSwitch();
          });
        </script>

        <!-- Textarea -->

        <script type="text/javascript" src="../../assets/widgets/textarea/textarea.js"></script>
        <script type="text/javascript">
          /* Textarea autoresize */

          $(function() { "use strict";
            $('.textarea-autosize').autosize();
          });
        </script>

        <!-- Multi select -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-select/multiselect.css">-->
        <script type="text/javascript" src="../../assets/widgets/multi-select/multiselect.js"></script>
        <script type="text/javascript">
          /* Multiselect inputs */

          $(function() { "use strict";
            $(".multi-select").multiSelect();
            $(".ms-container").append('<i class="glyph-icon icon-exchange"></i>');
          });
        </script>

        <!-- Uniform -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/uniform/uniform.css">-->
        <script type="text/javascript" src="../../assets/widgets/uniform/uniform.js"></script>
        <script type="text/javascript" src="../../assets/widgets/uniform/uniform-demo.js"></script>

        <!-- Chosen -->

        <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/chosen/chosen.css">-->
        <script type="text/javascript" src="../../assets/widgets/chosen/chosen.js"></script>
        <script type="text/javascript" src="../../assets/widgets/chosen/chosen-demo.js"></script>

        <div id="page-title">
          <h2>Termékkezelő</h2>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="panel">
              <div class="panel-body">
                <div class="category_btn_holder">
                  <div class="btn-group cat_button">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Kategóriák <span class="caret"></span><div class="ripple-wrapper"></div></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="btn-group cat_button">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Kategóriák <span class="caret"></span><div class="ripple-wrapper"></div></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                </div>
                <div class="littlecategory__holder title-hero">
                  <a class="btn btn-link font-red" href="#">Címke 1</a>
                  <a class="btn btn-link font-red" href="#">Címke 2</a>
                  <a class="btn btn-link font-red" href="#">Címke 3</a>
                </div>
                <div class="products__holder">

                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel">
              <div class="panel-body">
                <div class="title-hero opt_btn_holder">
                  <button class="btn btn-default opt_btn">Opciók<div class="ripple-wrapper"></div></button>
                  <button class="btn btn-primary opt_btn">Új termék<div class="ripple-wrapper"></div></button>
                </div>
                <div class="item_holder">
                  <div class="main_prop_holder">
                    <div class="input-group">
                        <span class="input-group-addon addon-inside btn-primary">
                            <i class="glyph-icon icon-cogs"></i>
                        </span>
                        <input type="text" class="form-control prop_input" placeholder="Termékkód">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon addon-inside btn-primary">
                            <i class="glyph-icon icon-cogs"></i>
                        </span>
                        <input type="text" class="form-control prop_input" placeholder="Terméknév">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon addon-inside btn-primary">
                            <i class="glyph-icon icon-cogs"></i>
                        </span>
                        <input type="text" class="form-control prop_input" placeholder="Ár">
                    </div>

                    <div class="sold_holder">
                      <h5>Elfogyott</h5><input type="checkbox" class="input-switch-alt" style="display: none;">
                    </div>

                  </div>

                  <div class="prod_category_holder">
                    <h3 class="title-hero">Kategóriák</h3>

                    <div class="one_category_holder">
                      <button class="btn ra-100 btn-default">Karkötők<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                      <button class="btn ra-100 btn-default">Knotaclat<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                      <button class="btn ra-100 btn-default">Karkötők<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                      <button class="btn ra-100 btn-default">Karkötők<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                    </div>

                    <div class="one_category_holder">
                      <button class="btn ra-100 btn-default">Karkötők<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                      <button class="btn ra-100 btn-default">Knotaclat<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                      <button class="btn ra-100 btn-default">Karkötők<div class="ripple-wrapper"></div> <i class="glyph-icon icon-chevron-right"></i></button>
                    </div>

                    <a href="#" class="btn btn-primary popover-button-default pluscategory btn-sm" data-content="<div></div>" title="" data-placement="left" data-original-title="Kategória csoport hozzáadása">
                            + kategória csoport hozzáadása
                        <div class="ripple-wrapper"></div></a>


                  </div>

                  <div class="prod_props">
                    <h3 class="title-hero">Címkék</h3>

                    <div class="prod_props_holder">
                      <a class="btn btn-link font-red" href="#">Piros</a>
                      <a class="btn btn-link font-red" href="#">Szövet</a>
                      <a class="btn btn-link font-red" href="#">Literes</a>
                      <a class="btn btn-link font-red" href="#">Piros</a>
                      <a class="btn btn-link font-red" href="#">Szövet</a>
                      <a class="btn btn-link font-red" href="#">Literes</a>
                      <a class="btn btn-link font-red" href="#">Piros</a>
                      <a class="btn btn-link font-red" href="#">Szövet</a>
                      <a class="btn btn-link font-red" href="#">Literes</a>
                      <a class="btn btn-link font-red" href="#">Piros</a>
                      <a class="btn btn-link font-red" href="#">Szövet</a>
                      <a class="btn btn-link font-red" href="#">Literes</a>
                    </div>

                    <a href="#" class="btn btn-primary popover-button-default pluscategory btn-sm" data-content="<div></div>" title="" data-placement="left" data-original-title="Címke hozzáadása">
                            + címke hozzáadása
                        <div class="ripple-wrapper"></div></a>
                  </div>

                  <div class="properties_holder">
                    <h3 class="title-hero">Tulajdonságok</h3>
                    <div class="properties">
                      <div class="one_property_holder">
                        <input type="text" class="form-control" id="" placeholder="Akármilyen leírás...">
                      </div>
                      <div class="one_property_holder">
                        <input type="text" class="form-control" id="" placeholder="Akármilyen leírás...">
                      </div>
                      <div class="one_property_holder">
                        <input type="text" class="form-control" id="" placeholder="Akármilyen leírás...">
                      </div>
                    </div>
                    <button class="btn btn-primary btn-sm image_btn">+ tulajdonság hozzáadása<div class="ripple-wrapper"></div></button>

                  </div>

                  <div class="image_holder">
                    <h3 class="title-hero">Termék képek</h3>

                    <img class="prod_image" src="http://placehold.it/250x250" alt="">
                    <button class="btn btn-primary btn-sm image_btn">Új képek hozzáadása<div class="ripple-wrapper"></div></button>
                  </div>

                  <div class="delete_prod_holder">
                    <button class="btn btn-danger btn-sm image_btn">Termék törlése<div class="ripple-wrapper"></div></button>

                  </div>

                </div>
                <div class="options_holder">
                  </div>
              </div>
            </div>
          </div>
        </div>

        <?php $this->loadPageModules("letsnet", $pagemodules); ?>

      <!-- PAGEMODULES END -->

      </div>
    </div>
  </div>

<!-- WIDGETS -->

<!-- Bootstrap Dropdown -->

<script type="text/javascript" src="../../assets/widgets/dropdown/dropdown.js"></script>

<!-- Bootstrap Tooltip -->

<script type="text/javascript" src="../../assets/widgets/tooltip/tooltip.js"></script>

<!-- Bootstrap Popover -->

<script type="text/javascript" src="../../assets/widgets/popover/popover.js"></script>

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="../../assets/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<script type="text/javascript" src="../../assets/widgets/button/button.js"></script>

<!-- Bootstrap Collapse -->

<script type="text/javascript" src="../../assets/widgets/collapse/collapse.js"></script>

<!-- Superclick -->

<script type="text/javascript" src="../../assets/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="../../assets/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="../../assets/widgets/slimscroll/slimscroll.js"></script>

<!-- Slidebars -->

<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars.js"></script>
<script type="text/javascript" src="../../assets/widgets/slidebars/slidebars-demo.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage.js"></script>
<script type="text/javascript" src="../../assets/widgets/charts/piegage/piegage-demo.js"></script>

<!-- Screenfull -->

<script type="text/javascript" src="../../assets/widgets/screenfull/screenfull.js"></script>

<!-- Content box -->

<script type="text/javascript" src="../../assets/widgets/content-box/contentbox.js"></script>

<!-- Material -->

<script type="text/javascript" src="../../assets/widgets/material/material.js"></script>
<script type="text/javascript" src="../../assets/widgets/material/ripples.js"></script>


<!-- Overlay -->

<script type="text/javascript" src="../../assets/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="../../assets/js-init/widgets-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="../../assets/themes/admin/layout.js"></script>

</div>
