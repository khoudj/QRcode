            <!-- Carousel================================================== -->
    <div id="myCarousel" class="carousel slide">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?=BASE_URL.DS.'img'.DS?>qr1.jpg" data-src="holder.js/100%x500/auto/#777:#7a7a7a/text:First slide" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-primary">Dans un bar...</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, iure minima perferendis eum.</p>
              <p><a class="btn btn-large btn-primary" href="<?=BASE_URL.DS.'pages'.DS?>signup">Inscris-toi !</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?=BASE_URL.DS.'img'.DS?>qr2.jpg" data-src="holder.js/100%x500/auto/#777:#7a7a7a/text:Second slide" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-primary">Un vernissage ...</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, iure minima perferendis eum.</p>
              <p><a class="btn btn-large btn-primary" href="<?=BASE_URL.DS.'pages'.DS?>signup">Inscris-toi !</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?=BASE_URL.DS.'img'.DS?>qr3.jpg" data-src="holder.js/100%x500/auto/#777:#7a7a7a/text:Third slide" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1 class="text-primary">Pensez grand ...</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, iure minima perferendis eum.</p>
              <p><a class="btn btn-large btn-primary" href="<?=BASE_URL.DS.'pages'.DS?>signup">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
<?php
	if(isset($alert)){
		$alert = new Alerts($alert);
		$alert->alert();
	} 
?>
    <div class="jumbotron">
      <div class="container">
        <h1><span class="glyphicon glyphicon-qrcode"></span> PLAN.Qrcode</h1>
        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, accusamus voluptate eos aperiam odio tempora vitae dignissimos mollitia tenetur neque suscipit nemo sint vero. Doloremque quaerat omnis perspiciatis deserunt dolores.</p>
        <p><a class="btn btn-primary btn-small">Comment ça marche &raquo;</a></p>
      </div>
    </div>
<div class="row">
	<div class="col-lg-6">
	          <h2>Expose ton QRcode</h2>
	          <p><img src="<?=BASE_URL.DS.'img'.DS?>qrcode_accueil.jpg" class="img-rounded" alt="Ton QRCode"/></p>
	</div>
	<div class="col-lg-6">
	          <h2>Comment faire ?</h2>
	          <p> m Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi, necessitatibus, a autem quaerat suscipit dolorem perspiciatis odio ea facere perferendis quo deleniti ipsam in ducimus optio quas doloremque aliquam.consectetur adipisicing elit. Reprehenderit, temporibus, harum error similique odit ad omnis praesentium autem aperiam est veniam quod doloribus fuga? Nesciunt, ex optio perferendis illo cumque!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed, soluta, aliquam, ipsam voluptatum laborum natus magnam saepe necessitatibus maxime repudiandae aspernatur provident doloremque porro eum eos explicabo enim. Esse, rem.</p>
	          <p><a class="btn btn-default" href="#">View details &raquo;</a></p>
	</div>
</div>