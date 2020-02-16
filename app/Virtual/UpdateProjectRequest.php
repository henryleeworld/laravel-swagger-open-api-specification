<?php

/**
 * @OA\Schema(
 *      title="更新專案請求",
 *      description="更新專案請求內文資料",
 *      type="object",
 *      required={"name"}
 * )
 */

class UpdateProjectRequest
{
    /**
     * @OA\Property(
     *      title="名稱",
     *      description="新專案名稱",
     *      example="一個好的專案"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="內容",
     *      description="新專案內容",
     *      example="這是新專案內容"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="作者編號",
     *      description="新專案作者編號",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $author_id;
}