<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Apicall extends CI_Controller
{

    public function weather_api()
    {
        $url = 'http://api.weatherapi.com/v1/current.json?key=6d641ac9e21b4590b7a140211232001&q=Lagos&aqi=no';
        $data = json_decode(file_get_contents($url), true);
        // foreach ($data as $key => $val) {
        //     $ap[] = $val['current'];
        // }
        echo json_encode($data['current']);
    }
    public function reddit_api()
    {
        $url = 'https://www.reddit.com/r/programming.json';
        $data = json_decode(file_get_contents($url), true);
        // foreach ($data as $key => $val) {
        //     $ap[] = $val['current'];
        // }
        foreach ($data['data']['children'] as $child) {
            $res[] = $child;
        }
        return $res;
    }
    public function utc_converter()
    {
        $current_utc = new DateTime();

        $london = $current_utc->setTimezone(new DateTimeZone('Europe/London'))->format('H:i:s');
        $EST = $current_utc->setTimezone(new DateTimeZone('EST'))->format('H:i:s');
        $Nigeria = $current_utc->setTimezone(new DateTimeZone('Africa/Lagos'))->format('H:i:s');
        $Pakistan = $current_utc->setTimezone(new DateTimeZone('Asia/Karachi'))->format('H:i:s');

        echo json_encode(['london' => $london, 'est' => $EST, 'nigeria' => $Nigeria, 'pakistan' => $Pakistan]);
    }
    public function analytics()
    {
        include __DIR__ . '../../models/Task_model.php';

        $model = new Task_model;
        $result = $model->insert_analytics();

        // $result = $this->load->model('task_model');
        // $result = $result->load->method('insert_analytics');
        echo json_encode($result);
    }
    public function file()
    {
        include __DIR__ . '../../models/Task_model.php';
        $model = new Task_model;

        // $res = $this->load->model('task_model');
        $result = $model->insert_file();
        echo json_encode($result);
    }
    public function count()
    {
        include __DIR__ . '../../models/Task_model.php';
        $model = new Task_model;

        // $res = $this->load->model('task_model');
        $result = $model->count_analytics();
        return $result;
    }
}
