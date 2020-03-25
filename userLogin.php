<?php

abstract class Connect {
    abstract function getPage();
}

abstract class AbstractPageDirector {
    abstract function __construct(Connect $builder_in);
    abstract function buildPage();
    abstract function getPage();
}

session_start(); 
$error = '';
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else{
$username = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect("localhost", "root","", "accounts");

$query = "SELECT username, password from accounts where username=? AND password=? LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();
if($stmt->fetch()) 
{
    $_SESSION['login_user'] = $username; // Initializing Session
    echo "Login successful";
   // header("location: project.php"); // Redirecting To Profile Page

}
else{
$error = "user or password is invalid";
    echo"Username does not exist!";
}
mysqli_close($conn);
}
}
class Home {
    private $page = NULL;
    private $page_title = NULL;
    private $page_heading = NULL;
    private $page_text = NULL;
    function __construct() { }
    function showPage() {
      return $this->page;}
    function setTitle($title_in) {
      $this->page_title = $title_in;}
    function setHeading($heading_in) {
      $this->page_heading = $heading_in; }
    function setText($text_in) {
      $this->page_text .= $text_in;  }
    function formatPage() {
       $this->page  = '<html>';
    }
}

class HomeC extends Builder {
    private $page = NULL;
    function __construct() {
      $this->page = new HTMLPage();  }
    function setTitle($title_in) {
      $this->page->setTitle($title_in); }
    function setHeading($heading_in) {
      $this->page->setHeading($heading_in);}
    function setText($text_in) {
      $this->page->setText($text_in);   }
    function formatPage() {
      $this->page->formatPage();   }
    function getPage() {
      return $this->page;   }
}

?>

