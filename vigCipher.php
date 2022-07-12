<?php

class VigCipher
{
    public string $alphabet;
    public string $key;

    public function __construct(string $key, string $alphabet)
    {
        $this->key = $key;
        $this->alphabet = $alphabet;
    }

    public function encode(string $text): string
    {
        $encryptedText = "";
        $key = $this->matchKeyToTextLength($this->key, $text);

        for ($i = 0; $i < strlen($text); $i++) {
            $alphabetReorder = $this->reorderAlphabet($this->alphabet, $key[$i]);
            $charPosition = strpos($this->alphabet, $text[$i]);
            if (is_numeric($charPosition)) {
                $keyCode = $alphabetReorder[$charPosition];
            } else {
                $keyCode = $text[$i];
            }

            $encryptedText .= $keyCode;
        }

        return $encryptedText;
    }

    public function decode(string $text): string
    {
        $encryptedText = "";
        $key = $this->matchKeyToTextLength($this->key, $text);

        for ($i = 0; $i < strlen($text); $i++) {
            $alphabetReorder = $this->reorderAlphabet($this->alphabet, $key[$i]);
            $charPosition = strpos($alphabetReorder, $text[$i]);
            if (is_numeric($charPosition)) {
                $keyCode = $this->alphabet[$charPosition];
            } else {
                $keyCode = $text[$i];
            }

            $encryptedText .= $keyCode;
        }

        return $encryptedText;
    }

    private function reorderAlphabet(string $alphabet, string $splitLetter): string
    {
        $beginningChunk = substr($alphabet, 0, strpos($alphabet, $splitLetter));
        $endingChunk = substr($alphabet, strpos($alphabet, $splitLetter));

        return $endingChunk . $beginningChunk;
    }

    private function matchKeyToTextLength(string $key, string $text): string
    {
        return str_pad($key, strlen($text), $key, STR_PAD_RIGHT);
    }
}