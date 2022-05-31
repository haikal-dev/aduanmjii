<?php extract($data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create A Report Mode</title>
    <link href="<?=$url?>/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=$url?>/dist/css/bootstrap-icons.css" rel="stylesheet" />
    <style>
        .am-middle {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        .btn {
            width: 80%;
            padding: 2em 1em;
        }

        @media only screen and (min-width: 600px) {
            .am-middle {
                position: relative;
                top: 50%;
                transform: translateY(100%);
            }
        }
    </style>
</head>
<body>
  
<div class="container">
    <div class="row am-middle">
        <div class="col-lg-6 col-md-6 text-center mb-2">
            <a class="btn btn-primary" href="<?=$url?>/report/create?mode=whatsapp"><i class="bi bi-whatsapp"></i><br/>Quick Report<br/><small>(via WhatsApp for fast reponse)</small></a>
        </div>
        <div class="col-lg-6 col-md-6 text-center mb-2">
            <a class="btn btn-primary" href="<?=$url?>/report/create?mode=report"><i class="bi bi-files"></i><br/>Progressive Report<br/><small>(via AduanMJII System)</small></a>
        </div>
    </div>
    
</div>

</body>
</html>