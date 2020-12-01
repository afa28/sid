<div class="widget-post-bx">
    <canvas id="video-canvas" width="320" height="240"></canvas>
	<script type="text/javascript" src="http://pdd.my.id:8080/jsmpeg.min.js"></script>
	<script type="text/javascript">
		var players = [];

		players.push(function(){
			var canvas = document.getElementById('video-canvas');
			var url = 'ws://pdd.my.id:8082/stream1';
			var player = new JSMpeg.Player(url, {canvas: canvas});

			return canvas
		});

		players[0].call()
	</script>
</div>