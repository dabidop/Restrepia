<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v18/resources/asset_group_listing_group_filter.proto

namespace Google\Ads\GoogleAds\V18\Resources;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The path defining of dimensions defining a listing group filter.
 *
 * Generated from protobuf message <code>google.ads.googleads.v18.resources.ListingGroupFilterDimensionPath</code>
 */
class ListingGroupFilterDimensionPath extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The complete path of dimensions through the listing group
     * filter hierarchy (excluding the root node) to this listing group filter.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.resources.ListingGroupFilterDimension dimensions = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $dimensions;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<\Google\Ads\GoogleAds\V18\Resources\ListingGroupFilterDimension>|\Google\Protobuf\Internal\RepeatedField $dimensions
     *           Output only. The complete path of dimensions through the listing group
     *           filter hierarchy (excluding the root node) to this listing group filter.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V18\Resources\AssetGroupListingGroupFilter::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The complete path of dimensions through the listing group
     * filter hierarchy (excluding the root node) to this listing group filter.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.resources.ListingGroupFilterDimension dimensions = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Output only. The complete path of dimensions through the listing group
     * filter hierarchy (excluding the root node) to this listing group filter.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v18.resources.ListingGroupFilterDimension dimensions = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Ads\GoogleAds\V18\Resources\ListingGroupFilterDimension>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setDimensions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V18\Resources\ListingGroupFilterDimension::class);
        $this->dimensions = $arr;

        return $this;
    }

}

