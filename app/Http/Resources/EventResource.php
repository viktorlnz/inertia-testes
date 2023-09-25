<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use function PHPUnit\Framework\isEmpty;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $startsAt = Carbon::parse($this->starts_at);
        $startsAtDate = $startsAt->format('d/m/Y');
        $startsAtTime = $startsAt->format('H:i:s');

        $endsAt = Carbon::createFromFormat('Y-m-d H:i:s', $startsAt)->addMinutes($this->duration_time);
        $expired = $endsAt->isPast();

        $endsAtDate = $endsAt->format('d/m/Y');
        $endsAtTime = $endsAt->format('H:i:s');

        return [
            'id' => $this->id,
            'name'=> $this->name,
            'description' => $this->description,
            'shortDescription' => substr($this->description, 0, 100) . '...',
            'startsAtDate' => $startsAtDate,
            'startsAtTime' => $startsAtTime,
            'durationTime' => $this->duration_time,
            'endsAtDate' => $endsAtDate,
            'endsAtTime' => $endsAtTime,
            'expired' => $expired,
            'image' => isset($this->image) ? [
                'path' => $this->image->path
            ] : null,
            'address' => isset($this->address) ? [
                'address'=> $this->address->address,
                'neighborhood'=> $this->address->neighborhood,
                'city'=> $this->address->city,
                'uf'=> $this->address->uf,
                'number'=> $this->address->number,
                'zipCode'=> substr($this->address->zip_code, 0, 5) . '-' . substr($this->address->zip_code, 5, 3) 
            ] : null
        ];
    }
}
