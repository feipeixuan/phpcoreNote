<?php

class AnnotationParser
{
    // 获取路由相关的信息
    public static function parseRouteInfo($controllerName, $methodName)
    {
        $reflectClass = new ReflectionClass($controllerName);
        $annotation = $reflectClass->getMethod($methodName)->getDocComment();
        preg_match_all("/@Route\((.*)\)/", $annotation, $matchs);
        $routeContent = $matchs[1][0];
        $routeInfo = array();
        $routeInfo['ac'] = self::parseValue($routeContent, "ac");
        $routeInfo['method'] = self::parseValue($routeContent, "method");
        return $routeInfo;
    }

    // 解析值
    public static function parseValue($content, $keyword)
    {
        //支持引号的内容
        $subStrs = explode(",", $content);
        foreach ($subStrs as $subStr) {
            preg_match_all("/$keyword\s*=\s*\"(\S*)\"\s*/", $subStr, $matchs);
            if (count($matchs >= 0) and count($matchs[1][0]) != 0)
                return $matchs[1][0];
        }
        return false;
    }
}



