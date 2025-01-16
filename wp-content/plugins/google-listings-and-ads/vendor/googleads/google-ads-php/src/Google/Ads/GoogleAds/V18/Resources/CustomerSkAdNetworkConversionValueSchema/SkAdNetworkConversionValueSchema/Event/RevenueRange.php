<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/customer_sk_ad_network_conversion_value_schema.proto

namespace Google\Ads\GoogleAds\V18\Resources\CustomerSkAdNetworkConversionValueSchema\SkAdNetworkConversionValueSchema\Event;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Defines a range for revenue values.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.CustomerSkAdNetworkConversionValueSchema.SkAdNetworkConversionValueSchema.Event.RevenueRange</code>
 */
class RevenueRange extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. For revenue ranges, the minimum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double min_event_revenue = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $min_event_revenue = 0.0;
    /**
     * Output only. For revenue ranges, the maximum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double max_event_revenue = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    protected $max_event_revenue = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $min_event_revenue
     *           Output only. For revenue ranges, the minimum value in `currency_code`
     *           for which this conversion value would be updated. A value of 0 will
     *           be treated as unset.
     *     @type float $max_event_revenue
     *           Output only. For revenue ranges, the maximum value in `currency_code`
     *           for which this conversion value would be updated. A value of 0 will
     *           be treated as unset.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\CustomerSkAdNetworkConversionValueSchema::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. For revenue ranges, the minimum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double min_event_revenue = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return float
     */
    public function getMinEventRevenue()
    {
        return $this->min_event_revenue;
    }

    /**
     * Output only. For revenue ranges, the minimum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double min_event_revenue = 3 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param float $var
     * @return $this
     */
    public function setMinEventRevenue($var)
    {
        GPBUtil::checkDouble($var);
        $this->min_event_revenue = $var;

        return $this;
    }

    /**
     * Output only. For revenue ranges, the maximum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double max_event_revenue = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return float
     */
    public function getMaxEventRevenue()
    {
        return $this->max_event_revenue;
    }

    /**
     * Output only. For revenue ranges, the maximum value in `currency_code`
     * for which this conversion value would be updated. A value of 0 will
     * be treated as unset.
     *
     * Generated from protobuf field <code>double max_event_revenue = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param float $var
     * @return $this
     */
    public function setMaxEventRevenue($var)
    {
        GPBUtil::checkDouble($var);
        $this->max_event_revenue = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RevenueRange::class, \Google\Ads\GoogleAds\V18\Resources\CustomerSkAdNetworkConversionValueSchema_SkAdNetworkConversionValueSchema_Event_RevenueRange::class);

