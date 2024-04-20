<?

if(!isset($_SESSION['user_id']))
{
    header('Location: index.php');
    echo 'login  to continuet';
}
?>