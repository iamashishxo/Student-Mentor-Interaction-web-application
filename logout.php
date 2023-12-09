<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESSION CLOSED</title>
    <style>
        body{
        
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
          background-image: url('po.jpg');
          background-size: cover;

        
        }
        .out{
            font-family: 'Times New Roman', Times, serif;
            font-size: 50px;
            color: white;
            margin-top: 290px;
            margin-left:650px;
            animation: slide-up 3s ease-out forwards;
            
        }
          @keyframes slide-up {
        from {
        transform: translateY(10%);
        opacity: 0%;
        }
        to {
        transform: translateY(0);
        opacity: 100%;
        }    
    }
    .button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.5s ease, box-shadow 0.5s ease;
            text-decoration: none;

        }

        .button:hover {
            background-color: #14b0e0fe;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div class="out"><SPAN style="margin-left: 160px;">SESSION EXPIRED!!</SPAN> <BR><p>LOGIN AGAIN TO GAIN ACCESS...</p>
    <a type="submit" href='login.php' class=button >Go to Login page</a>
    </div>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>