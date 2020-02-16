<?php

namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="專案資源",
 *     description="專案資源",
 *     @OA\Xml(
 *         name="ProjectResource"
 *     )
 * )
 */
class ProjectResource
{
    /**
     * @OA\Property(
     *     title="資料",
     *     description="資料封裝技術"
     * )
     *
     * @var \App\Virtual\Models\Project[]
     */
    private $data;
}
