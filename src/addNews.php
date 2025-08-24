<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="scss/style.css">

    <script src="bootstrap.bundle.min.js"></script>


    <title>News</title>
</head>
<body>
    <?php
        if(isset($_POST["done"])) {
            require_once ("database/AddDB.php");

            $db = new AddDB();
            $db->checkAllData();
        }
    ?>
    <form action="index.php">
        <input class="ms-1 mb-3 bg-input text-center" type="submit" value="Перейти на главную страницу">
    </form>
    <form method="post" action="">
        <ul class="list-unstyled">
<!--            Текущая дата -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Текущая дата</p>
                <input class="ms-1 mb-3 bg-input text-center sub-add-news" type="date" value="<?php echo date("Y-m-d"); ?>" name="date" readonly>
            </li>
<!--            Автор -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Автор</p>
                <select name="author" class="form-select ms-1 mb-3 bg-input sub-add-news">
                    <option value=""></option>
                    <?php
                        require_once ("database/DB.php");
                        
                        $con = (new DB());
                        $con->openConnection();
                        
                        $selectAuthor = mysqli_query($con->getConnection(), "select * from autor");
                        if (mysqli_num_rows($selectAuthor) > 0) {
                            while ($row = mysqli_fetch_assoc($selectAuthor)) {

                    ?>
                                <option style="color: white;" value="<?php echo trim($row['name']) ?>"><?php echo $row['name'] ?></option>
                    <?php
                            };
                        };
                    ?>
                </select>
            </li>
<!--            Название новости -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Название новости</p>
                <input class="ms-1 mb-3 bg-input sub-add-news" type="text" name="nameNews" value="<?php if (!empty($_POST['nameNews'])) {echo $_POST["nameNews"];} ?>">
            </li>
<!--            Текст анонса -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Текст анонса</p>
                <input class="ms-1 mb-3 bg-input sub-add-news" type="text" name="textAnons" value="<?php if (!empty($_POST['textAnons'])) {echo $_POST["textAnons"];} ?>">
            </li>
<!--            Полный текст -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Полный текст</p>
                <textarea rows="10" class="ms-1 mb-3 bg-input sub-add-news" name="textDetail"><?php if (!empty($_POST['textDetail'])) {echo $_POST["textDetail"];} ?></textarea>
            </li>
<!--            Похожие новости -->
            <li class="d-flex align-items-center flex-wrap">
                <p style="width: 24%;">Похожие новости</p>
                <select style="overflow: scroll; overflow-style: marquee-block" name="anyNews[]" class="form-select ms-1 mb-3 bg-input sub-add-news" multiple size="5">
                    <option value=""></option>
                    <?php
                        require_once ("database/DB.php");

                        $con = (new DB());
                        $con->openConnection();

                        $selectAuthor = mysqli_query($con->getConnection(), "select * from data_news");
                        if (mysqli_num_rows($selectAuthor) > 0) {
                            while ($row = mysqli_fetch_assoc($selectAuthor)) {
                    ?>
                                <option style="color: white;" value="<?php echo trim($row['id']) ?>"><?php echo $row['id'] . " Название записи: " . $row["name_news"] ?></option>
                    <?php
                            };
                        };
                    ?>
                </select>
            </li>
        </ul>
        <div class="row">
            <div class="col"></div>
            <input class="col" type="submit" value="Опубликовать" name="done">
            <div class="col"></div>
        </div>
    </form>
</body>
</html>