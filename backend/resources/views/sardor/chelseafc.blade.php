<!DOCTYPE html>
<html>
<head>
	<title>dilwod</title>
</head>
<body>
<h1 style="color: #072F67; text-align: center;">Dilshod</h1>

<!-- 1-usul -->

<ul>
	<? foreach ($player as $key => $value) {?>
	<li><?=$value?></li>	
	<?} ?>
</ul>

<!-- 2-usul -->

<ul>
	@foreach ($player as $key => $value)
	<li>{{$value}}</li>	
	@endforeach
</ul>

</body>
</html>