(function(){
	var video = document.querySelector("#video");
	var canvas = document.getElementById('canvas');
	var photo = document.getElementById('photo');
	var context = canvas.getContext('2d');
	navigator.mediaDevices.getMedia = (navigator.mediaDevices.getUserMedia);
		if (navigator.mediaDevices.getMedia) {
			navigator.mediaDevices.getMedia({ video: true })
			.then(function (stream) {
			video.srcObject = stream;
			})
			.catch(function (err0r) {
				console.log("Something went wrong!");
				});
		}
	document.getElementById('capture').addEventListener('click', function(){
		context.drawImage(video, 0, 0, 400, 300);
		photo.setAttribute('src', canvas.toDataURL('image/png'));
		document.getElementById('hid').value = photo.src;
	});
})();
