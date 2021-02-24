<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php 
    $data['date'] = date("d-m-Y", strtotime($data['date']));
    $data['content'] = str_replace('[Name]',$data['name'],$data['content']);  
    $data['content'] = str_replace('[date]',$data['date'],$data['content']);
    $data['content'] = str_replace('[salary]',$data['salary'],$data['content']);
    $data['content'] = str_replace('[Position]', $data['position_name'], $data['content']);
    $data['content'] = str_replace( "\n", "<br />",$data['content']);
    echo $data['content']
  ?>

</body>
</html>