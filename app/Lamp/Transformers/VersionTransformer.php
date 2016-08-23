<?php
namespace App\Lamp\Transformers;

class VersionTransformer extends Transformer
{
    public function transform($version)
    {
        return [
            'ver' => $version->version,
            'mode' => $version->mode,
            'deprecated' => (boolean) ($version->deprecated),
        ];
    }
}
