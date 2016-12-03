<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>hello</title>
</head>
<body>
  hello <?php echo $this->name;?>
  <pre><code>infos=<?php echo json_encode($this->infos);?></code></pre>
  <pre>dump(infos)<?php echo dump('infos=', $this->infos);?></pre>
</body>
</html>
