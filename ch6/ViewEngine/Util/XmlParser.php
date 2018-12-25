<?php

// Xml工具类
class XmlParser
{
    private static $labelArray=null;

    public static function convertToJson($content)
    {
        $labelPosition = "prefix";
        preg_match_all("/^<s:(.*)>$/", $content, $matchs);
        if (count($matchs[0]) == 0) {
            preg_match_all("/^</s:(.*)>$/", $content, $matchs);
        } else {
            $labelPosition = "postfix";
        }
        if ($matchs[0] == 0)
            return 0;
        $content = $matchs[1];
        $labelName = explode(" ", $content)[0];
        if (self::$labelArray == null) {
            self::$labelArray = self::getLabels();
        }
        $currentLabel=array();
        // TODO 匹配标签
        foreach (self::$labelArray as $label) {
            if ($label->name == $labelName) {
                $currentLabel['name']=$label->name;
                //前缀
                if ($labelPosition == "prefix") {

                }
                //后缀
                else {

                }
            }
        }
        return;
    }

    // 获取已定义好的标签
    public static function getLabels()
    {
        $labelArray = array();
        $labels = simplexml_load_file(__DIR__ . "/../Lables/basiclabel.xml");
        foreach ($labels as $label) {
            try {
                $label = new Label($label);
                $labelArray[] = $label;
            } catch (Exception $exception) {
                throw XmlException("xml parser fail", $exception);
            }
        }
        return $labelArray;
    }

    // TODO 校验文件内容
    public static function validateLabel($content){

    }
}

require_once __DIR__ . "/../Lables/Label.php";
//print_r(XmlUtil::convertToJson("<s:fssorsss>"));
print_r(XmlParser::getLabels());
//$content = "</s:if>";
//preg_match_all("/^<\/s:(.*)>$/", $content, $matchs);
//print_r($matchs);

