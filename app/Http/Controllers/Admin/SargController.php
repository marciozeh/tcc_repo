<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SargController extends Controller
{
    public function index()
    {
        $lines = file('C:\xampp\htdocs\projeto_tcc\public\sarg.txt');
        foreach ($lines as $line) {
            if (strpos($line, "title") !== false) {
                $test = preg_split('/ /', $line, 2);
                $limpa = str_ireplace('"','',$test[1]);

                    return view('sarg', compact('limpa'));
                }
        }
    }

    public function send(Request $request)
    {
        $nome = $request->input('name');


        $nome = "\"" . $nome."\"";


        $write =
            "#language Portuguese \r\n".
            "#access_log /var/log/squid/access.log \r\n".
            "title ". $nome . "\r\n".
            "font_face Tahoma,Verdana,Arial \r\n".
            "header_color darkblue \r\n".
            "header_bgcolor blanchedalmond \r\n".
            "font_size 9px \r\n".
            "background_color white \r\n".
            "text_color #000000 \r\n".
            "text_bgcolor lavender \r\n".
            "title_color green \r\n".
            "temporary_dir /tmp \r\n".
            "output_dir /var/www/squid-reports \r\n".
            "resolve_ip \r\n".
            "user_ip no \r\n".
            "topuser_sort_field BYTES reverse \r\n".
            "user_sort_field BYTES revers \r\n".
            "exclude_users /etc/squid/sarg.users \r\n".
            "exclude_hosts /etc/squid/sarg.hosts \r\n".
            "date_format u \r\n".
            "lastlog 0 \r\n".
            "remove_temp_files yes \r\n".
            "index yes \r\n".
            "index_tree file \r\n".
            "overwrite_report yes \r\n".
            "records_without_userid ip \r\n".
            "use_comma yes \r\n".
            "mail_utility mail \r\n".
            "topsites_num 100 \r\n".
            "topsites_sort_order CONNECT D \r\n".
            "index_sort_order D \r\n".
            "exclude_codes /etc/squid/sarg.exclude_codes \r\n".
            "max_elapsed 28800000 \r\n".
            "report_type topusers topsites sites_users users_sites date_time denied auth_failures site_user_time_date downloads \r\n".
            "usertab /etc/squid/sarg.usertab \r\n".
            "long_url no \r\n".
            "date_time_by bytes \r\n".
            "charset Latin1 \r\n".
            "show_successful_message no \r\n".
            "show_read_statistics no \r\n".
            "topuser_fields NUM DATE_TIME USERID CONNECT BYTES %BYTES IN-CACHE-OUT USED_TIME MILISEC %TIME TOTAL AVERAGE \r\n".
            "user_report_fields CONNECT BYTES %BYTES IN-CACHE-OUT USED_TIME MILISEC %TIME TOTAL AVERAGE \r\n".
            "topuser_num 0 \r\n".
            "site_user_time_date_type table \r\n".
            'download_suffix "zip,arj,bzip,gz,ace,doc,iso,adt,bin,cab,com,dot,drv$, lha,lzh,mdb,mso,ppt,rtf,src,shs,sys,exe,dll,mp3,avi,mpg,mpeg" ';

        $filename = 'C:\xampp\htdocs\projeto_tcc\public\sarg.txt';
        if (is_writable($filename)) {
            if (!$handle = fopen($filename, "w")) {
                return "Cannot open file ($filename)";
                exit;
            }
            if (fwrite($handle, $write) === FALSE) {
                return "Cannot write to file ($filename)";
                exit;
            }
            return "Success, wrote ($write) to file ($filename)";

            fclose($handle);

        } else {
            return "The file $filename is not writable";
        }

        $comando = "/etc/init.d/squid restart";
        //comando para iniciar o squid
        //shell_exec($comando);
    }
}
