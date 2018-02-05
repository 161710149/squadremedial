<!DOCTYPE html>
<html>
	<head>

		<title>Soal 3</title>
	</head>
	<body class="container">
		<center><h4>Soal 3</h4><h3><small>One To Many</small></h3></center>
			@foreach ($jurusan as $rizky)
				<h3> <small>Nama Jurusan: {{$rizky->nama_jurusan}}</small><br>
					<li>Nama Mahasiswa : @foreach($rizky->mahasiswa as $navi) 
					{{$navi->nama_mahasiswa}},
					@endforeach
					</li>
					

				</h4>
				<hr/>
			@endforeach
		</div>
	</body>
</html>