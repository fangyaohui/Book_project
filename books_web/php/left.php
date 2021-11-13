<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="../css/index.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="div-left-list">
        <ol>
            <li>全部分类</li>
            <?php
                $list = ["文化","科学","历史","计算机","数学"];
                foreach ($list as $i){
                    echo "<li><a href='#'>$i</a></li>";
                }
            ?>
        </ol>
    </div>
</body>
</html>