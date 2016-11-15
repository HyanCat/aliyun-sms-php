<?php

namespace HyanCat\AliyunSMS;

/**
 * Short message class.
 */
class ShortMessage
{
    /**
     * [$signName description]
     * @var string
     */
    protected $signName;

    /**
     * [$template description]
     * @var string
     */
    protected $template;

    /**
     * Template variables' data.
     * @var array|null
     */
    protected $data;

    public function with($data)
    {
        $this->data = $data;
        return $this;
    }

    public function signName($signName)
    {
        $this->signName = $signName;

        return $this;
    }

    public function template($template)
    {
        $this->template = $template;

        return $this;
    }

    public function getParams()
    {
        return json_encode($this->data);
    }

    public function getSignName()
    {
        return $this->signName;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
