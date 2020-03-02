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

(function(){
	var Animal = document.getElementById('s1');
	var Clothes = document.getElementById('s2');
	var Emoji = document.getElementById('s3');
	var Stickers = document.getElementById('s4');
	
	function getOption() {
		var obj = document.getElementById("mySelect");
		var selected  = obj.options[obj.selectedIndex].text;

		if (selceted == "Animal") {
			var x = document.getElementByClassName("Animal");
			var y = 0;
			while (x[y]) {
				x[y].classList.replace("Animal", "Visible");
				y++;
			}
		} else if (selceted == "Clothes") {
			var x = document.getElementByClassName("Clothes");
			var y = 0;
			while (x[y]) {
				x[y].classList.replace("Clothes", "Visible");
				y++;
			}
		} else if (selceted == "Emoji") {
			var x = document.getElementByClassName("Emoji");
			var y = 0;
			while (x[y]) {
				x[y].classList.replace("Emoji", "Visible");
				y++;
			}
		} else if (selceted == "Stickers") {
			var x = document.getElementByClassName("Stickers");
			var y = 0;
			while (x[y]) {
				x[y].classList.replace("Stickers", "Visible");
				y++;
			}
		}
	}
})
