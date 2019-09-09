<html>
<head>
  <script type="text/javascript">
    var productname = localStorage.getItem("productName");
    var description = localStorage.getItem("description");
    var color = localStorage.getItem("color");
 	var category = localStorage.getItem("category");
 	var price = localStorage.getItem("price");
 	var image = localStorage.getItem("image");
 	document.getElementById('imageBox').src = "http://127.0.0.1:8000/images/" + image;
  </script>
   <link rel="stylesheet" type="text/css" href="{{ asset('css/tachyons.min.css') }}">
</head>
<?php
 $productName = "<script>document.writeln(roductname);</script>";
 $description = "<script>document.writeln(description);</script>";
 $color = "<script>document.writeln(color);</script>";
 $category = "<script>document.writeln(category);</script>";
 $price = "<script>document.writeln(price);</script>";
 $image = "<script>document.writeln(image);</script>";
?>
<?php $image = '<script>document.writeln(category);</script>' ?>
<header class="sans-serif">
    <div class="cover bg-left bg-center-l" style="background-image: url(http://mrmrs.github.io/photos/u/011.jpg)">
      <div class="bg-black-80 pb5 pb6-m pb7-l">
        <nav class="dt w-100 mw8 center"> 
          <div class="dtc w2 v-mid pa3">
            <a href="/" class="dib w2 h2 pa1 ba b--white-90 grow-large border-box">
              <svg class="link white-90" data-icon="skull" viewBox="0 0 32 32" style="fill:currentcolor"><title>skull icon</title><path d="M16 0 C6 0 2 4 2 14 L2 22 L6 24 L6 30 L26 30 L26 24 L30 22 L30 14 C30 4 26 0 16 0 M9 12 A4.5 4.5 0 0 1 9 21 A4.5 4.5 0 0 1 9 12 M23 12 A4.5 4.5 0 0 1 23 21 A4.5 4.5 0 0 1 23 12"></path></svg>
            </a>
          </div>
          <div class="dtc v-mid tr pa3">
            <a class="f6 fw4 no-underline white-70 dn dib-ns pv2 ph3" href="/" >How it Works</a> 
            <a class="f6 fw4 no-underline white-70 dn dib-ns pv2 ph3" href="/" >Pricing</a> 
            <a class="f6 fw4 no-underline white-70 dn dib-l pv2 ph3" href="/" >About</a> 
            <a class="f6 fw4 no-underline white-70 dn dib-l pv2 ph3" href="/" >Careers</a> 
            <a class="f6 fw4 no-underline white-70 dib ml2 pv2 ph3 ba" href="/" >Sign Up</a> 
          </div>
        </nav> 
        <div class="tc-l mt4 mt5-m mt6-l ph3">
          <h1 class="f2 f1-l fw2 white-90 mb0 lh-title">This is your super impressive headline</h1>
          <h2 class="fw1 f3 white-80 mt3 mb4">Now a subheadline where explain your wonderful new startup even more</h2>
          <a class="f6 no-underline grow dib v-mid bg-blue white ba b--blue ph3 pv2 mb3" href="/">Call to Action</a>
          <span class="dib v-mid ph3 white-70 mb3">or</span>
          <a class="f6 no-underline grow dib v-mid white ba b--white ph3 pv2 mb3" href="">Secondary call to action</a>
        </div>
      </div>
    </div> 
</header>

<body>
    </h1>
    <section class="mw7 center avenir">
	  <article class="bt bb b--black-10">
	    <a class="db pv4 ph3 ph0-l no-underline black dim" href="#0">
	      <div class="flex flex-column flex-row-ns">
	        <div class="pr3-ns mb4 mb0-ns w-100 w-40-ns">
	        	<img src='' id="imageBox"> 
	          <img src="http://127.0.0.1:8000/images/.{!! '<script>document.writeln(category);</script>' !!}
" alt="" class="db" alt="Photo of a dimly lit room with a computer interface terminal.">
	        </div>
	        <div class="w-100 w-60-ns pl3-ns">
	          <h1 class="f3 fw1 baskerville mt0 lh-title">
	            {!! "<script>document.writeln(productname);</script>" !!}</h1>
	          <p class="f6 f5-l lh-copy">
	            {!! "<script>document.writeln(description);</script>" !!}
	          </p>
	          <p class="f6 lh-copy mv0">
	            {!! "<script>document.writeln(price);</script>" !!}<br>
	            {!! "<script>document.writeln(category);</script>" !!}<br>
	            Color: {!! "<script>document.writeln(color);</script>" !!}</p>
	        </div>
	      </div>
	    </a>
	  </article>
	</section>
</body>
</html>