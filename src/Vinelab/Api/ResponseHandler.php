<?php namespace Vinelab\Api;

/**
 * @author  Abed Halawi <halawi.abed@gmail.com>
 * @author Mahmoud Zalt <mahmoud@vinelab.com>
 */

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;

class ResponseHandler {

    /**
     * @var Responder instance
     */
    protected $responder;

    public function __construct(Responder $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Format a response into an elegant apimanager response.
     *
     * @param $data
     * @param null $total
     * @param null $page
     * @param int $status
     * @param array $headers
     * @param int $options
     *
     * @internal param $arguments
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond(array $data, $total = null, $page = null, $status = 200, $headers = [], $options = 0)
    {

        $response = [
            'status' => $status,
        ];

        if ( ! is_null($total)) $response['total'] = $total;
        if ( ! is_null($page)) $response['page'] = $page;

        $response['data'] = $data;

        return $this->responder->respond($response, $status, $headers, $options);
    }
}
