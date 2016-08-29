<?php
namespace App\Lamp\Transformers;

class PlayerTransformer extends Transformer
{
    public function transform($player)
    {
        return [
            'ID' => $player->id,
            '名字' => $player->name,
            '用户名' => $player->user,
            'sid' => $player->sid,
            'class' => $player->cls,
            'level' => $player->lvl,
            'vip' => $player->vip,
        ];
    }
}
