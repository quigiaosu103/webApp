$.get('http://localhost:8080/admin/getApps.php', function(data, status) {
		data.data.array.forEach(app => {
			console.log(app);
	});
})