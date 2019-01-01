<?php

interface Render
{
    public function generateContent($label);
}

class BranchRender implements Render
{
    public function generateContent($label)
    {
        // TODO: Implement generateContent() method.
    }
}

class LoopRender implements Render
{
    public function generateContent($label)
    {
        if ($label['position'] == "postfix") {
            return " } ";
        }
        $prefix = $label['name'] . "(";
        $postfix = "){";
        // 仅支持for while foreach
        if ($label['name'] == "while" or $label == "for") {
            $content = $label['expression'];
        }
        if ($label['name'] == "foreach") {
            if(!isset($label['key'])){
                $content=$label['values']." as ".$label['value'];
            }else{
                $content=$label['values']." as ".$label['key']." => ".$label['value'];
            }
        }
        return $prefix.$content.$postfix;
    }
}

class PrintRender implements Render
{
    public function generateContent($label)
    {
        return "echo " . $label['value'];
    }
}

