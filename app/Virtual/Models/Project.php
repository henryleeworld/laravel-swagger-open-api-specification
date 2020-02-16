<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="專案",
 *     description="專案模型",
 *     @OA\Xml(
 *         name="Project"
 *     )
 * )
 */
class Project
{

    /**
     * @OA\Property(
     *     title="編號",
     *     description="編號",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
     *     title="建立時間",
     *     description="建立時間",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="更新時間",
     *     description="更新時間",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="刪除時間",
     *     description="刪除時間",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

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


    /**
     * @OA\Property(
     *     title="作者",
     *     description="專案作者使用者模型"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $author;
}
