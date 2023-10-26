<!doctype html>
<html lang="et">
    <head>
        <title>Tantsuvõistlus</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <header>
        <nav>
            <ul>
                <li><a class="<?=isset($_REQUEST["page"])?"":"active"?>" href="?">Avaleht</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="register"?"active":""?>" href="?page=register">Registreerimine</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="edetabel"?"active":""?>" href="?page=edetabel">Edetabel</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="loik1"?"active":""?>" href="?page=loik1">Esimene lõik</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="loik2"?"active":""?>" href="?page=loik2">Teine lõik</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="loik3"?"active":""?>" href="?page=loik3">Kolmas lõik</a></li>
                <li><a class="<?=($_REQUEST["page"]??"")=="finish"?"active":""?>" href="?page=finish">Finish</a></li>
            </ul>
        </nav>
    </header>
</html>