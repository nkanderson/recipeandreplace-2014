<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title>Recipe &amp; Replace - Single Item Substitution</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-47776206-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://recipeandreplace.com">Recipe &amp; Replace</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="javascript:void(0)">Home</a></li>
            <li><a href="about">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="content">
        <h3>Enter a food you want to substitute:</h3>
    		<form action="" class="single_sub" method="post" accept-charset="utf-8">
    		  <input type="text" name="item" value="" placeholder="Food item" />
    		  <input type="submit" class="btn btn-default" name="submit" value="Find a sub!"  />
    		</form>
    		<ul class="sub_list">
    		</ul>
      </div>

    </div><!-- /.container -->

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  	<script type="text/javascript">
    	$("document").ready(function(){
    	  $(".single_sub").submit(function(){
    	    var data = $(this).serialize();
    	    $.ajax({
    	      type: "POST",
    	      dataType: "json",
    	      url: "single_sub.php",
    	      data: data,
    	      success: function(data) {
      			  if (typeof data["subs"] != "undefined") {
      				  var list_split = data["subs"].split(',');
      				  var return_string = '';
      				  for (var i = 0; i < list_split.length; i++) {
      					  return_string += ('<li>'+list_split[i]+'</li>');
      				  }
      			  } else {
      				  var return_string = "Sorry, we don't have that in the database yet."
      			  }
    	        $(".sub_list").html(
        				return_string
        			);
    	      }
    	    });
    	    return false;
    	  });
    	});
  	</script>
  </body>
</html>
