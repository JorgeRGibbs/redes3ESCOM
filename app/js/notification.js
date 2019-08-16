function showNotification(titulo, mensaje) {
			if(window.Notification) {
				Notification.requestPermission(function(status) { 
					console.log('Status: ', status); 
					var n = new Notification(titulo, { body: mensaje }); 
				});
			}
			else {
				alert('Your browser doesn\'t support notifications.');
			}
		}