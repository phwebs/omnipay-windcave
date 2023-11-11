<?php

namespace Omnipay\Windcave\Message;

class GooglePayCreateSessionResponse extends CreateSessionResponse
{
    public $linkRel = 'ajaxSubmitGooglePay';

    /**
     * Is the transaction successful?
     * @return boolean True if successful
     */
    public function isSuccessful()
    {
        // get response code
        $code = $this->getHttpResponseCode();

        return ($code === 200 || $code === 201 || $code === 202 && $this->getSessionId() && ($this->getSessionState() === 'init'));
    }

    public function isPending()
    {
        return false;
    }

    public function getSessionId()
    {
        return $this->getData('id');
    }

    public function getSessionState()
    {
        return $this->getData('state');
    }

    public function getPurchaseUrl()
    {   
        $result = null;
        $links = $this->getData('links');
        foreach ($links as $link) {
            if ($link['rel'] === $this->linkRel) {
                $result = $link['href'];
                break;
            }
        }

        return $result;
    }

    public function getPurchaseHttpMethod()
    {   
        $result = null;
        $links = $this->getData('links');
        foreach ($links as $link) {
            if ($link['rel'] === $this->linkRel) {
                $result = $link['method'];
                break;
            }
        }

        return $result;
    }
}
