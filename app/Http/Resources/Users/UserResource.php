<?php
declare(strict_types=1);

namespace App\Http\Resources\Users;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource.
 *
 * @package App\Http\Resources\Users
 * @mixin User
 */
final class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request = null): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'is_banned'=> $this->is_baned,
            'is_admin'=> $this->is_admin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
