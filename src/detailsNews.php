<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="scss/style.css">

    <script src="bootstrap.bundle.min.js"></script>

    <title>Details News</title>
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
                <form method="post" action="index.php">
                    <input class="mb-2" style="width: 100%;" type="submit" value="Вернуться на главную страницу"/>
                </form>
            </div>
            <hr style="border-bottom: black;">
        </div>
    </header>
    <section>
        <?php
            require_once ("database/DB.php");

            $db = new DB();
            
            $db->openConnection();

            $id = $_POST["newsId"];



            $anyNews = null;

            $select_product = mysqli_query($db->getConnection(), "SELECT * FROM data_news WHERE id = '$id'")
                or die("Ошибка при получении новостей");
            if(mysqli_num_rows($select_product) > 0) {
                while($row = mysqli_fetch_assoc($select_product)) {
                    ?>
                    <div>
                        <p>Дата: <?php echo $row['data_news'] ?></p>
                        <h2 class="text-center mb-3"><?php echo $row['name_news'] ?></h2>
                        <h3 class="mb-3 text-center">Автор: <?php echo $row['author'] ?></h3>
                        <p class="mb-3" style="font-size: 24px;"><?php echo $row['full_text'] ?></p>
                    </div>
                    <?php
                    $anyNews = explode(",", $row['any_id']);
                };
            } else {
                // Если новость не найдена, перенаправляем на главную
                echo "<script>window.location.href = '/';</script>";
                exit;
            }
            $db->closeConnection();
            ?>
        <h3>Читать также:</h3>
        <div class="row">
            <?php
            $db->openConnection();

            foreach ($anyNews as $anyNew) {
                $anyNew = (int)$anyNew;
                $select_product = mysqli_query($db->getConnection(), "select * from data_news where id = '$anyNew'")
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
            };
            $db->closeConnection();
            ?>
        </div>
    </section>
</body>
</html>