function getClientNetInfo() {
    // Get Client IP
    $_CLIENT_IP = $_SERVER['REMOTE_ADDR'];
    $_CLIENT_UA = $_SERVER['HTTP_USER_AGENT'];

    // Filter IPv6
    if (!filter_var($_CLIENT_IP, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        return ["error" => "IPv6 not supported"];
    }

    // Check IP Detect
    if (!$_CLIENT_IP) {
        return ["error" => "IPv4 not detected!"];
    }

    // Sending request to ip-api.com
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/{$_CLIENT_IP}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $data = json_decode(curl_exec($ch));

    // Check for error
    if ($data->status === 'fail') {
        return ["error" => "Failed to retrieve client network information"];
    }

    $ASN_RSL = $data->as;
    $ISP_RSL = $data->isp;
    $CITY_RSL = $data->city;
    $REGION_RSL = $data->regionName;
    $COUNTRY_RSL = $data->country;

    // Return network information
    return [
        "asn" => $ASN_RSL,
        "isp" => $ISP_RSL,
        "city" => $CITY_RSL,
        "region" => $REGION_RSL,
        "country" => $COUNTRY_RSL,
        "ip" => $_CLIENT_IP,
        "user_agent" => $_CLIENT_UA,
    ];
}
