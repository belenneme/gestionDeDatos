
<meta charset="utf8_general_ci">
<link rel="shortcut icon" type="image/jpg" href="images/logo1.jpg" />
<title>ElPasajeMateriales</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

<link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
<link rel="stylesheet" type="text/css" href="stylesheets/premium.css">
<link rel="stylesheet" href="includes/chosen/chosen.css">

<!-- Calendario -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script src="js/menu.js"></script>
<script src="js/floatinglabel.js"></script>
<script src="js/jquery-ui-timepicker-addon.js"></script>
<script src="includes/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="includes/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>


<script>
$(function() {
$('#f_desde').datetimepicker({
  dateFormat: 'yy-mm-dd',
  timeFormat: 'HH:mm:ss',
  altField: "#h_desde"
});
});

$(function() {
$('#f_hasta').datetimepicker({
  dateFormat: 'yy-mm-dd',
  timeFormat: 'HH:mm:ss',
  altField: "#h_hasta"
});
});

$(function() {
    $( "#fecha" ).datepicker({
	dateFormat: 'yy-mm-dd'
    	});

  });

</script>
<?php date_default_timezone_set('America/Argentina/Tucuman'); ?>
