<?php

namespace Core\Port\Framework;

interface HttpClientInterface
{
    public function loadFromGuzzleHttp(string $url): string;
    public function loadFromFileGetContents(string $url): string;
}
