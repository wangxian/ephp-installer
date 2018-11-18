<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>test websocket</title>
</head>
<body>
<div id="box"></div>

<p>http://www.runoob.com/html/html5-websocket.html</p>
<p>0 - 表示连接尚未建立。</p>
<p>1 - 表示连接已建立，可以进行通信。</p>
<p>2 - 表示连接正在进行关闭。</p>
<p>3 - 表示连接已经关闭或者连接不能打开。</p>

<script>

// 带有重连机制的websocket
function IO(url, reconnectInterval) {
  var isConnecting = false;

  // 事件处理器
  var eventHandlers = {
    open: [function(e) {
      isConnecting = false;
    }],
    close: [function(e) {
      if (isConnecting) {
        return ;
      }
      isConnecting = true;

      console.error('[错误]' + (new Date()).toLocaleString() + ", url=" + url + " 已断开连接，即将重新连接");
      factory.connect();
    }]
  };
  var events = ['open', 'message', 'error', 'close'];


  var factory = {
    // 原始连接
    socket: null,

    // 监听事件
    on: function(eventType, fn) {
      if ( !eventHandlers[eventType] ) {
        eventHandlers[eventType] = [];
      }
      eventHandlers[eventType].push(fn);
    },

    // 发送数据
    send: function(data) {
      this.socket.send(data);
    },

    // Connect to ws server
    connect: function() {
      // 如果连接没断开，不进行重试
      if ( this.socket != null && this.socket.readyState !== 3 ) {
        return this;
      }
      // this.socket && console.log(this.socket.readyState);

      // 第一次建立连接，不需要进行连接重试
      if ( this.socket != null ) {
        // console.log("========================setTimeout", this.socket, this.socket ? this.socket.readyState : '');
        setTimeout(this.connect.bind(this), reconnectInterval || 3000);
      }

      this.socket = new WebSocket(url);

      // 监听原始事件
      events.forEach(function(v) {
        factory.socket['on' + v] = function(e) {
          if ( !!eventHandlers[e.type] ) {
            eventHandlers[e.type].forEach(function(fn) {
              fn.call(factory, e);
            });
          }
        }
      })


      return this;
    }
  };

  // 建立连接
  factory.connect();

  return factory;
}

var io = IO("ws://127.0.0.1:8000/echo?store_id=78065");

io.on('open', function (e) {
  console.log('ws.onopen', e);
});

io.on('message', function (e) {
  console.log('ws.onmessage', e);
});

// io.on('error', function (e) {
//   console.log('ws.onerror', e);
// });

// io.on('close', function (e) {
//   console.log('ws.onclose', e);
// });
</script>
</body>
</html>
