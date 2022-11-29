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

	
	<script>



		function getApps() {
			$.post('http://localhost:8080/Api/getAppsByUsername.php', {
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
		$.get('http://localhost:8080/Api/getApps.php', function(data, status) {
			data.data.forEach(app => {
				let html = app.isConfirmed == 0 ? `<tr style="border: solid 1px #000;">
					<td class="id" style="border: solid 1px #000;">${app.id}</td>
					<td class="name">${app.appName}</td>
					<td>${app.srcDownload}</td>
					<td>${app.srcImage}</td>
					<td>${app.decsription}</td>
					<td>${app.userName}</td>
                    <td class="accept"><button onclick="confirm(this)">Accept</button></td>
                    <td class="ban"><button onclick="unConfrim(this)">Ban</button></td>
				</tr>` : ''
				$('.data').append(html)
			});
		}, "json")


        function confirm(element) {
            const parentElement = element.parentElement.parentElement
            const appId = parentElement.querySelector('.id').textContent
			const appName = parentElement.querySelector('.name').textContent
			$.post('/Api/confirm.php', {
				appId: appId,
				action: 'confirm'
			}, () => {
				parentElement.querySelector('.accept').style.display = 'none'
				parentElement.querySelector('.ban').style.display = 'block'
				alert(`Duyệt thành công ứng dụng: ${appName}`)
			}, 'json')
        }


        function unConfrim(element) {
            const parentElement = element.parentElement.parentElement
			const appId = parentElement.querySelector('.id').textContent
			const appName = parentElement.querySelector('.name').textContent
			$.post('/Api/confirm.php', {
				appId: appId,
				action: 'unConfirm'
			}, () => {
				parentElement.querySelector('.accept').style.display = 'block'
				parentElement.querySelector('.ban').style.display = 'none'
				alert(`Đã xóa ứng dụng ${appName}`)
			}, 'json')
        }


	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="/main.js"></script> Sử dụng link tuyệt đối tính từ root, vì vậy có dấu / đầu tiên -->
</body>

</html>