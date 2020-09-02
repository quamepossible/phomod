<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Apigee_GoogleCloudApigeeV1OperationConfig extends Google_Collection
{
  protected $collection_key = 'resources';
  public $apiSource;
  protected $attributesType = 'Google_Service_Apigee_GoogleCloudApigeeV1Attribute';
  protected $attributesDataType = 'array';
  public $methods;
  protected $quotaType = 'Google_Service_Apigee_GoogleCloudApigeeV1Quota';
  protected $quotaDataType = '';
  public $resources;

  public function setApiSource($apiSource)
  {
    $this->apiSource = $apiSource;
  }
  public function getApiSource()
  {
    return $this->apiSource;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function setAttributes($attributes)
  {
    $this->attributes = $attributes;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Attribute
   */
  public function getAttributes()
  {
    return $this->attributes;
  }
  public function setMethods($methods)
  {
    $this->methods = $methods;
  }
  public function getMethods()
  {
    return $this->methods;
  }
  /**
   * @param Google_Service_Apigee_GoogleCloudApigeeV1Quota
   */
  public function setQuota(Google_Service_Apigee_GoogleCloudApigeeV1Quota $quota)
  {
    $this->quota = $quota;
  }
  /**
   * @return Google_Service_Apigee_GoogleCloudApigeeV1Quota
   */
  public function getQuota()
  {
    return $this->quota;
  }
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  public function getResources()
  {
    return $this->resources;
  }
}
