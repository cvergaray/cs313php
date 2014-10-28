if(isset($_POST[‘name’]) 
&& isset($_POST[‘pass’])
&& isset($_POST[‘check’]))
{
 $query = "SELECT *
           FROM     user
           WHERE    user_name = :username";


}
else
{
$success = FALSE;
}