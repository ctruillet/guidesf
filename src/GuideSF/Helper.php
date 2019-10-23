<?php

namespace GuideSF;

trait Helper
{
    public function anchorEncode(string $id): string
    {
        return urlencode(str_replace(' ', '', $id));
    }
}
