<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Meu Campeonato</title>
        <link href="./css/styles.css" rel="stylesheet">
        <link href="./js/bootstrap.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="column">
                <div class="box-card row">
                    <div class="card-info campeao column" style="width: 90%">
                        <h1><?php echo e($campeonato->campeonato); ?></h1>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
<script src={{ asset('./js/bootstrap-icons.svg') }} rel="styleshet"></script>
<script src={{ asset('./js/jquery.js') }} rel="styleshet"></script>
<script src={{ asset('./js/bootstrap.js') }} rel="styleshet"></script> 
<script type="text/javascript">
</script>
</html>