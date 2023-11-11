<?php

namespace Omnipay\Windcave;

use Omnipay\Windcave\Message\GooglePayPurchaseRequest;
use Omnipay\Windcave\Message\GooglePayCreateSessionRequest;
use Omnipay\Windcave\Message\GooglePayGetSessionRequest;

class GooglePayGateway extends Gateway
{

    /**
     * Get gateway display name
     *
     * This can be used by carts to get the display name for each gateway.
     * @return string
     */
    public function getName()
    {
        return 'Windcave Google Pay REST API';
    }

    /**
     * Get gateway short name
     *
     * This name can be used with GatewayFactory as an alias of the gateway class,
     * to create new instances of this gateway.
     * @return string
     */
    public function getShortName()
    {
        return 'WindcaveGooglePay';
    }

    /**
     * Purchase request
     *
     * @param array $parameters
     * @return \Omnipay\Windcave\Message\GooglePayPurchaseRequest|\Omnipay\Common\Message\AbstractRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(GooglePayPurchaseRequest::class, $parameters);
    }

    /**
     * Create sessionId
     *
     * @param array $parameters
     * @return \Omnipay\Windcave\Message\GooglePayCreateSessionRequest|\Omnipay\Common\Message\AbstractRequest
     */
    public function createSession(array $parameters = array())
    {
        return $this->createRequest(GooglePayCreateSessionRequest::class, $parameters);
    }

    /**
     * Create sessionId with a CreditCard
     *
     * @param array $parameters
     * @return \Omnipay\Windcave\Message\GooglePayGetSessionRequest|\Omnipay\Common\Message\AbstractRequest
     */
    public function getSession(array $parameters = array())
    {
        return $this->createRequest(GooglePayGetSessionRequest::class, $parameters);
    }
}
