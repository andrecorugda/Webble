<?php

require_once __DIR__.'/../config/config.php';

class Functions
{

    /**
     * Generate and Returns csrfToken hidden field
     */
    public function csrfToken()
    {
        if (empty($_SESSION['token'])) {
            if (function_exists('mcrypt_create_iv')) {
                $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
            } else {
                $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
            }
        }
        $token = $_SESSION['token'];
        echo '<input type="hidden" name="token" value="'.$token.'">';
    }

    /**
     * Validate csrfToken on POST request
     */
    public function validateToken()
    {
        if (!empty($_POST['token'])) {
            if (!hash_equals($_SESSION['token'], $_POST['token'])) {
                echo '<script> alert("You are trying Cross-site request forgery! Be carefull!"); </script>';
                exit;
            }
        }
    }

    /**
     * Include in __contruct of any app controller
     */
    public function appSecurity()
    {
        if (!isset($_SESSION['logged_user'])) {
            header('Location: '.Functions::transRootConfig('app_config', 'app_login_index'));
        }
    }

    /**
     * Include in __contruct of any login controller
     */
    public function loginSecurity()
    {
        if (isset($_SESSION['logged_user'])) {
            header('Location: '.Functions::transRootConfig('app_config', 'app_index'));
        }
    }

    /**
     * Executes db connection and Returns one data
     * @param $query - Query string
     * @param $datatype - Params datatype Types: s = string, i = integer, d = double,  b = blob
     * @param $params - Query parameters
     */
    public function dbQueryGetOne($query, $datatype = null, $params = null)
    {
        $db_const = $this->transConfig('database_config');
        
        /* Create connection */
        $conn = new mysqli($db_const['host'], $db_const['user'], $db_const['pass'], $db_const['db']);

        /* Check connection */
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $a_params = array();
        
        /* with call_user_func_array, array params must be passed by reference */
        $a_params[] = & $datatype;
        
        $n = strlen($datatype);
        for ($i = 0; $i < $n; $i++) {
            /* with call_user_func_array, array params must be passed by reference */
            $a_params[] = & $params[$i];
        }
        
        /* Prepare statement */
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        if ($datatype&&$params) {
            /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
            call_user_func_array(array($stmt, 'bind_param'), $a_params);
        }
        
        /* Execute statement */
        $stmt->execute();
        
        /* Return Fetch result to array */
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return reset($result[0]);
    }

    /**
     * Executes db connection and $query
     * @param $query - Query string
     * @param $datatype - Params datatype Types: s = string, i = integer, d = double,  b = blob
     * @param $params - Query parameters
     */
    public function dbQueryGet($query, $datatype = null, $params = null)
    {
        $db_const = $this->transConfig('database_config');
        
        /* Create connection */
        $conn = new mysqli(
            $db_const['host'],
            $db_const['user'],
            $db_const['pass'],
            $db_const['db'],
            $db_const['port'],
            $db_const['socket']
        );

        /* Check connection */
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $a_params = array();
        
        /* with call_user_func_array, array params must be passed by reference */
        $a_params[] = & $datatype;
        
        $n = strlen($datatype);
        for ($i = 0; $i < $n; $i++) {
            /* with call_user_func_array, array params must be passed by reference */
            $a_params[] = & $params[$i];
        }
        
        /* Prepare statement */
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        if ($datatype&&$params) {
            /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
            call_user_func_array(array($stmt, 'bind_param'), $a_params);
        }
        
        /* Execute statement */
        $stmt->execute();
        
        /* Return Fetch result to array */
        return $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Executes db connection and $query
     * @param $query - Query string
     * @param $datatype - Params datatype Types: s = string, i = integer, d = double,  b = blob
     * @param $params - Query parameters
     */
    public function dbQueryExec($query, $datatype = null, $params = null)
    {
        $db_const = $this->transConfig('database_config');
        
        /* Create connection */
        $conn = new mysqli(
            $db_const['host'],
            $db_const['user'],
            $db_const['pass'],
            $db_const['db'],
            $db_const['port'],
            $db_const['socket']
        );

        /* Check connection */
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        /* Bind parameters. Types: s = string, i = integer, d = double,  b = blob */
        $a_params = array();
        
        /* with call_user_func_array, array params must be passed by reference */
        $a_params[] = & $datatype;
        
        $n = strlen($datatype);
        for ($i = 0; $i < $n; $i++) {
            /* with call_user_func_array, array params must be passed by reference */
            $a_params[] = & $params[$i];
        }
        
        /* Prepare statement */
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->errno . ' ' . $conn->error, E_USER_ERROR);
        }
        
        if ($datatype&&$params) {
            /* use call_user_func_array, as $stmt->bind_param('s', $param); does not accept params array */
            call_user_func_array(array($stmt, 'bind_param'), $a_params);
        }
        
        /* Execute statement */
        return $stmt->execute();
    }

    /**
     * Retruns config constant
     * @param $trans_name - Name of config
     * @param $trans_value - Array Key
     */
    public function transConfig($trans_name, $trans_value = null)
    {
        $config = new Config;

        if ($trans_value) {
            return $config->$trans_name[$trans_value];
        } else {
            return $config->$trans_name;
        }
    }

    /**
     * Retruns config constant with root
     * @param $trans_name - Name of config
     * @param $trans_value - Array Key
     */
    public function transRootConfig($trans_name, $trans_value = null)
    {
        $config = new Config;
        $root = $config->app_config['app_root'];
        if ($trans_value) {
            return $root.$config->$trans_name[$trans_value];
        } else {
            return $root.$config->$trans_name;
        }
    }

    /**
     * Echo config constant
     * @param $trans_name - Name of config
     * @param $trans_value - Array Key
     *
     */
    public function displayConfig($trans_name, $trans_value = null)
    {
        $config = new Config;

        if ($trans_value) {
            echo $config->$trans_name[$trans_value];
        } else {
            echo $config->$trans_name;
        }
    }

    /**
     * Echo config constant with root
     * @param $trans_name - Name of config
     * @param $trans_value - Array Key
     */
    public function displayRootConfig($trans_name, $trans_value = null)
    {
        $config = new Config;
        $root = $config->app_config['app_root'];
        if ($trans_value) {
            echo $root.$config->$trans_name[$trans_value];
        } else {
            echo $root.$config->$trans_name;
        }
    }

    /**
     *
     */
    public function directTo($location, $extension = null)
    {
        if ($extension) {
            return header('Location: '.$location.$extension);
        } else {
            return header('Location: '.$location);
        }
    }

    
    /**
     * Retruns view
     * @param $view - Name of view file
     * @param $results - Pass data to view
     */
    public function callView($view, $data = null)
    {
        return require __DIR__.'/../public/views/'.$view.'.php';
    }

    /**{
        }
     * Retruns view
     * @param $controller - Name of class
     * @param $method - Name of method inside class
     * @param $requests - Parameters requested must be an array
     */
    public function callController($controller, $method = null, $requests = null)
    {
        require __DIR__.'/../public/controllers/'.$controller.'.php';
        $className = new $controller();

        if (null != $method && null == $requests) {
            return $className->$method();
        } elseif (null != $method && null != $requests) {
            return $className->$method($requests);
        } else {
            return $className;
        }
    }

    /**
     * Retruns assets path
     * @param $file - Route of file
     */
    public function assets($file)
    {
        $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
        return $link.''.Functions::transConfig('app_config', 'app_root').'/app/assets/'.$file;
    }

    /**
     * Includes view
     * @param $file - Route of file
     */
    public function includeView($file)
    {
        require __DIR__.'/../public/views/'.$file;
    }

    /**
     * Includes view
     * @param $mailto - recepient address
     * @param $mailto_name - recepient name
     * @param $subject - subject of mail
     * @param $body - content of mail
     * @param $alt_body - alternative content
     */
    public function sendEmail($mailto, $mailto_name, $subject = null, $body = null, $alt_body = null){

        // Load Composer's autoloader
        require __DIR__.'/../lib/vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = Functions::transConfig('mail_config','mail_smtp_debug');
            $mail->IsSMTP();
            $mail->SMTPAuth = Functions::transConfig('mail_config', 'mail_smtp_auth'); 
            $mail->SMTPSecure = Functions::transConfig('mail_config', 'mail_smtp_secure'); 
            $mail->Host = Functions::transConfig('mail_config', 'mail_host');
            $mail->Port = Functions::transConfig('mail_config', 'mail_port');
            $mail->Username = Functions::transConfig('mail_config', 'mail_username');
            $mail->Password = Functions::transConfig('mail_config', 'mail_password');

            $email_from = Functions::transConfig('mail_config', 'mail_name_from');
            $name_from = Functions::transConfig('mail_config', 'mail_from');

            //Typical mail data
            $mail->addAddress($mailto, $mailto_name);
            $mail->setFrom($email_from, $name_from);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->AltBody = $alt_body;

            $mail->send();
        } catch (\PHPMailer\PHPMailer\Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    }
}
