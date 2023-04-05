<?php

namespace App\Modules\Builder\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Modules\Builder\Models\Builder;
use App\Mail\SetupMail;

use Illuminate\Support\Facades\Mail;

use Response;
use Validator;
use Auth;
use DB;
use Hash;

class BuilderAjaxController extends Controller
{

    protected $database_prefix = 'mallline_customer_';
    protected $maindomain = 'mallline.io';
	
    public function __construct() {
        $maindomain = $this->maindomain;
    }
	
	public function ajaxBuilderParameterApi(Request $Request) {
		$Builder = new Builder();
		$BuilderData = $Builder::where('host', $Request->host)->first();
		$Builder::find($BuilderData->id)->update(['data' => json_encode($Request->all(), JSON_UNESCAPED_UNICODE)]);
		return Response::json(['status' => true, 'inner_id' => $BuilderData->id]);
	}

    public function checkSubdomainsOnServer() {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://mallline.io:2083/execute/DomainInfo/list_domains');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel mallline:QG16BMI0Y0Z9UVXHTBSXO2EKQE3W3DRC';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $result = json_decode($result);
        return $result;
    }

    public function ajaxCheckSubdomain(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'subdomain.required' => 'გთხოვთ შეიყვანოთ ქვედომეინი!',
                'subdomain.regex' => 'ქვედომეინი უნდა შედგებოდეს მხოლოდ ლათინური ასეოებისაგან და ციფრებისაგან!',
            );
            $validator = Validator::make($Request->all(), [
                'subdomain' => 'required|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()['subdomain']], 200);
            } else {

                $Builder = new Builder();
                $BuilderCheck = $Builder::where('subdomain', trim($Request->subdomain))->where('deleted_at_int', '!=', 0)->first();

                if($BuilderCheck) {
                    return Response::json(['status' => true, 'errors' => true, 'message' => 'აღნიღნული დომეინი დაკავებულია']);
                } else {

                    if(in_array($Request->subdomain.'.'.$this->maindomain, $this->checkSubdomainsOnServer()->data->sub_domains)) {
                        return Response::json(['status' => true, 'errors' => true, 'message' => 'აღნიღნული დომეინი დაკავებულია']);
                    } else {
                        return Response::json(['status' => true, 'errors' => false, 'message' => 'აღნიღნული დომეინი თავისუფალია']);
                    }
                }
            }
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
        
    }

    public function generateDatabaseData(Request $Request) {
        // GENERATE DATABASE
        $database_name = substr(md5(rand(11111111, 99999999)), 0, 8);

        $database_password = rand();
        $database_password = substr(md5($database_password), 0, 15);
		
        $ch = curl_init();
		
        curl_setopt($ch, CURLOPT_URL, 'https://mallline.io:2083/execute/Mysql/create_database?name='.$this->database_prefix.$database_name.'_'.trim($Request->subdomain));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel mallline:QG16BMI0Y0Z9UVXHTBSXO2EKQE3W3DRC';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $database_response = curl_exec($ch);
        $database_response = json_decode($database_response);
        if($database_response->status == 1) {
			// GENERATE DATABASE USER PRIVILAGES
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://mallline.io:2083/execute/Mysql/set_privileges_on_database?user=mallline_customer&database='.$this->database_prefix.$database_name.'_'.trim($Request->subdomain).'&privileges=ALL%20PRIVILEGES');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


			$headers = array();
			$headers[] = 'Authorization: cpanel mallline:QG16BMI0Y0Z9UVXHTBSXO2EKQE3W3DRC';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$privileges_response = curl_exec($ch);
			$privileges_response = json_decode($privileges_response);
			
			if($privileges_response->status == 1) {
				
				$database_array = [
					'db_name' => $this->database_prefix.$database_name.'_'.trim($Request->subdomain),
					'db_user' => 'mallline_customer',
					'db_pass' => 'C7SJGd.PNI13',
				];

				try {
					$sql = '/home/mallline/public_html/default_database.sql';
					$database_connect = mysqli_connect('127.0.0.1', 'mallline_customer', $database_array['db_pass'], $database_array['db_name']) or die("Unable to Connect");
					$database_connect->set_charset("utf8");
					$tempLine = '';
					$lines = file($sql);
					foreach ($lines as $line) {
							if (substr($line, 0, 2) == '--' || $line == '')
								continue;
								$tempLine .= $line;
						if (substr(trim($line), -1, 1) == ';')  {
							mysqli_query($database_connect, $tempLine) or print("Error in " . $tempLine .":". mysqli_error());
							$tempLine = '';
						}
					}
				} catch (Exception $e) {
					echo 'Caught exception: ',  $e->getMessage(), "\n";
				}
			}

			$Builder = new Builder();
			$Builder->subdomain = trim($Request->subdomain);
			$Builder->host = trim($Request->subdomain.'.'.$this->maindomain);
			$Builder->user_id = Auth::user()->id;
			$Builder->database_data = json_encode($database_array);
			$Builder->save();
			
			$env = '
				APP_NAME=Laravel
				APP_ENV=local
				APP_KEY=base64:R++3TT7KCTdkJduy21uu+2gjmMjlK6hJHkmpXxh4TUk=
				APP_DEBUG=true
				APP_URL=https://'.trim($Request->subdomain.'.'.$this->maindomain).'

				LOG_CHANNEL=stack
				LOG_DEPRECATIONS_CHANNEL=null
				LOG_LEVEL=debug

				DB_CONNECTION=mysql
				DB_HOST=127.0.0.1
				DB_PORT=3306
				DB_DATABASE='.$database_array['db_name'].'
				DB_USERNAME='.$database_array['db_user'].'
				DB_PASSWORD='.$database_array['db_pass'].'

				BROADCAST_DRIVER=log
				CACHE_DRIVER=file
				FILESYSTEM_DRIVER=local
				QUEUE_CONNECTION=sync
				SESSION_DRIVER=file
				SESSION_LIFETIME=120

				MEMCACHED_HOST=127.0.0.1

				REDIS_HOST=127.0.0.1
				REDIS_PASSWORD=null
				REDIS_PORT=6379

				MAIL_MAILER=smtp
				MAIL_HOST=mailhog
				MAIL_PORT=1025
				MAIL_USERNAME=null
				MAIL_PASSWORD=null
				MAIL_ENCRYPTION=null
				MAIL_FROM_ADDRESS=null
				MAIL_FROM_NAME="${APP_NAME}"

				AWS_ACCESS_KEY_ID=
				AWS_SECRET_ACCESS_KEY=
				AWS_DEFAULT_REGION=us-east-1
				AWS_BUCKET=
				AWS_USE_PATH_STYLE_ENDPOINT=false

				PUSHER_APP_ID=
				PUSHER_APP_KEY=
				PUSHER_APP_SECRET=
				PUSHER_APP_CLUSTER=mt1

				MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
				MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
			';
			
			$htaccess = '
				RewriteEngine on
				RewriteCond %{REQUEST_URI} !^repository
				RewriteRule ^(.*)$ repository/$1 [L]

				# php -- BEGIN cPanel-generated handler, do not edit
				# Set the “ea-php81” package as the default “PHP” programming language.
				<IfModule mime_module>
				  AddHandler application/x-httpd-ea-php81 .php .php8 .phtml
				</IfModule>
				# php -- END cPanel-generated handler, do not edit
			';
			
			$htaccess_file = fopen("/home/mallline/".$Request->subdomain."/.htaccess", 'w');
			fwrite($htaccess_file, $htaccess);
			fclose($htaccess_file);
			
			
			$env_file = fopen("/home/mallline/".$Request->subdomain."/repository/.env", 'w');
			fwrite($env_file, $env);
			fclose($env_file);
        } else {
            return Response::json(['status' => false, 'errors' => true, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან']);
        }
    }

    public function getDataFromGit(Request $Request) {
		
		mkdir("/home/mallline/".$Request->subdomain."/repository", 0777);
		
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://mallline.io:2083/execute/VersionControl/create?type=git&name='.$Request->subdomain.'&repository_root=%2fhome%2fmallline%2f'.$Request->subdomain.'%2frepository&source_repository={"remote_name":"main","url":"https://github.com/tob1tbs/MallineNewRep.git"}');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Authorization: cpanel mallline:QG16BMI0Y0Z9UVXHTBSXO2EKQE3W3DRC';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $git_response = curl_exec($ch);
        $git_response = json_decode($git_response);
        return $git_response;
    }

    public function ajaxBuilderSubmit(Request $Request) {
        if($Request->isMethod('POST')) {
            $messages = array(
                'subdomain.required' => 'გთხოვთ შეიყვანოთ ქვედომეინი!',
                'subdomain.regex' => 'ქვედომეინი უნდა შედგებოდეს მხოლოდ ლათინური ასეოებისაგან და ციფრებისაგან!',
            );
            $validator = Validator::make($Request->all(), [
                'subdomain' => 'required|max:255|regex:/^[a-zA-Z0-9 ]+$/',
            ], $messages);

            if ($validator->fails()) {
                return Response::json(['status' => true, 'errors' => true, 'message' => $validator->getMessageBag()->toArray()['subdomain']], 200);
            } else {

                $Builder = new Builder();
                $BuilderCheck = $Builder::where('subdomain', trim($Request->subdomain))->where('deleted_at_int', '!=', 0)->first();
				
                if($BuilderCheck) {
                    return Response::json(['status' => true, 'errors' => true, 'message' => 'აღნიღნული დომეინი დაკავებულია']);
                } else {

                    if(in_array($Request->subdomain.'.'.$this->maindomain, $this->checkSubdomainsOnServer()->data->sub_domains)) {
                        return Response::json(['status' => true, 'errors' => true, 'message' => 'აღნიღნული დომეინი დაკავებულია']);
                    } else {
                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, 'https://mallline.io:2083/execute/SubDomain/addsubdomain?domain='.trim($Request->subdomain).'&rootdomain='.$this->maindomain);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


                        $headers = array();
                        $headers[] = 'Authorization: cpanel mallline:QG16BMI0Y0Z9UVXHTBSXO2EKQE3W3DRC';
                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                        $response = curl_exec($ch);
                        $response = json_decode($response);
                        
                        if($response->status == 1) {
							
                            $this->getDataFromGit($Request);
                            $this->generateDatabaseData($Request);
							
							$Builder = new Builder();
							$BuilderData = $Builder::where('subdomain', trim($Request->subdomain))->where('deleted_at_int', '!=', 0)->first();
							
							$user_data = [
								'vendor_inner_id' => $BuilderData->id,
							];
							
							$curl = curl_init();

							curl_setopt_array($curl, array(
							  CURLOPT_URL => 'https://'.$Request->subdomain.'.mallline.io/dashboard/api/create',
							  CURLOPT_RETURNTRANSFER => true,
							  CURLOPT_ENCODING => '',
							  CURLOPT_MAXREDIRS => 10,
							  CURLOPT_TIMEOUT => 0,
							  CURLOPT_FOLLOWLOCATION => true,
							  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							  CURLOPT_CUSTOMREQUEST => 'POST',
							  CURLOPT_POSTFIELDS => json_encode($user_data, JSON_UNESCAPED_UNICODE),
							  CURLOPT_HTTPHEADER => array(
								'Content-Type: application/json',
							  ),
							));

							$builder_response = curl_exec($curl);

							//Mail::to(Auth::user()->email)->send(new SetupMail);
							
							return Response::json(['status' => true, 'errors' => false, 'message' => 'მაღაზია წარმატებით შეიქმნა გთხოვთ გადაამოწმოთ თქვენი ელ-ფოსტა']);
                        } else {
                            return Response::json(['status' => false, 'errors' => true, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან']);
                        }
                    }
                }
            }    
        } else {
            return Response::json(['status' => false, 'message' => 'დაფიქსირდა შეცდომა გთხოვთ სცადოთ თავიდან !!!'], 200);
        }
    }
}
