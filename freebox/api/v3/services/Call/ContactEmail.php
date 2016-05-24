<?php
namespace alphayax\freebox\api\v3\services\Call;
use alphayax\freebox\api\v3\Service;
use alphayax\freebox\api\v3\models;


/**
 * Class ContactEmail
 * @package alphayax\freebox\api\v3\services\Call
 */
class ContactEmail extends Service {

    const API_EMAIL = '/api/v3/email/';

    /**
     * @param int $ContactEmailId
     * @return models\Call\ContactEmail
     */
    public function getFromId( $ContactEmailId){
        $rest = $this->getAuthService( self::API_EMAIL . $ContactEmailId);
        $rest->GET();

        return new models\Call\ContactEmail( $rest->getCurlResponse()['result']);
    }

    /**
     * @param models\Call\ContactEmail  $ContactEmail
     * @return models\Call\ContactEmail
     */
    public function create( models\Call\ContactEmail $ContactEmail){
        $rest = $this->getAuthService( self::API_EMAIL);
        $rest->POST( $ContactEmail->toArray());

        return new models\Call\ContactEmail( $rest->getCurlResponse()['result']);
    }

    /**
     * @param models\Call\ContactEmail  $ContactEmail
     * @return bool
     */
    public function delete( models\Call\ContactEmail $ContactEmail){
        return $this->deleteFromId( $ContactEmail->getId());
    }

    /**
     * @param int $ContactEmailId
     * @return bool
     */
    public function deleteFromId( $ContactEmailId){
        $rest = $this->getAuthService( self::API_EMAIL . $ContactEmailId);
        $rest->DELETE();

        return (bool) $rest->getCurlResponse()['success'];
    }

    /**
     * @param models\Call\ContactEmail  $ContactEmail
     * @return models\Call\ContactEmail
     */
    public function update( models\Call\ContactEmail $ContactEmail){
        $rest = $this->getAuthService( self::API_EMAIL . $ContactEmail->getId());
        $rest->PUT( $ContactEmail->toArray());

        return new models\Call\ContactEmail( $rest->getCurlResponse()['result']);
    }

}