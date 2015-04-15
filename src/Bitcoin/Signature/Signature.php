<?php

namespace BitWasp\Bitcoin\Signature;

use BitWasp\Bitcoin\Serializable;

class Signature extends Serializable implements SignatureInterface
{
    /**
     * @var int
     */
    protected $r;

    /**
     * @var int
     */
    protected $s;

    /**
     * @var int
     */
    protected $sighashType;

    /**
     * @param $r
     * @param $s
     * @param int $sighashType
     */
    public function __construct($r, $s)
    {
        $this->r = $r;
        $this->s = $s;
    }

    /**
     * @inheritdoc
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * @inheritdoc
     */
    public function getS()
    {
        return $this->s;
    }

    /**
     * @return \BitWasp\Buffertools\Buffer
     */
    public function getBuffer()
    {
        $serializer = SignatureFactory::getSerializer();
        $buffer = $serializer->serialize($this);
        return $buffer;
    }
}
