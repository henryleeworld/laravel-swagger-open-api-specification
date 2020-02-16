<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="使用者",
 *     description="使用者模型",
 * )
 */
class User
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
     *     title="名稱",
     *     description="名稱",
     * )
     *
     * @var string
     */
    private $name;
    /**
     * @OA\Property(
     *     title="電子郵件",
     *     description="電子郵件",
     *     format="email",
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="電子郵件驗證時間",
     *     description="電子郵件驗證時間",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $email_verified_at;

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
}