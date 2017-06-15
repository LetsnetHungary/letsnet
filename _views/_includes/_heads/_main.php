<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php echo $this->charset;?>">
    <title><?php echo $this->title;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
<!-- SEO -->
<?php

// Meta tags

if($this->seo != null)
{
foreach($this->seo->meta as $meta => $data)
{
?>
		<meta name="<?php echo $meta; ?>" content = "<?php echo $data; ?>">
<?php
}

// Facebook tags

foreach($this->seo->og as $og => $data)
{
?>
		<meta property="og:<?php echo $og; ?>" content = "<?php echo $data; ?>"/>
<?php
}
}
?>

<style>
    #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
</style>

<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../assets/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../assets/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../assets/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../../assets/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="../../assets/images/icons/favicon.png">

<!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="../../assets/helpers/animate.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/boilerplate.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/border-radius.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/grid.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/page-transitions.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/spacing.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/typography.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/utils.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/colors.css">

<!-- MATERIAL -->

<link rel="stylesheet" type="text/css" href="../../assets/material/ripple.css">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="../../assets/elements/badges.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/buttons.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/content-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/dashboard-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/forms.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/images.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/info-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/invoice.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/loading-indicators.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/menus.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/panel-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/response-messages.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/responsive-tables.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/ribbon.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/social-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/tables.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/tile-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/elements/timeline.css">

<!-- ICONS -->

<link rel="stylesheet" type="text/css" href="../../assets/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="../../assets/icons/linecons/linecons.css">
<link rel="stylesheet" type="text/css" href="../../assets/icons/spinnericon/spinnericon.css">


<!-- WIDGETS -->

<link rel="stylesheet" type="text/css" href="../../assets/widgets/accordion-ui/accordion.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/calendar/calendar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/carousel/carousel.css">

<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/justgage/justgage.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/morris/morris.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/piegage/piegage.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/charts/xcharts/xcharts.css">

<link rel="stylesheet" type="text/css" href="../../assets/widgets/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/colorpicker/colorpicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/carousel/carousel.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datatable/datatable.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/datepicker-ui/datepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dialog/dialog.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dropdown/dropdown.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/dropzone/dropzone.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/file-input/fileinput.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/ionrangeslider/ionrangeslider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/jcrop/jcrop.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/jgrowl-notifications/jgrowl.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/loading-bar/loadingbar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/maps/vector-maps/vectormaps.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/markdown/markdown.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/modal/modal.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-select/multiselect.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/multi-upload/fileupload.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/nestable/nestable.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/noty-notifications/noty.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/popover/popover.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/pretty-photo/prettyphoto.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/progressbar/progressbar.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/range-slider/rangeslider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/slidebars/slidebars.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/slider-ui/slider.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tabs-ui/tabs.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/timepicker/timepicker.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tocify/tocify.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/tooltip/tooltip.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/touchspin/touchspin.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/uniform/uniform.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/wizard/wizard.css">
<link rel="stylesheet" type="text/css" href="../../assets/widgets/xeditable/xeditable.css">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="../../assets/snippets/chat.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/files-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/login-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/notification-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/progress-box.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/todo.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/user-profile.css">
<link rel="stylesheet" type="text/css" href="../../assets/snippets/mobile-navigation.css">

<!-- APPLICATIONS -->

<link rel="stylesheet" type="text/css" href="../../assets/applications/mailbox.css">

<!-- Admin theme -->

<link rel="stylesheet" type="text/css" href="../../assets/themes/admin/layout.css">
<link rel="stylesheet" type="text/css" href="../../assets/themes/admin/color-schemes/default.css">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="../../assets/themes/components/default.css">
<link rel="stylesheet" type="text/css" href="../../assets/themes/components/border-radius.css">

<!-- Admin responsive -->

<link rel="stylesheet" type="text/css" href="../../assets/helpers/responsive-elements.css">
<link rel="stylesheet" type="text/css" href="../../assets/helpers/admin-responsive.css">

<!-- Custom CSS -->

<?php
if($this->cssdata != null)
{
foreach($this->cssdata as $cssdata)
{
?>
		<link type="text/css" rel="stylesheet" href = "<?php echo $cssdata ?>">
<?php
}
}
?>

<!-- JS Core -->
<script type="text/javascript" src="../../assets/js-core/jquery-core.js"></script>
<script type="text/javascript" src="../../assets/js-core/jquery-ui.js"></script>
<script type="text/javascript" src="../../assets/js-core/mate.js"></script>
<script type="text/javascript" src="../../assets/js-core/transition.js"></script>
<script type="text/javascript" src="../../assets/js-core/modernizr.js"></script>
<script type="text/javascript" src="../../assets/js-core/jquery-cookie.js"></script>

<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

<!-- Custom JS -->

<?php
if($this->jsdata != null) {
  foreach($this->jsdata as $jsd) {
      ?>
      <script type="text/javascript" src="<?php echo $jsd?>" ></script>
      <?php
  }
}
?>

</head>

<body class = "closed-sidebar">
    <div id="sb-site">
        <div id="loading"><div class="svg-icon-loader"><img src="../../assets/images/svg-loaders/bars.svg" width="40" alt=""></div></div>
        <div id="page-wrapper">
            <div id="mobile-navigation"><button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button></div>
            <div id="page-content-wrapper">
                <div id="page-content">

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

