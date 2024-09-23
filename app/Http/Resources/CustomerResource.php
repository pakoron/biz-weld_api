<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $isEditMode = $request->routeIs('*.edit') || $request->isMethod('PUT') || $request->isMethod('PATCH');

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'name' => $this->name,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'phone' => $this->phone,
            // 'zip' => $this->zip,
            'zip' => $isEditMode ? $this->zip : $this->formatZipCode($this->zip),
            'country' => $this->country,
            'prefecture' => $this->prefecture,
            'address' => $this->address,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    private function formatZipCode($zip)
    {
        if (!$zip) return '';
        $zipString = (string) $zip;
        if (strlen($zipString) < 7) return "〒{$zipString}";
        return "〒" . substr($zipString, 0, 3) . '-' . substr($zipString, 3);
    }
}
