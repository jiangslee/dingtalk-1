<?php
// +------------------------------------------------+
// |http://www.cjango.com                           |
// +------------------------------------------------+
// | 修复BUG不是一朝一夕的事情，等我喝醉了再说吧！  |
// +------------------------------------------------+
// | Author: 小陈叔叔 <Jason.Chen>                  |
// +------------------------------------------------+
namespace cjango\Dingtalk;

use cjango\Dingtalk;

/**
 * 管理微应用
 */
class Microapp extends Dingtalk
{

    /**
     * 创建微应用
     * @return [type] [description]
     */
    public static function create()
    {
        // "appIcon": "@HIdsabikkhjsdsas",
        // "appName": "测试微应用",
        // "appDesc": "测试使用的微应用",
        // "homepageUrl": "http://oa.dingtalk.com/?h5",
        // "pcHomepageUrl": "http://oa.dingtalk.com/?pc",
        // "ompLink": ""
        $params = [

        ];

        $result = Utils::post('microapp/create', $params);

        if (false !== $result) {
            return $result['id'];
        } else {
            return false;
        }
    }

    /**
     * 获取企业设置的微应用可见范围
     * @param [type] $agentId [description]
     */
    public static function scopes($agentId)
    {
        $params = [
            'agentId' => $agentId,
        ];

        $result = Utils::post('microapp/visible_scopes', $params);

        if (false !== $result) {
            unset($result['errcode']);
            unset($result['errmsg']);
            return $result;
        } else {
            return false;
        }
    }

    /**
     * 设置微应用的可见范围
     * @param [type] $agentId [description]
     * @param [type] $params  [description]
     */
    public static function setScopes($agentId, $params)
    {
        $params['agentId'] = $agentId;

        $result = Utils::post('microapp/set_visible_scopes', $params);

        if (false !== $result) {
            return true;
        } else {
            return false;
        }
    }
}
