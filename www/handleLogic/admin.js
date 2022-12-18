
function renderData() {
	document.querySelector('.apps-list').innerHTML = ''
	let html = ''
	$.get('/Api/getApps.php', function(data, status) {
		console.log(data)
		data.data.forEach((app, index) => {
			let html = `<tr>
				<td class="id" style="display: none;">${app.id}</td>
				<td class="index">${index}</td>
				<td class="name">${app.appName}</td>
				<td>${app.userName}</td>
				<td>${app.DATEUP}</td>
				<td>${app.download}</td>
				<td>${app.decsription}</td>
				<td class="ban ${ app.isConfirmed == 0 ? 'd-none': ''}"><button onclick="unConfrim(this)">Ban</button></td>
				<td class="accept ${ app.isConfirmed == 1 ? 'd-none': ''}"><button onclick="confirm(this)">Accept</button></td>
			</tr>`
			$('.apps-list').append(html) //add thẻ vào list hiển thị
			document.querySelector('.apps-statistical').classList.remove('d-none') //ẩn hiện ô chứa dữ liệu của users và apps
			document.querySelector('.users-statistical').classList.add('d-none')
		});
	}, "json")
}
 

//Xử lý duyệt ứng dụng
function confirm(element) {
	const parentElement = element.parentElement.parentElement
	const appId = parentElement.querySelector('.id').textContent
	const appName = parentElement.querySelector('.name').textContent
	$.post('/Api/confirm.php', { 
		appId: appId,
		action: 'confirm'
	}, () => {
		parentElement.querySelector('.accept').classList.add('d-none') //ẩn hiện nút duyệt và ban khi thành công
		parentElement.querySelector('.ban').classList.remove('d-none')
		alert(`Duyệt thành công ứng dụng: ${appName}`)
	}, 'json')
}

//Ban ứng dụng
function unConfrim(element) {
	const parentElement = element.parentElement.parentElement
	const appId = parentElement.querySelector('.id').textContent
	const appName = parentElement.querySelector('.name').textContent
	$.post('/Api/confirm.php', {
		appId: appId,
		action: 'unConfirm'
	}, () => {
		parentElement.querySelector('.accept').classList.remove('d-none')//ẩn hiện nút duyệt và ban khi thành công
		parentElement.querySelector('.ban').classList.add('d-none')
		alert(`Đã xóa ứng dụng ${appName}`)
	}, 'json')
}

//Render user
function renderUsers() {
	document.querySelector('.users-list').innerHTML = ''
	let html = ''
	$.get('/Api/selectUser.php', function(data, status) {
		data.data.forEach((user, index) => {
			let html = `<tr>
				<td class="id" style="display: none;">${index}</td>
				<td class="userName">${user.userName}</td>
				<td class="name">${user.fullName}</td>
				<td>${user.userName}</td>
				<td>${user.dateCreate}</td>
				<td>${user.total}</td>
				<td class="delUser"><button onclick="unConfrim(this)">Xóa</button></td>
			</tr>`
			$('.users-list').append(html)
			document.querySelector('.apps-statistical').classList.add('d-none')
			document.querySelector('.users-statistical').classList.remove('d-none')
		});
	}, "json")
}

//gán sự kiện click
function addEvent() {
	document.querySelector('.usersManager').addEventListener('click', e=> renderUsers())
	document.querySelector('.appsManager').addEventListener('click',e=> renderData())
}

//Render các thống kê của sever
function getStatistical() {
	$.get('/Api/statistical.php', function(data) { //gọi api lấy data
		console.log(data)
		document.querySelector('.apps-statistical .statistical').innerHTML=`<tr>
			<td>${data.apps.totalApps}</td>
			<td>${data.apps.totalDownload}</td>
		</tr>`

		document.querySelector('.users-statistical .statistical').innerHTML=`<tr>
			<td>${data.users.totalUsers}</td>
		</tr>`

		console.log(document.querySelector('.users-statistical .statistical'))
	}, 'json')
}

getStatistical()

addEvent()

renderData()
