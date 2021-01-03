<?php

/**
 * Copyright (C) 2018-2021  CzechPMDevs
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace czechpmdevs\buildertools\schematics;

use czechpmdevs\buildertools\editors\blockstorage\BlockList;
use pocketmine\math\Vector3;

/**
 * Class SchematicData
 * @package czechpmdevs\buildertools\schematics
 */
abstract class SchematicData {

    public const MATERIALS_CLASSIC = "Classic";
    public const MATERIALS_BEDROCK = "Pocket";
    public const MATERIALS_ALPHA = "Alpha";

    /** @var bool $isLoaded */
    public bool $isLoaded = false;

    /** @var BlockList|null $blockList */
    protected ?BlockList $blockList;

    /**
     * @var int $width
     *
     * Size along the x axis
     */
    protected int $width;

    /**
     * @var int $height
     *
     * Size along the y axis
     */
    protected int $height;

    /**
     * @var int $length
     *
     * Size along the z axis
     */
    protected int $length;

    /** @var string $materialType */
    protected string $materialType;

    /**
     * SchematicData constructor.
     * @param BlockList $blockList
     * @param Vector3 $axisVector
     * @param string $materialType
     */
    public function __construct(BlockList $blockList, Vector3 $axisVector, string $materialType = SchematicData::MATERIALS_BEDROCK) {
        $this->blockList = $blockList;
        $this->width = $axisVector->getX();
        $this->height = $axisVector->getY();
        $this->length = $axisVector->getZ();
        $this->materialType = $materialType;
    }

    /**
     * @return BlockList|null
     */
    public function getBlockList(): ?BlockList {
        return $this->blockList;
    }

    /**
     * @return int
     */
    public function getXAxis(): int {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getYAxis(): int {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getZAxis(): int {
        return $this->length;
    }

    /**
     * @return Vector3
     */
    public function getAxisVector(): Vector3 {
        return new Vector3($this->getXAxis(), $this->getYAxis(), $this->getZAxis());
    }
}