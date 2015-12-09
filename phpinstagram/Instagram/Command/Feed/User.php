<?php

namespace phpinstagram\Instagram\Command\Feed;

class User extends \phpinstagram\Instagram\Command\AbstractCommand {
    protected $_dependsOn = array(
        'Login'
    );

    protected $_requires = array(
        'pk',
        'time'
    );

    public function exec() {
        $client = $this->_communication->getClient();

        $client->setUri('http://instagr.am/api/v1/feed/user/' . $this->_parameters['pk'] . '/' . $this->_parameters['time']);
        $response = $client->request(\Zend\Http\Client::GET);

        $body = $response->getBody();
        $this->getResponse()->setData(
            self::parseResponse(
                \phpinstagram\Instagram\Client\Marshaller::unmarshall($body)
            )
        );
    }

    /**
     * @param \stdClass $response
     * @return array<\phpinstagram\Instagram\Feed\Entry>
     */
    protected static function parseResponse($response) {
        $entries = array();
        // items, status, num_results
        foreach ($response->items as $entryData) {
            if (!is_object($entryData)) {
                continue;
            }
            $entries[] = \phpinstagram\Instagram\Feed\Entry::factory($entryData);
        }
        return $entries;
    }
}