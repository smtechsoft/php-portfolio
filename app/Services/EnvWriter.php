<?php

namespace App\Services;

class EnvWriter
{
    protected $envFile;

    public function __construct($envFile)
    {
        $this->envFile = $envFile;
    }

    public function update(array $data)
    {
        if (!file_exists($this->envFile)) {
            $exampleFile = $this->envFile . '.example';
            if (file_exists($exampleFile)) {
                copy($exampleFile, $this->envFile);
            } else {
                return false;
            }
        }

        $envContent = file_get_contents($this->envFile);

        foreach ($data as $key => $value) {
            // Wrap value in quotes if it contains spaces
            if (strpos($value, ' ') !== false) {
                $value = '"' . $value . '"';
            }

            $pattern = "/^{$key}=.*/m";
            if (preg_match($pattern, $envContent)) {
                $envContent = preg_replace($pattern, "{$key}={$value}", $envContent);
            } else {
                $envContent .= "\n{$key}={$value}";
            }
        }

        return file_put_contents($this->envFile, $envContent) !== false;
    }
}
