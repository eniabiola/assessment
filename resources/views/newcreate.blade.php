<!DOCTYPE html>
<html>
<head>
  <title>Laravel 5 - Ajax Image Uploading Tutorial</title>
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }} "> --}}
   <link rel="stylesheet" type="text/css" href="{{ asset('css/tachyons.min.css') }}">
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery.form.js') }}"></script>
</head>
<body>


<div class="container">
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

<form action="{{ route('AjaxImage') }}" enctype="multipart/form-data" method="POST" class="measure center">

        <div class="alert alert-danger print-error-msg" style="display:none">
              <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>


        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset id="sign_up" class="ba b--transparent ph0 mh0">
          <legend class="f4 fw6 ph0 mh0">Create Product</legend>
        <div class="mt3">
          <label for="name" class="db fw6 lh-copy f6">Name of product</label>
          <input type="text" name="name" id="name" class="pa2 input-reset ba bg-transparent w-100" type="email">
        </div>
        <div class="mv3">
          <label for="description" class="db fw6 lh-copy f6">Product Details</label>
          <textarea id="description" name="description"></textarea>
        </div>
        <div class="mv3">
          <label for="price" class="db fw6 lh-copy f6">Price in Numbers</label>
          <input type="number" id="price" name="price" class="pa2 input-reset ba bg-transparent w-100">
        </div>
        <div class="mv3">
          <label for="category" class="db fw6 lh-copy f6">Product Category</label>
          <input type="text" id="category" name="category" class="pa2 input-reset ba bg-transparent w-100">
        </div>
        <div class="mv3">
          <label for="image" class="db fw6 lh-copy f6">Product Image</label>
          <input type="file" id="image" name="image" class="pa2 input-reset ba bg-transparent w-50">
        </div>
        <div class="mv3">
          <label for="color" class="db fw6 lh-copy f6">Product Colour</label>
          <input type="text" id="color" name="color" class="pa2 input-reset ba bg-transparent w-50" >
            </div>
        </fieldset>

    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Upload Image</button>
    </div>
</form>


</div>
 
<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
      if($.isEmptyObject(response.responseJSON.error)){
        localStorage.setItem("productName", response.responseJSON.productName);
        localStorage.setItem("description", response.responseJSON.description);
        localStorage.setItem("color", response.responseJSON.color);
        localStorage.setItem("category", response.responseJSON.category);
        localStorage.setItem("price", response.responseJSON.price);
        localStorage.setItem("image", response.responseJSON.image);
        // console.log(response);
        // console.log(localStorage.getItem("color"));
        $("input[name='name']").val('');
        $("textarea[name='description']").val('');
        $("input[name='color']").val('');
        $("input[name='category']").val('');
        $("input[name='price']").val('');
        $("input[name='image']").val('');

        window.location.href = "/thank";
      }else{
        printErrorMsg(response.responseJSON.error);
      }
    }
  };


  function printErrorMsg (msg) {
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  $.each( msg, function( key, value ) {
    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
  });
  }
</script>
 

</body>
</html>