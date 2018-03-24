<?php

namespace app\modules\admin\controllers;

use Yii;
use LogicException;
use yii\web\Controller;


/**
 * Base controller for admin panel
 */
abstract class BaseController extends Controller
{
    const EXCEPTION_FLASH_MESSAGE = 'exceptionFlashMessage';
    const ERROR_FLASH_MESSAGE     = 'errorFlashMessage';
    const WARNING_FLASH_MESSAGE   = 'warningFlashMessage';
    const SUCCESS_FLASH_MESSAGE   = 'successFlashMessage';
    const INFO_FLASH_MESSAGE      = 'infoFlashMessage';

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::EXCEPTION_FLASH_MESSAGE => 'alert-danger',
            self::ERROR_FLASH_MESSAGE     => 'alert-danger',
            self::WARNING_FLASH_MESSAGE   => 'alert-warning',
            self::SUCCESS_FLASH_MESSAGE   => 'alert-success',
            self::INFO_FLASH_MESSAGE      => 'alert-info'
        ];
    }

    /**
     * @param LogicException $e
     * @param null $defaultMessage
     * @param null $defaultReason
     * @return bool
     */
    protected function sendExceptionFlash(LogicException $e, $defaultMessage = null, $defaultReason = null)
    {
        $reason = empty($e->getMessage()) ? $defaultReason : $e->getMessage();

        return $this->sendMessage($defaultMessage, $reason, self::EXCEPTION_FLASH_MESSAGE);
    }

    /**
     * @param null $message
     * @param null $reason
     * @param string $type
     * @return bool
     */
    protected function sendFlashMessage($message = null, $reason = null, $type = self::INFO_FLASH_MESSAGE)
    {
        return $this->sendMessage($message, $reason, $type);
    }

    /**
     * Combine and send message
     * @param null $defaultMessage
     * @param null $defaultReason
     * @param string $type
     * @return bool
     */
    private function sendMessage($defaultMessage = null, $defaultReason = null, $type)
    {
        $message = null;
        if ($defaultMessage !== null || $defaultReason !== null) {
            $message = $defaultMessage ? $defaultMessage : '';

            if ($defaultReason !== null) {
                if ($defaultMessage !== null) {
                    $message .= ': ';
                }
                $message .= $defaultReason . '!';
            }
        }
        if ($message === null) {
            return false;
        }
        Yii::$app->session->setFlash($type, $message);
        return true;
    }

}
