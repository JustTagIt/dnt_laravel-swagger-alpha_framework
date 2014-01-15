<!DOCTYPE html>
<html>
<head>
  <title>Swagger UI</title>
  <link href='//fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'/>
  <link href='{{ URL::asset('packages/domandtom/laravel-swagger/css/highlight.default.css') }}' media='screen' rel='stylesheet' type='text/css'/>
  <link href='{{ URL::asset('packages/domandtom/laravel-swagger/css/screen.css') }}' media='screen' rel='stylesheet' type='text/css'/>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/shred.bundle.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/jquery-1.8.0.min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/jquery.slideto.min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/jquery.wiggle.min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/jquery.ba-bbq.min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/handlebars-1.0.0.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/underscore-min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/backbone-min.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/swagger.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/swagger-ui.js') }}" /></script>
  <script type="text/javascript" src="{{ URL::asset('packages/domandtom/laravel-swagger/lib/highlight.7.3.pack.js') }}" /></script>

  <script type="text/javascript">
    $(function () {
      window.swaggerUi = new SwaggerUi({
      url: "{{$swaggerIndex}}",
      dom_id: "swagger-ui-container",
      supportedSubmitMethods: ['get', 'post', 'put', 'delete'],
      onComplete: function(swaggerApi, swaggerUi){
        if(console) {
          console.log("Loaded SwaggerUI")
        }
        $('pre code').each(function(i, e) {hljs.highlightBlock(e)});
      },
      onFailure: function(data) {
        if(console) {
          console.log("Unable to Load SwaggerUI");
          console.log(data);
        }
      },
      docExpansion: "none"
    });

    $('#input_apiKey').change(function() {
      var key = $('#input_apiKey')[0].value;
      console.log("key: " + key);
      if(key && key.trim() != "") {
        console.log("added key " + key);
        window.authorizations.add("key", new ApiKeyAuthorization("api_key", key, "query"));
      }
    })
    window.swaggerUi.load();
  });

  </script>
</head>

<body>
<div id='header'>
  <div class="swagger-ui-wrap">
    <a id="logo" href="http://swagger.wordnik.com">swagger</a>

    <form id='api_selector'>
      <div class='input icon-btn'>
        <img id="show-pet-store-icon" src="{{ URL::asset('packages/domandtom/laravel-swagger/images/pet_store_api.png') }}" title="Show Swagger Petstore Example Apis">
      </div>
      <div class='input icon-btn'>
        <img id="show-wordnik-dev-icon" src="{{ URL::asset('packages/domandtom/laravel-swagger/images/wordnik_api.png') }}" title="Show Wordnik Developer Apis">
      </div>
      <div class='input'><input placeholder="http://example.com/api" id="input_baseUrl" name="baseUrl" type="text"/></div>
      <div class='input'><input placeholder="api_key" id="input_apiKey" name="apiKey" type="text"/></div>
      <div class='input'><a id="explore" href="#">Explore</a></div>
    </form>
  </div>
</div>

<div id="message-bar" class="swagger-ui-wrap">
  &nbsp;
</div>

<div id="swagger-ui-container" class="swagger-ui-wrap">

</div>

</body>

</html>
