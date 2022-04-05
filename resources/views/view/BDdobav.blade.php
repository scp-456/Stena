{{-- Добавление сообщения в бд --}}
<?

      if (isset($_POST['edit']) && $_POST['doaction'] == 'edit'){
        //   echo "  редактирование записи ".$_POST['edit'];
      }
      if (isset($_POST['del']) && $_POST['doaction'] == 'del'){
        //   echo "  удаление записи ".$_POST['del'];
          
          $deleted = DB::table('stena')->where('id', '=', $_POST['del'])->where('user_id', '=', Auth::id())->delete();
      }

      if (isset($_POST['theme']) && isset($_POST['text']) && ('add' ==  $_POST['doaction'])){
          // Переменные с формы
          $theme = $_POST['theme'];
          $text = $_POST['text'];
        //   echo "Длина строки =".mb_strlen($text);
          $updated_at = "NOW()"; 

          // Параметры для подключения
          $db_host = "localhost"; 
          $db_user = "postgres"; // Логин БД
          $db_password = "postgres"; // Пароль БД
          $db_base = 'stena'; // Имя БД
          $db_table = "stena"; // Имя Таблицы БД
          

          try {
              // Подключение к базе данных
              $db = new PDO("pgsql:host=$db_host;dbname=$db_base", $db_user, $db_password);
              // Устанавливаем корректную кодировку
              $db->exec("set names utf8");
              // Собираем данные для запроса
              $data = array( 'user_id' => Auth::id(), 'theme' => $theme, 'text' => $text , 'updated_at' => $updated_at); 
              // Подготавливаем SQL-запрос
              $query = $db->prepare("INSERT INTO $db_table (user_id, theme, text, updated_at) values (:user_id, :theme, :text, :updated_at)");
              // Выполняем запрос с данными
              $query->execute($data);

          } catch (PDOException $e) {
              // Если есть ошибка соединения или выполнения запроса, выводим её
              print "Ошибка!: " . $e->getMessage() . "<br/>";
          }

      }

    //echo  "user=".Auth::id();

    ?>