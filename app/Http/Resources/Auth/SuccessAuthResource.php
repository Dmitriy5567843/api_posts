<?php
declare(strict_types=1);

namespace App\Http\Resources\Auth;

use App\DTO\SuccessAuthDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SuccessAuthResource.
 *
 * @package App\Http\Resources\Auth
 * @mixin SuccessAuthDTO
 */
final class SuccessAuthResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request = null): array
    {
        return [
            'id' => $this->getId(),
            'token' => $this->getToken(),
        ];
    }
}
