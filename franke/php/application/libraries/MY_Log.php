<?php 
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2006, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------
/**
 * MY_Logging Class
 *
 * This library assumes that you have a config item called
 * $config['show_in_log'] = array();
 * you can then create any error level you would like, using the following format
 * $config['show_in_log']= array('DEBUG','ERROR','INFO','SPECIAL','MY_ERROR_GROUP','ETC_GROUP'); 
 * Setting the array to empty will log all error messages. 
 * Deleting this config item entirely will default to the standard
 * error loggin threshold config item. 
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Logging
 * @author        ExpressionEngine Dev Team. Mod by Chris Newton
 */
class MY_Log extends CI_Log {
    /**
     * Constructor
     */
    public function __construct()
    {
        $config =& get_config();

        $this->_log_path = ($config['log_path'] != '') ? $config['log_path'] : APPPATH.'logs/';

        if ( ! is_dir($this->_log_path) OR ! is_really_writable($this->_log_path))
        {
            $this->_enabled = FALSE;
        }

        if (is_numeric($config['log_threshold']))
        {
            $this->_threshold = $config['log_threshold'];
        }

        if ($config['log_date_format'] != '')
        {
            $this->_date_fmt = $config['log_date_format'];
        }
    }

    private function isCommandLineInterface()
    {
        return (php_sapi_name() === 'cli');
    }

    // --------------------------------------------------------------------
    /**
     * Write Log File
     *
     * Generally this function will be called using the global log_message() function
     *
     * @access    public
     * @param    string    the error level
     * @param    string    the error message
     * @param    bool    whether the error is a native PHP error
     * @return    bool
     */        
    public function admin_write_log($level = 'error', $msg, $php_error = FALSE)
    {
        if ($this->_enabled === FALSE)
        {
            return FALSE;
        }

        $level = strtoupper($level);

        if ( ! isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold))
        {
            return FALSE;
        }

        $filepath = $this->_log_path.'admin/admin-franke-log-'.date('Y-m-d').'.txt';
        $message  = '';

        if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
        {
            return FALSE;
        }

        if ($this->isCommandLineInterface()) {
            $message .= 'CMD ';
        }

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
      {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else
      {
          $ip=$_SERVER['REMOTE_ADDR'];
      }
      $message .= $level.' '.(($level == 'INFO') ? ' -' : '-').' '.date($this->_date_fmt). '[IP sorurce: '.$ip.'] from:'.$_SERVER['REQUEST_URI'].' --> '.$msg." [by ".$_SESSION[ADMIN_NAME] ." 權限:". $_SESSION[ADMIN_ACTIVE] ."]\n";

      flock($fp, LOCK_EX);
      fwrite($fp, $message);
      flock($fp, LOCK_UN);
      fclose($fp);

      @chmod($filepath, FILE_WRITE_MODE);
      return TRUE;
  }    

  public function user_write_log($level = 'error', $msg, $php_error = FALSE)
  {
    if ($this->_enabled === FALSE)
    {
        return FALSE;
    }

    $level = strtoupper($level);

    if ( ! isset($this->_levels[$level]) OR ($this->_levels[$level] > $this->_threshold))
    {
        return FALSE;
    }

    $filepath = $this->_log_path.'user/user-franke-log-'.date('Y-m-d').'.txt';
    $message  = '';

    if ( ! $fp = @fopen($filepath, FOPEN_WRITE_CREATE))
    {
        return FALSE;
    }

    if ($this->isCommandLineInterface()) {
        $message .= 'CMD ';
    }

    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
  }
  else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
  {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
  }
  else
  {
      $ip=$_SERVER['REMOTE_ADDR'];
  }
  $message .= $level.' '.(($level == 'INFO') ? ' -' : '-').' '.date($this->_date_fmt). '[IP sorurce: '.$ip.'] from:'.$_SERVER['REQUEST_URI'].' --> '.$msg. (( isset($_SESSION[USER_ID]) ) ? " [by ".$_SESSION[USER_ID]['email']."]":"")."\n";

  flock($fp, LOCK_EX);
  fwrite($fp, $message);
  flock($fp, LOCK_UN);
  fclose($fp);

  @chmod($filepath, FILE_WRITE_MODE);
  return TRUE;
}

}