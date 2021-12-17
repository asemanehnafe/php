<?php
@$question = $_POST['question'];
$msg = 'سوال خود رابپرسید';
$en_name = 'hafez';
$rnd=random_int(0,15);
$json = file_get_contents('people.json');
$json_data = json_decode($json,true);
$set_name=array_keys($json_data);
if(!isset($_POST['btn'])){
@$eng_name1=$set_name[$rnd];
@$fa_name1=$json_data[$eng_name1];
}


@$fa_name = $_POST['person'];
$eng_name = array_search ($fa_name, $json_data )?:"hafez";
$msg_size=filesize("messages.txt");
$message_file=fopen("messages.txt","r");
$msg_txt = fread( $message_file, $msg_size );
$txt[]=explode("\n",$msg_txt);
$res=$txt[0][$rnd];
$res_len=strlen($res);
$mix= $question . $fa_name;
$hashq=crc32($mix).PHP_EOL;
$hashn=crc32($fa_name);
if($hashn!=0)
{
    @$int=$hashq / $hashn;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="styles/default.css">
    <title>مشاوره بزرگان</title>
</head>
<body>
<p id="copyright">تهیه شده برای درس کارگاه کامپیوتر،دانشکده کامییوتر، دانشگاه صنعتی شریف</p>
<div id="wrapper">
    <div id="title">
        <?php if(isset($_POST['btn']) && $question != null ): ?>
        <span id="label">
            <?php
            if($question != null){

                echo "پرسش:";
            }
            else{
                echo "! سوال خود را بپرس";
            }
            ?>
        </span>
        <?php endif;?>
        <span id="question"><?php
                echo $question;
          ?></span>
    </div>
    <div id="container">
        <div id="message">
            <p><?php if(isset($_POST['btn']) && $question != null)
            {
                        echo $txt[0][$int];
                }
                else{
                    echo $msg;
                    }
                ?></p>
        </div>
        <div id="person">
            <div id="person">
                <img src="images/people/<?php if(isset($_POST['btn'])){echo "$eng_name.jpg";}else{ echo "$eng_name1.jpg" ;}  ?>"/>
                <p id="person-name"><?php if(isset($_POST['btn'])){echo "$fa_name";}else{ echo "$fa_name1" ;} ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post">
            سوال
            <input type="text" name="question"  maxlength="150" value="<?php echo $question ?>" placeholder="..."/>
            را از
            <select name="person">
                <?php foreach ($json_data as $names): ?>
                <option value="<?php echo $names ?>"
                    <?php if(isset($_POST['btn'])){
                        if($names==$fa_name ){ echo 'selected';}
                    }
                    else{
                        if($names==$fa_name1 ){ echo 'selected';}
                    }
                    ?>
                <?php {echo "$eng_name.jpg";} ?>><?php echo $names; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="btn" value="بپرس"/>
        </form>
    </div>
</div>
</body>
</html>