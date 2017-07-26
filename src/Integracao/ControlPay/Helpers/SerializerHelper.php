<?php

namespace Integracao\ControlPay\Helpers;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 * Class SerializerHelper
 * @package App\Helpers
 */
class SerializerHelper
{
    /**
     * @var \JMS\Serializer\Serializer
     */
    private static $instance;

    /**
     * @return Serializer
     */
    private static function getInstance()
    {
        if(empty(self::$instance['jms.serializer']))
        {
            self::$instance['jms.serializer'] = SerializerBuilder::create()
                ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
                ->build();
        }

        if(empty(self::$instance['symfony.serializer']))
        {
            self::$instance['symfony.serializer'] = new Serializer([new ObjectNormalizer()],
                [
                    'xml' => new XmlEncoder(),
                    'json' => new JsonEncoder()
                ]
            );
        }

        return self::$instance;
    }

    /**
     * Deserializa json em objeto
     *
     * @param $data
     * @param $class
     * @return object
     */
    public static function deserialize($data, $class, $format = 'json')
    {
        return self::getInstance()['symfony.serializer']->deserialize($data, $class, $format);
    }

    /**
     * Deserializa json em objeto
     *
     * @param $data
     * @param $class
     * @return object
     */
    public static function denormalize($data, $class)
    {
        return self::getInstance()['symfony.serializer']->denormalize($data, $class);
    }

    /**
     * @param $data
     * @param $format
     * @return string|\Symfony\Component\Serializer\Encoder\scalar
     */
    public static function serialize($data, $format = 'json')
    {
        return self::getInstance()['jms.serializer']->serialize($data, $format);
    }

    /**
     * @param $object
     * @return mixed
     */
    public static function toArray($object)
    {
        return self::getInstance()['jms.serializer']->toArray($object);
    }

}