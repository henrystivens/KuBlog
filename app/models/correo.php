<?php
/**
 * KBlog - KumbiaPHP Blog
 * PHP version 5
 * LICENSE
 *
 * This source file is subject to the GNU/GPL that is bundled
 * with this package in the file docs/LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to deivinsontejeda@gmail.com so we can send you a copy immediately.
 *
 * @author Deivinson Tejeda <deivinsontejeda@gmail.com>
 */
class Correo {

    //Atributos para el envio de correo (acceso privado)
    private static $_userName = 'no-reply@youdomain.com'; // mail username
    private static $_password = 'pass'; // mail password
    private static $_from = 'fromm';
    private static $_host = 'host';
    private static $_port = '465';
    /**
     * Quien envia el Mail
     * @var $fromName
     */
    //public static $fromName = 'Administrador del Sistema';
    /**
     * Asunto del Mail
     * @var $subject
     */
    //public static $subject = 'Envio de Clave de Acceso';

    /**
     * Genera Claves aleatorias...
     *
     * @param int $length
     */
    public static function generarClave($length)
    {
        $str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
        $cad = '';
        for($i=0;$i<$length;$i++) {
            $cad .= substr($str,rand(0,62),1);
        }
        return $cad;
    }
    /**
     * Envia un correo
     *
     * @param $mail
     * @param $pass
     * @param $body
     */
    public static function send($correo, $person, $body)
    {
        //Cargamos las librería PHPMailer
        Load::lib('phpmailer');
        //instancia de PHPMailer
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = 'ssl'; // sets the prefix to the servier
        $mail->Host = self::$_host; // sets GMAIL as the SMTP server
        $mail->Port = self::$_port; // set the SMTP port for the GMAIL server
        $mail->Username = self::$_userName;
        $mail->Password = self::$_password;
        $mail->AddReplyTo(self::$_from, 'Administrador del Sistema');
        $mail->From = self::$_from;
        $mail->FromName = 'Administrador del Sistema';
        $mail->Subject = 'Envío de clave de acceso';
        $mail->Body = $body;
        $mail->WordWrap = 50; // set word wrap
        $mail->MsgHTML($body);
        $mail->AddAddress($correo, $person);
        $mail->IsHTML(true); // send as HTML

        //Enviamos el correo
        $exito = $mail->Send();
        $intentos = 1;
        //esto se realizara siempre y cuando la variable $exito contenga como valor false
        while ((!$exito) && $intentos < 1){
            sleep(5);
            $exito = $mail->Send();
            $intentos = $intentos +1;
        }
        return $exito;
    }

    /**
     * Envia un correo
     *
     * @param $mail
     * @param $pass
     * @param $body
     */
    public static function sendContact($correo, $person, $body)
    {
        //Cargamos las librería PHPMailer
        Load::lib('phpmailer');
        //instancia de PHPMailer
        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true; // enable SMTP authentication
        $mail->SMTPSecure = 'ssl'; // sets the prefix to the servier
        $mail->Host = self::$_host; // sets GMAIL as the SMTP server
        $mail->Port = self::$_port; // set the SMTP port for the GMAIL server
        $mail->Username = self::$_userName;
        $mail->Password = self::$_password;
        $mail->AddReplyTo($correo, $person);
        $mail->From = $correo;
        $mail->FromName = $person;
        $mail->Subject =  'Contacto desde la web';
        $mail->Body = $body;
        $mail->WordWrap = 50; // set word wrap
        $mail->MsgHTML($body);
        $mail->AddAddress('maxter2024@gmail.com', 'Henry Stivens');
        $mail->IsHTML(true); // send as HTML

        //Enviamos el correo
        $exito = $mail->Send();
        $intentos = 1;
        //esto se realizara siempre y cuando la variable $exito contenga como valor false
        while ((!$exito) && $intentos < 1){
            sleep(5);
            $exito = $mail->Send();
            $intentos = $intentos +1;
        }
        return $exito;
    }
}
