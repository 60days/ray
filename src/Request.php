<?php

namespace Spatie\Timber;

use Spatie\Timber\Payloads\Payload;

class Request
{
    protected string $uuid;

    protected array $payloads;

    protected array $origin = [];

    public function __construct(string $uuid, array $payloads)
    {
        $this->uuid = $uuid;

        $this->payloads = $payloads;
    }

    public function toJson(): string
    {
        $payloads = array_map(function (Payload $payload) {
            return $payload->toArray();
        }, $this->payloads);

        return json_encode([
            'uuid' => $this->uuid,
            'payloads' => $payloads,
            'origin' => $this->origin,
        ]);
    }
}
