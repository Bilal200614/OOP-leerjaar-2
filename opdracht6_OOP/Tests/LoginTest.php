<?php
use PHPUnit\Framework\TestCase;
use Opdracht6\Classes\User;
use Opdracht6\Classes\Database;

class LoginTest extends TestCase
{
    protected $user;
    protected $database;

    protected function  setUp(): void
    {
        $this->user = new User();
        $this->database = new Database("localhost", "login", "root", "");
    }


    // Database class tests
    public function testConnect(): void
    {
        $this->assertInstanceOf(Database::class, $this->database->connect());
    }

    public function testExecuteQuery(): void
    {
        $query = "SELECT * FROM users WHERE username = ?";
        $params = array("test_user");

        $statement = $this->database->executeQuery($query, $params);

        $this->assertInstanceOf(PDOStatement::class, $statement);
    }

    // User class tests
    public function testRegisterUser(): void
    {
        $this->user->username = "test_user";
        $this->user->setPassword("test_password");
        
        // Test registration
        $errors = $this->user->registerUser();
        $this->assertEmpty($errors);

        // Delete the test user from the database
        $query = "DELETE FROM users where username = ?";
        $params = array("test_user");

        $this->database->executeQuery($query, $params);
    }

    public function testValidateUser(): void
    {
        $this->user->username = "Yassine";
        $this->user->setPassword("0000");

        // Test validation
        $errors = $this->user->validateUser();
        $this->assertEmpty($errors);
    }

    public function testLoginUser(): void
    {
        $this->user->username = "Yassine";
        $this->user->setPassword("0000");

        // Test Login
        $status = $this->user->loginUser();
        $this->assertTrue($status);
        $this->user->logout();
    }

    public function testIsLoggedIn(): void
    {
        $this->user->username = "Yassine";
        $this->user->setPassword("0000");
        $this->user->loginUser();

        // Test IsLoggedin
        $status = $this->user->isLoggedIn();
        $this->assertTrue($status);
        $this->user->logout();
    }

    public function testGetUser(): void
    {
        // Test GetUser
        $status = $this->user->getUser("Yassine");

        $this->assertTrue($status);
        $this->assertNotEmpty($this->user->username);
    }

    public function testLogoutUser()
    {
        // Test Logout
        $this->user->logout();

        $isDeleted = (session_status() == PHP_SESSION_NONE && empty(session_id()));
        $this->assertTrue($isDeleted);
    }
}
?>
