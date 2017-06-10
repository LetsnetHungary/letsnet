<?php
  $hc = $this->mainslider;
  $texts = $this->promotion;
  $social = $this->social;
  $featured_items = $this->featured_items;
?>

<?php
 ?>
<div class="cms-section-default" id="section0" data-id="0" data-type="imageset" data-view="Index" data-section="mainslider">

<div class="row">
  <div class="col-md-8">
    <p class="page__header">Főoldal : Főslider</p>
    <section id="slider">
      <div id="carousel-container-default" class="container-fluid">
        <div id="slider-main" class="carousel slide" data-ride="carousel">
  					<ol class="carousel-indicators" id="carousel-indicators-default">
              <?php
              $k = 1;
  							foreach($hc as $key => $value) {
  								if($k == "1") {
  									?>
  										<li class="active" data-target="#slider-main" data-slide-to="<?php echo ($k -1); ?>"></li>
  									<?
  								}
  								else {
  								?>
                      <li data-target="#slider-main" data-slide-to="<?php echo ($k -1); ?>"></li>
  								<?
  								}
                  $k++;
  							}
  						?>
  					</ol>
            <div id="
            carousel-default" class="carousel-inner" style="max-height:400px;" role="listbox">
  						<?php
              $k = 1;
  							foreach($hc as $key => $value) {
  								if($k == "1") {
  									?>
  										<div class="item active">
  												<img src="<?php echo $value; ?>" class="header__carousel__img" />
  										</div>
  									<?
  								}
  								else {
  								?>

  									<div class="item">
  											<img src="<?php echo $value; ?>"/>
  									</div>
  								<?
  								}
                  $k++;
  							}
  						?>
  					</div>
  					<a class="left carousel-control" href="#slider-main" role="button" data-slide="prev">
  							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  							<span class="sr-only">&lt;</span>
  					</a>
  					<a class="right carousel-control" href="#slider-main" role="button" data-slide="next">
  							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  							<span class="sr-only">&gt;</span>
  					</a>
  			</div>
      </div>
  </section>
  </div>
  <div class="col-md-4 text-center" style= "margin-top: 80px; max-height: 32vw; overflow-x: hidden; overflow-y: scroll;">
    <div class="info__holder" id = "header_carousel_info_holder">
      <ul id="slide-menu-default" class="slide-menu-default cms-item-default">
        <?php
          $i = 1;
          foreach($hc as $key => $value) {
            ?>
            <li class="menu-row-default">
              <input class="form-control slide-id-default cms-item-default" style = "width: 60px;" type = "number" value = "<?php echo $i;?>">
              <img class="menu-img-default" src = "<?php echo $value;?>" imageid ="<?php echo $key; ?>" position="<?php echo $i;?>">
              <button class="btn btn-danger btn-remove cms-item-default" style = "width: 40px;">-</button>
            </li>
            <?
            $i++;
          }
        ?>
    </ul>

      <button class="btn btn-primary" style="margin-bottom:15px;" id="preview-default">Preview carousel</button>
      <input type = "file" class="file_input cms-imageupload-default" id="header_c_plus_img">
      <img id="preview-img" src="" height="200px" class="preview-img" alt="Image preview...">
      <button class="btn btn-success header_c_plus_item cms-item-default" id="add-item">+</button>
    </div>
  </div>
</div>

<input id="save-mainpage-slider-default" style="margin: 15px 0;" data-section-id="0" class="btn btn-success promo_input cms-save-default" type="submit" value="Mentés!">
</div>

<div class="cms-section-default" id="section1" data-id="1" data-type="plaintext" data-view="Index" data-section="featured_items">
<h3 class="page-header">Főoldal : Featured Items</h3>
<div class="row">
  <div class="col-md-12">
    <form class='cms-form-default'>
      <div class="promo_update">
        <input class="form-control lm cms-item-default basic_input" type="text" name="f" value="<?php echo $featured_items->f; ?>">
        <input class="form-control lm cms-item-default basic_input " type="text" name="s" value="<?php echo $featured_items->s; ?>">
        <input class="form-control lm cms-item-default basic_input " type="text" name="t" value="<?php echo $featured_items->t; ?>">
        <input id="save-mainpage-wording-default" data-section-id="1" class="btn btn-success promo_input cms-save-default" type="submit" value="Mentés!">
      </div>
    </form>
  </div>
</div>
</div>



<div class="cms-section-default" id="section2" data-id="2" data-type="plaintext" data-view="Index" data-section="promotion">
<h3 class="page-header">Főoldal : Rólunk</h3>
<div class="row">
  <div class="col-md-12">
    <section id="about">
      <div class="container_fluid">
          <h1>1. <?php echo $texts->header; ?></h1>
          <p>2.
              <?php echo $texts->body; ?><br />
          </p>
          <h2><?php echo $texts->hashtag1; ?></h2>
          <h2><?php echo $texts->hashtag2; ?></h2>
      </div>
  </section>
  <form class='cms-form-default'>
    <div class="promo_update">
      <input class="form-control lm cms-item-default basic_input" type="text" name="header" value="<?php echo $texts->header; ?>">
      <textarea class="form-control lm longtexteditor cms-item-default basic_input promo_document.querySelector('img'); //selects the query named imginput" type="text" name="body"><?php echo $texts->body; ?></textarea>
      <input class="form-control lm cms-item-default basic_input promo_input" type="text" name="hashtag1" value="<?php echo $texts->hashtag1; ?>">
      <input class="form-control lm cms-item-default basic_input promo_input" type="text" name="hashtag2" value="<?php echo $texts->hashtag2; ?>">
      <input id="save-mainpage-wording-default" data-section-id="2" class="btn btn-success promo_input cms-save-default" type="submit" value="Mentés!">
    </div>
  </form>
</div>
</div>
</div>

<div class="cms-section-default" id="section3" data-id="3" data-type="plaintext" data-view="Index" data-section="social">
<h3 class="page-header">Főoldal : Videó / Szöveg</h3>
<div class="row">
  <div class="col-md-12">
    <section id="social">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="social_video">
                        <iframe id="social_youtube_video" src="<?php echo $social->video_url; ?>" frameborder="0" allowfullscreen=""></iframe>
                    </div>
                </div>
                <div class="col-md-6" id="social_clatography">
                    <div class="table_wrapper">
                        <p class="social_p"><?php echo $social->body; ?></p>
                    </di_a
                </div>
            </div>
        </div>
    </section>
  <form class='cms-form-default'>
    <div class="promo_update">
      <input class="form-control lm cms-item-default basic_input" type="text" name="video_url" value="<?php echo $social->video_url; ?>">
      <textarea class="form-control lm longtexteditor cms-item-default basic_input promo_document.querySelector('img'); //selects the query named imginput" type="text" name="body"><?php echo $social->body; ?></textarea>
      <input id="save-mainpage-wording-default" data-section-id="3" class="btn btn-success promo_input cms-save-default" type="submit" value="Mentés!">
    </div>
  </form>
</div>
</div>
<br>
<input class="btn btn-primary cms-upload-default promo_input" type="submit" value="Változtatások feltöltése" style="margin: 15px 0;">

</div>
</div>
