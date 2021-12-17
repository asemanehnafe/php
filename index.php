<?php
@$question=$_POST['question'];
$msg='سوال خود رابپرسید';
$en_name='hafez';
$shansi=random_int(0,15);
$tabdil=file_get_contents('people.json');
$tabdil_data=json_decode($tabdil,true);
$esm=array_keys($tabdil_data);
if(!isset($_POST['btn']))
{
@$englisi=$esm[$shansi];
@$farsi=$tabdil_data[$englisi];
}
@$fa_name=$_POST['person'];
$esmeng=array_search($fa_name,$tabdil_data)?:"hafez";
$msg_size=filesize("messages.txt");
$message_file=fopen("messages.txt","r");
$textmsg=fread($message_file,$msg_size);
$txt[]=explode("\n",$textmsg);
$result=$txt[0][$shansi];
$lenght=strlen($result);
$tarkib=$question.$fa_name;
$hashqestoin=crc32($tarkib).PHP_EOL;
$hashname=crc32($fa_name);
if($hashname!=0)
{
@$int=$hashqestoin / $hashname;
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
        <?php if($question!=null && isset($_POST['btn'])): ?>
        <span id="label">
            <?php
            if($question!=null)
			{
				echo "پرسش:";
            }
            else
			{
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
            <p><?php 
				if(isset($_POST['btn']) && $question!=null)
				{
                        echo $txt[0][$int];
                }
                else
				{
                    echo $msg;
                }
                ?></p>
        </div>
        <div id="person">
            <div id="person">
                <img src="images/people/
				<?php 
				if(isset($_POST['btn']))
				{
					echo "$esmeng.jpg";
				}
				else
				{ 
				echo "$englisi.jpg" ;
				}  
				?>"/>
                <p id="person-name">
				<?php 
				if(isset($_POST['btn']))
				{
					echo "$fa_name";
				}
				else
				{
				echo "$farsi" ;
				} ?></p>
            </div>
        </div>
    </div>
    <div id="new-q">
        <form method="post">
            سوال
            <input type="text" name="question"  maxlength="150" value="<?php echo $question ?>" placeholder="..."/>
            را از
            <select name="person">
                <?php foreach ($tabdil_data as $names): ?>
                <option value="<?php echo $names ?>"
                    <?php if(isset($_POST['btn'])){
                        if($names==$fa_name ){ echo 'selected';}
                    }
                    else{
                        if($names==$farsi ){ echo 'selected';}
                    }
                    ?>
                <?php {echo "$esmeng.jpg";} ?>><?php echo $names; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" name="btn" value="بپرس"/>
        </form>
    </div>
</div>
</body>
</html>