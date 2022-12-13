<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="style/appManagerment.css">
	<title>AppTeq</title>
</head>

<body>
	<h1>APPS</h1>
	<div class="containt d-flex justify-content-center">
		
		<table class="data " >
			<tr><td>ID</td> <td>Name</td> <td>Link</td> <td>Image</td> <td>description</td> <td>User</td></tr>
		</table>
	</div>
	<button onclick="getApps()">get giaosu apps</button>
	<button onclick="getImages()">get Image</button>
	<button onclick="formAdd()">Add app</button>
	<button onclick="formUser()">Register</button>

	<div class="box">
		<div class="form">
			<form action="">
				<label for="name">App's name: </label>
				<input type="text" name="name" id="name"> <br>
				<label for="srcdown">Linkapp:</label>
				<input type="text" name="linkapp" id="linkapp"> <br>
				<label for="srcdown">Link anh:</label>
				<input type="text" name="linkimg" id="linkimg"> <br>
				<label for="srcdown">Desctiption</label>
				<input type="text" name="des" id="des"> <br>
				<label for="srcdown">User: </label>
				<input type="text" name="user" id="user"> <br>
				<label for="srcdown">Type: </label>
				<input type="text" name="type" id="type"> <br>
			</form>
			<button onclick="addApp()">Add</button>
		</div>
	</div>

	<div class="box2">
		<div class="form2">
			<form action="">
				<label for="userName">Tên đăng nhập: </label>
				<input type="text" name="userName" id="userName"><br>
				<label for="pw">Mật khẩu:</label>
				<input type="password" name="pw" id="linkapp"> <br>
				<label for="passConfirm">Nhập lại mật khẩu:</label>
				<input type="password" name="passConfirm" id="passConfirm"> <br>
			</form>
			<button onclick="addUser()">Add</button>
		</div>
	</div>
	<script>
		function formAdd() {
			$('.box').css('display','flex');
		}

		function formUser() {
			$('.box2').css('display','flex');
		}

		function addUser() {
			const userName = $('.form2 input[name="userName"]').val()
			const pass = $('.form2 input[name="pw"]').val()
			const passConfirm = $('.form2 input[name="passConfirm"]').val()
			if(pass === passConfirm) {
				$.post('/Api/addUser.php', {
					userName: userName,
					pw: pass
				}, ()=> {
					alert('successfully')
				})
			}else {
				alert('fail')
			}
			console.log(userName);
		}

		function addApp() {
			$.post('/Api/addApp.php', {
				name: $('input#name').val(),
				linkapp: $('input#linkapp').val(),
				linkimg: $('input#linkimg').val(),
				des: $('input#des').val(),
				user: $('input#user').val(),
				type: $('input#type').val()
			}, function(status, data) {
				$('input#name').val(''),
				$('input#linkapp').val(''),
				$('input#linkimg').val(''),
				$('input#des').val(''),
				$('input#user').val(''),
				$('input#type').val('')
				$('.box').css('display','none');
				getApps()
			})
		}

		function getImages() {
			$.post('/Api/getImage.php', {
				appId: 1
			},function(data, stauts) {
				var html=''
				data.data.forEach(image => {
					html += `<tr style="border: solid 1px #000;">
						<td style="border: solid 1px #000;">${image.imageId}</td>
						<td  style="border: solid 1px #000;">${image.appId}</td>
						<td  style="border: solid 1px #000;">${image.imageSrc}</td>
					</tr>`
				});
				$('.data').html(html);
				}, "json")
			}
				
		

		function getApps() {
			$.post('/Api/getAppsByUsername.php', {
			userName : 'giaosu'
		}, function(data, status) {
			var html=''
			data.data.forEach(app => {
				html += `<tr style="border: solid 1px #000;">
					<td style="border: solid 1px #000;">${app.id}</td>
					<td  style="border: solid 1px #000;">${app.appName}</td>
					<td  style="border: solid 1px #000;">${app.srcDownload}</td>
					<td  style="border: solid 1px #000;">${app.srcImage}</td>
					<td  style="border: solid 1px #000;">${app.decsription}</td>
					<td  style="border: solid 1px #000;">${app.userName}</td>
				</tr>`
			});
			$('.data').html(html);
		}, "json")
		}
		let html = ''
		$.get('/Api/getApps.php', function(data, status) {
			data.data.forEach(app => {
				let html = `<tr style="border: solid 1px #000;">
					<td style="border: solid 1px #000;">${app.id}</td>
					<td>${app.appName}</td>
					<td>${app.srcDownload}</td>
					<td>${app.srcImage}</td>
					<td>${app.decsription}</td>
					<td>${app.userName}</td>
				</tr>`
				$('.data').append(html)
			});
		}, "json")
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>