<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body>
    <div id="token"></div>
    <div id="msg"></div>
    <div id="notis"></div>
    <div id="err"></div>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-analytics.js"></script>
	<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js"></script>
    <script>
        MsgElem = document.getElementById("msg");
        TokenElem = document.getElementById("token");
        NotisElem = document.getElementById("notis");
        ErrElem = document.getElementById("err");
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
            'messagingSenderId': '48481771203',
            'apiKey': 'AIzaSyAq_MFpZ4cvYbAWMTeOpr6Ato4hbGLgd6I',
            'projectId': 'assindo-27686',
            'appId': '1:48481771203:web:8d820884e4a2b2bf3acc76',
        };
        firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");
                
                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                TokenElem.innerHTML = "token is : " + token
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

        let enableForegroundNotification = true;
        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload.data.body);
			alert(payload.data.notification)
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload);

            if(enableForegroundNotification) {
                const {title, ...options} = JSON.parse(payload.data.notification);
                navigator.serviceWorker.getRegistrations().then(registration => {
                    registration[0].showNotification(title, options);
                });
            }
        });
    </script>

    </body>

</html><?php /**PATH D:\DEV_SERVER\htdocs\atmserv\coresys\views/layouts/firebase.blade.php ENDPATH**/ ?>