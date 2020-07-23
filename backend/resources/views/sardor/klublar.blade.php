<!DOCTYPE html>
<html>
<head>
	<title>Clubs</title>
</head>
<body>
<h1 style="color: #072F67; text-align: center;">Klublar</h1>


	@foreach ($klubs as $key => $klub)
<ul>
	<li><b>klub nomi:</b><a href="clublar/{{$klub->id}}">{{$klub->clubname}}</a></li>	
	
</ul>
	@endforeach

</body>
</html>