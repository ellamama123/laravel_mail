<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $data['dateTime'] = date("H:i d-m-Y", strtotime($data['dateTime']));
    $data['content'] = str_replace('[Name]',$data['name'],$data['content']);  
    $data['content'] = str_replace('[dateTime]',$data['dateTime'],$data['content']);
    $data['content'] = str_replace('[Position]', $data['position_name'], $data['content']);
    
    $data['content'] = str_replace( "\n", "<br />",$data['content']);
    echo $data['content']
  ?>

</body>
</html>