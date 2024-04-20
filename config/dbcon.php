<?


// Create connection
$conn = new mysqli("localhost", "root", "", "shop13");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

//$db = new conn();


// $conn = conn::getObject();

// class config {
// 	public $host = "localhost";
// 	public $user = "root";
// 	public $password = "";
// 	public $dbname = "shop13";
// }

// class conn extends config {
// 	private $connection;
// 	public static $conn = null;

// 	function __construct() {
// 		$this->open_connection();
// 		//$this->connection->query("SET NAMES 'utf8'");
// 		//echo "OK";
// 	}

// 	private function open_connection() {
// 		$this->connection = $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
// 			if ($conn->connect_error) {
//     		die('Connect Error (' .$conn->connect_errno . ') ' .$conn->connect_error);

// }
// 	}

// 	public static function getObject() {
// 		if(self::$conn) {
// 			$obj = new conn();
// 			self::$conn = $obj->connection;
// 		}
// 		return self::$conn;
// 	}

?>
