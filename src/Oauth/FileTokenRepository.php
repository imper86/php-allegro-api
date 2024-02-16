<?php


namespace Imper86\PhpAllegroApi\Oauth;


use Imper86\PhpAllegroApi\Model\Token;
use Imper86\PhpAllegroApi\Model\TokenInterface;

class FileTokenRepository implements TokenRepositoryInterface
{
    private string $identifier;
    private string $workDir;

    public function __construct(string $identifier, string $workDir)
    {
        $this->identifier = $identifier;
        $this->workDir = $workDir;

        if (!is_dir($this->workDir)) {
            mkdir($this->workDir, 0755, true);
        }
    }

    public function load(): ?TokenInterface
    {
        if (!file_exists($this->getPath())) {
            return null;
        }

        $raw = file_get_contents($this->getPath());
        $json = $raw ? json_decode($raw, true) : null;

        if (!$json) {
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException(json_last_error_msg(), json_last_error());
            }

            throw new \RuntimeException('Couldn\'t fetch token from file');
        }

        return new Token($json);
    }

    public function save(TokenInterface $token): void
    {
        file_put_contents($this->getPath(), json_encode($token->serialize()));
    }

    private function getPath(): string
    {
        return sprintf('%s/%s.json', $this->workDir, $this->identifier);
    }
}
