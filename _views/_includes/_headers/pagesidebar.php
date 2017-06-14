<?php $pages = $this->pages; $c_pages = count($pages); ?>

<div id="page-sidebar">
<div id="header-logo" class="logo-bg">
    <a href="/Index" class="logo-content-big" title="DelightUI">
         <i></i>
        <span></span>
    </a>
    <a id="close-sidebar" href="#" title="Close sidebar">
        <i class="glyph-icon icon-outdent"></i>
    </a>
</div>

<div class="scroll-sidebar">
    <ul id="sidebar-menu"> 
<li class="header"><span>Modulok</span></li> 
<?php
for($i = 0; $i < $c_pages; $i++) {
  ?>
  <li>
      <a href="<?php echo $pages[$i]["redirect"]; ?>" title="<?php echo $pages[$i]["modulename"]; ?>">
          <i class="<?php echo $pages[$i]["icon"]; ?>"></i>
          <span><?php echo $pages[$i]["modulename"]; ?></span>
      </a>
  </li>
    <?php
}
?>
</ul><!-- #sidebar-menu -->
</div>
</div>
