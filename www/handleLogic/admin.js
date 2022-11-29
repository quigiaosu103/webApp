renderData()

		function renderData() {
			let html = ''
			$.get('/Api/getApps.php', function(data, status) {
				console.log(data.data)
				data.data.forEach(app => {

					let html = `<tr style="border: solid 1px #000;">
						<td class="id" style="border: solid 1px #000;">${app.id}</td>
						<td class="name">${app.appName}</td>
						<td>${app.srcDownload}</td>
						<td>${app.srcImage}</td>
						<td>${app.decsription}</td>
						<td>${app.userName}</td>
						<td class="ban ${ app.isConfirmed == 0 ? 'd-none': ''}"><button onclick="unConfrim(this)">Ban</button></td>
						<td class="accept ${ app.isConfirmed == 1 ? 'd-none': ''}"><button onclick="confirm(this)">Accept</button></td>
					</tr>`
					$('.data').append(html)
				});
			}, "json")
		}


        function confirm(element) {
            const parentElement = element.parentElement.parentElement
            const appId = parentElement.querySelector('.id').textContent
			const appName = parentElement.querySelector('.name').textContent
			$.post('/Api/confirm.php', {
				appId: appId,
				action: 'confirm'
			}, () => {
				parentElement.querySelector('.accept').classList.add('d-none')
				parentElement.querySelector('.ban').classList.remove('d-none')
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
				parentElement.querySelector('.accept').classList.remove('d-none')
				parentElement.querySelector('.ban').classList.add('d-none')
				alert(`Đã xóa ứng dụng ${appName}`)
			}, 'json')
        }
