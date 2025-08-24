<?php

require_once ("DB.php");

class AddDB
{
    public DB $conn;

    function __construct() {
        $this->conn = new DB();
    }

    function checkAllData(){
        // Забираем данные
        $date = $_POST["date"] ?? date("Y-m-d");
        $nameNews = trim($_POST["nameNews"] ?? '');
        $textAnons = trim($_POST["textAnons"] ?? '');
        $textDetail = trim($_POST["textDetail"] ?? '');
        $author = trim($_POST["author"] ?? '');

        // Обработка anyNews
        $anyNewsRaw = $_POST['anyNews'] ?? null;
        $anyNews = is_array($anyNewsRaw) ? implode(',', $anyNewsRaw) : $anyNewsRaw;


        $errors = [];
        if (empty($author)) $errors[] = "Выбирите автора";
        if (empty($nameNews)) $errors[] = "Введите название новости";
        if (empty($textAnons)) $errors[] = "Введите текст анонса";
        if (empty($textDetail)) $errors[] = "Введите полный текст";
        if (mb_strlen($nameNews) > 50) $errors[] = "Название новости должно быть не длинее 50 символов";
        if (mb_strlen($textAnons) > 70) $errors[] = "Текст анонса не может содержать больше 70 символов";

        if ($errors) {
            foreach ($errors as $err) {
                echo "<p style='color:red;'>$err</p>";
            }
            return; // Прерываем выполнение
        }

        // Запись в БД
        $this->insertDataNews($date, $nameNews, $textAnons, $textDetail, $anyNews, $author);
    }

    function insertDataNews($date, $nameNews, $textAnons, $textDetail, $anyNews, $author): void
    {
        // Запись в БД
        try {
            $this->conn->openConnection();
            $stmt = $this->conn->getConnection()->prepare("
                INSERT INTO data_news (data_news, name_news, text_preview, full_text, any_id, author)
                VALUES (?, ?, ?, ?, ?, ?)
            ");
            if (!$stmt) {
                throw new \Exception("Ошибка подготовки запроса: " . $this->conn->getConnection()->error);
            }

            $stmt->bind_param("ssssss", $date, $nameNews, $textAnons, $textDetail, $anyNews, $author);
            $stmt->execute();

            echo "<p style='color:green;'>Новость успешно добавлена!</p>";

            $stmt->close();
        } catch (\Exception $e) {
            echo "<p style='color:red;'>Ошибка: " . $e->getMessage() . "</p>";
        } finally {
            $this->conn->closeConnection();
        }
    }
}