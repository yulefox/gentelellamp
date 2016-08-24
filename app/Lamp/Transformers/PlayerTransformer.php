<?php
namespace App\Lamp\Transformers;

class PlayerTransformer extends Transformer
{
    public function transform($player)
    {
        return [
            'id' => $player->id,
            'name' => $player->name,
            'user' => $player->user,
            'sid' => $player->sid,
            'class' => $player->cls,
            'level' => $player->lvl,
            'vip' => $player->vip,
        ];
    }
}
