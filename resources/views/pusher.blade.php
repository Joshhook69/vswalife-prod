<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('e547596dc722f6cbd8fa', {
      cluster: 'us2',
      forceTLS: true
    });

    var channel = pusher.subscribe('default');
    channel.bind('test', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
</html>
