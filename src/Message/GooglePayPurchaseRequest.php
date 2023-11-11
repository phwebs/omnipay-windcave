<?php

namespace Omnipay\Windcave\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\RequestInterface;

class GooglePayPurchaseRequest extends AbstractRequest implements RequestInterface
{
    public function getData()
    {
        $data = [
            'googlePay' => $this->getGooglePay(),
        ];

        return json_encode($data);
    }

    public function getEndpoint()
    {
        return $this->getParameter('endpoint');
    }

    public function setEndpoint($value)
    {
        $this->setParameter('endpoint', $value);
    }

    public function getContentType()
    {
        return 'multipart/form-data';
    }

    protected function wantsJson()
    {
        return true;
    }

    public function getResponseClass()
    {
        return PurchaseResponse::class;
    }
}
