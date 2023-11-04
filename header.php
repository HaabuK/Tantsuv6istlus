<!doctype html>
<html lang="et">
    <head>
        <title>Tantsuvõistlus</title>
        <meta charset="utf-8" name="viewport" content="width-device-width, initial scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <header>
        <a class="<?=isset($_REQUEST["page"])?"":"active"?>" href="?"><button class="btn"><i class="fa fa-home"></i> Avaleht</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="register"?"active":""?>" href="?page=register"><button class="btn"><i class="fa fa-home"></i> Register</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="edetabel"?"active":""?>" href="?page=edetabel"><button class="btn"><i class="fa fa-home"></i> Edetabel</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="loik1"?"active":""?>" href="?page=loik1"><button class="btn"><i class="fa fa-home"></i> Esimene lõik</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="loik2"?"active":""?>" href="?page=loik2"><button class="btn"><i class="fa fa-home"></i> Teine lõik</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="loik3"?"active":""?>" href="?page=loik3"><button class="btn"><i class="fa fa-home"></i> Kolmas lõik</button></a>
        <a class="<?=($_REQUEST["page"]??"")=="finish"?"active":""?>" href="?page=finish"><button class="btn"><i class="fa fa-home"></i> Finish</button></a>
    </header>
</html>