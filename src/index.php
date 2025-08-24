<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="scss/style.css">

    <script src="bootstrap.bundle.min.js"></script>


    <title>News</title>
</head>
<body>
    <header>
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-4">
                <p class="my-auto"><?php echo date('l, M. Y'); ?></p>
            </div>
            <div class="col-4">
                <h1 class="text-center"><span style="color: rgba(154,195,255,0.7)">N</span>ews</h1>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <form method="post" action="addNews.php">
                    <input class="mb-2" style="width: 100%;" type="submit" value="Добавить новость"/>
                </form>
            </div>
            <hr style="border-bottom: black;">
        </div>
    </header>
    <section>
        <h2 class="mb-4 text-center">Последние новости</h2>
        <div class="row">
            <?php

            require_once("database/DB.php");

                $db = new DB();

                $db->openConnection();

                $select_product = mysqli_query($db->getConnection(), "select * from data_news order by id desc")
                    or die("Ошибка при получении новостей");
                if(mysqli_num_rows($select_product) > 0){
                    while($row = mysqli_fetch_assoc($select_product)){
            ?>
            <div class="col-4">
                <form method="post" class="" action="detailsNews.php">
                        <div class="card card-b bg-input bg-my-card mb-4" style="width: 100%;">
                            <div class="card-body">
                                <input type="hidden" name="newsId" value="<?php echo $row["id"]; ?>">
                                <input type="date" name="dateNews" class="card-header-tabs text-start mb-1 input-control" style="margin-left: 0;" value="<?php echo $row['data_news'] ?>" readonly>
                                <textarea name="nameNewsCard" class="card-title input-control" style="color: white; height: 50px; overflow: hidden" readonly ><?php echo $row['name_news'] ?></textarea>
                                <textarea name="preview" class="card-text input-control" style="color: white; height: 80px; overflow: hidden" readonly><?php echo $row['text_preview'] ?></textarea>
                                <input name="fullText" type="submit" class="btn bg-dark input-control" style="color: white;" value="Прочитать полностью">
                            </div>
                        </div>
                </form>
            </div>
                        <?php
                    };
                };
            ?>
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST["fullText"])){

    }
?>

