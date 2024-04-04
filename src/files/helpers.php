<?php

use \DjinnDev\RequestHandler;

function requestGet(): RequestHandler\Get
{
    return RequestHandler\Get::getInstance();
}

function requestPost(): RequestHandler\Post
{
    return RequestHandler\Post::getInstance();
}

function requestJson(): RequestHandler\Json
{
    return RequestHandler\Json::getInstance();
}

function requestXml(): RequestHandler\Xml
{
    return RequestHandler\Xml::getInstance();
}

function requestCookie(): RequestHandler\Cookie
{
    return RequestHandler\Cookie::getInstance();
}

function requestCli(): RequestHandler\Cli
{
    return RequestHandler\Cli::getInstance();
}

function requestUrl(): RequestHandler\Url
{
    return RequestHandler\Url::getInstance();
}