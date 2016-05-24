<?php
namespace alphayax\freebox\api\v3\services\Call;
use alphayax\freebox\api\v3\Service;
use alphayax\freebox\api\v3\models;


/**
 * Class System
 * @package alphayax\freebox\api\v3\services\config
 */
class CallEntry extends Service {

    const API_CALL_LOG       = '/api/v3/call/log/';

    /**
     * List every calls
     * @throws \Exception
     * @return models\Call\CallEntry[]
     */
    public function getAll(){
        $rest = $this->getAuthService( self::API_CALL_LOG);
        $rest->GET();

        $CallEntry_xs = $rest->getCurlResponse()['result'];
        $CallEntries  = [];
        foreach( $CallEntry_xs as $CallEntry_x) {
            $CallEntries[] = new models\Call\CallEntry( $CallEntry_x);
        }
        return $CallEntries;
    }

    /**
     * Access a given call entry
     * @param int $CallId
     * @return models\Call\CallEntry[]
     */
    public function getFromId( $CallId){
        $rest = $this->getAuthService( self::API_CALL_LOG . $CallId);
        $rest->GET();

        return new models\Call\CallEntry( $rest->getCurlResponse()['result']);
    }

    /**
     * Delete a call entry
     * @param models\Call\CallEntry $CallEntry
     * @return bool
     */
    public function delete( models\Call\CallEntry $CallEntry){
        return $this->deleteFromId( $CallEntry->getId());
    }

    /**
     * Delete a call entry
     * @param int $CallId
     * @return bool
     */
    public function deleteFromId( $CallId){
        $rest = $this->getAuthService( self::API_CALL_LOG . $CallId);
        $rest->DELETE();

        return (bool) $rest->getCurlResponse()['success'];
    }

    /**
     * Update a given call entry
     * @param models\Call\CallEntry $CallEntry
     * @return models\Call\CallEntry
     */
    public function update( models\Call\CallEntry $CallEntry){
        $rest = $this->getAuthService( self::API_CALL_LOG . $CallEntry->getId());
        $rest->PUT( $CallEntry->toArray());

        return new models\Call\CallEntry( $rest->getCurlResponse()['result']);
    }
    
}