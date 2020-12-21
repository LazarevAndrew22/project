<?php


class Form
{


    public function input(array $data): string
    {
        $inputString = "";
        foreach ($data as $key => $val)
        {
            $inputString .= "{$key} = \"{$val}\" ";
        }
        return "<input $inputString>";
    }

    public function password(array $data): string
    {
        $inputPassword = "";
        foreach ($data as $key => $val)
        {
            $inputPassword .= "{$key} = \"{$val}\" ";
        }
        return "<input $inputPassword>";
    }

    public function submit(array $data): string
    {
        $inputSubmit = "";
        foreach ($data as $key => $val)
        {
            $inputSubmit .= "{$key} = \"{$val}\" ";
        }
        return "<input $inputSubmit>";
    }
    public function textarea(array $data): string
    {
        $inputTextarea = "";
        foreach ($data as $key => $val)
        {
            $inputTextarea .= "{$key} = \"{$val}\" ";
            continue;
        }
        return "<textarea $inputTextarea></textarea>";
    }
    public function open(array $data): string
    {
        $actionOpen = "";
        foreach ($data as $key => $val)
        {
            $actionOpen .= "{$key} = \"{$val}\" ";
        }
        return "<form $actionOpen>";
    }

    public function close(): string
    {
        return "</form>";
    }
}