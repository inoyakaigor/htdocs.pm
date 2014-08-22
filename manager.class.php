<?PHP

class pasman {
// данные (свойства):
  public $count;
  public $pasmandb;
  //на всякий случай если понадобится поторный доступ, чтобы не делать ещё один вызов функции
  public $dataproj = array();
  public $projects = array();

// функция-конструктор. вызывается автоматически.
  public function __construct(){
    //Делаем доступ к глобальному объекту
     global $pasmandb;
     $this->pasmandb = $pasmandb;
    //делаем запрос во время инициализации класса
     //$this->tweets = $this->twdb->query("select * from tweets")->fetchAll(PDO::FETCH_ASSOC);
  }

// методы:
  function add($name, $type = "", $URL = "", $login = "", $password = "", $description = "") {
    // Возвращает TRUE если всё хорошо иначе возращает FALSE 
    // STH означает "Statement Handle" 
     // print_r("INSERT INTO passman ('name', 'type', 'URL', 'login', 'password', 'description') values ('$name', '$type', '$URL', '$login', '$password', '$description')");

      $STH = $this->pasmandb->prepare("INSERT INTO passman (name, type, URL, login, password, description) values ('$name', '$type', '$URL', '$login', '$password', '$description')");  
      return $STH->execute();
  }

  function getCountofAll() {
    $cnt = $this->pasmandb->query("select `id` from passman")->rowCount();
    return $cnt;
  }
  
  function getPassFromProj($proj) {
    $query = "SELECT * FROM passman p INNER JOIN (SELECT type as type1, MAX(Date) as TopDate FROM passman WHERE name = '{$proj}' GROUP BY type) AS EachItem ON EachItem.TopDate = p.date AND EachItem.type1 = p.type and p.name = '{$proj}' ";
    return $this->dataproj = $this->pasmandb->query($query)->fetchAll(PDO::FETCH_ASSOC);
    //return true;
  }

  function getProjects() {
    $query = "select distinct name from passman";
    return $this->projects = $this->pasmandb->query($query)->fetchAll(PDO::FETCH_ASSOC);
  }
/*
  function getDate($numb) {
    return date('G:i:s', strtotime($this->tweets[$numb]["createdat"]));
  }

  function getLogin($numb) {
    return $this->tweets[$numb]["screenname"];    
  }

  function getProfileImg($numb) {
    return $this->tweets[$numb]["imageurl"];    
  }

  function getTwId($numb) {
    // Должна использоваться вместе с getLogin для формироания ссылок вида /user/status/123456789
    return $this->tweets[$numb]["id"];    
  }

  function getName($numb) {
    return $this->tweets[$numb]["name"];    
  }

  function getImgs($numb) {
    return $this->tweets[$numb]["pict"];    
  }

  function getText($numb) {
    return $this->tweets[$numb]["text"];    
  }

  function formatText($text){
    return $frmt;
  }*/
}