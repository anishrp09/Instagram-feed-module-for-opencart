<?php
class ControllerExtensionModuleInstagram extends Controller {
    public function index($setting) {
            static $module = 0;
            $this->load->language('extension/module/instagram');
            $data['heading_title'] = $this->language->get('heading_title');
            $username=$setting['userid'];
            $instagramUrl='https://www.instagram.com/'.$username.'/media/';
            $instaResult=$this->get_instagram_details($instagramUrl);
            if($setting['limit']){
            $data['limit'] =$setting['limit'];
            }else{$data['limit']=8;}
            $data['instagram'] = json_decode($instaResult); 
            $data['module'] = $module++;
            return $this->load->view('extension/module/instagram', $data);
		
    }
    function get_instagram_details($urls) { 
        $ch = curl_init($urls);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($status != 200) { echo "Return code is {$status} \n"
                .curl_error($ch); }
        else { return $response;}
        curl_close($ch);
    }
}