<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFirewall extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //cria tabela
        Schema::create('firewalls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comand');
            $table->string('rule');
            $table->string('active');
        });

        //regras do iptables
        DB::table('firewalls')->insert([
            ['comand' => 'echo "1" > /proc/sys/net/ipv4/ip_forward', 'rule' => '1', 'active' => 'off'],
            ['comand' => 'iptables  -I INPUT -i lo -j ACCEPT','rule' => '2', 'active' => 'off'],
            ['comand' => 'iptables -I OUTPUT -o lo -j ACCEPT','rule' => '2', 'active' => 'off'],
            ['comand' => 'for i in `cat $PORTSLIB`; do','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -p tcp --dport $i -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -A FORWARD -p tcp --dport $i -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -A OUTPUT -p tcp --sport $i -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'done','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -I INPUT -m state --state ESTABLISHED -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -I INPUT -m state --state RELATED -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -I OUTPUT -p icmp -o $WAN -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'iptables -I INPUT -p icmp -j ACCEPT','rule' => '3', 'active' => 'off'],
            ['comand' => 'for i in `cat $SITESNEGADOS`; do','rule' => '4', 'active' => 'off'],
            ['comand' => 'iptables -t filter -A FORWARD -s $REDE -d $i -j DROP','rule' => '4', 'active' => 'off'],
            ['comand' => 'iptables -t filter -A FORWARD -s $i -d $REDE -j DROP','rule' => '4', 'active' => 'off'],
            ['comand' => 'iptables -t filter -A INPUT -s $i -j DROP','rule' => '4', 'active' => 'off'],
            ['comand' => 'iptables -t filter -A OUTPUT -d $i -j DROP','rule' => '4', 'active' => 'off'],
            ['comand' => 'done','rule' => '4', 'active' => 'off'],
            ['comand' => 'echo "0" > /proc/sys/net/ipv4/icmp_echo_ignore_all','rule' => '5', 'active' => 'off'],
            ['comand' => 'iptables -N PING-MORTE','rule' => '5', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -p icmp --icmp-type echo-request -j PING-MORTE','rule' => '5', 'active' => 'off'],
            ['comand' => 'iptables -A PING-MORTE -m limit --limit 1/s --limit-burst 4 -j RETURN','rule' => '5', 'active' => 'off'],
            ['comand' => 'iptables -A PING-MORTE -j DROP','rule' => '5', 'active' => 'off'],
            ['comand' => 'echo "0" > /proc/sys/net/ipv4/tcp_syncookies','rule' => '6', 'active' => 'off'],
            ['comand' => 'iptables -N syn-flood','rule' => '6', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -i $WAN -p tcp --syn -j syn-flood','rule' => '6', 'active' => 'off'],
            ['comand' => 'iptables -A syn-flood -m limit --limit 1/s --limit-burst 4 -j RETURN','rule' => '6', 'active' => 'off'],
            ['comand' => 'iptables -A syn-flood -j DROP','rule' => '6', 'active' => 'off'],
            ['comand' => 'iptables -N SSH-BRUT-FORCE','rule' => '7', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -i $WAN -p tcp --dport 22 -j SSH-BRUT-FORCE','rule' => '7', 'active' => 'off'],
            ['comand' => 'iptables -A SSH-BRUT-FORCE -m limit --limit 1/s --limit-burst 4 -j RETURN','rule' => '7', 'active' => 'off'],
            ['comand' => 'iptables -A SSH-BRUT-FORCE -j DROP','rule' => '7', 'active' => 'off'],
            ['comand' => 'for i in `cat $PORTSBLO`; do','rule' => '8', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -p tcp -i $WAN --dport $i -j DROP','rule' => '8', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -p udp -i $WAN --dport $i -j DROP','rule' => '8', 'active' => 'off'],
            ['comand' => 'iptables -A FORWARD -p tcp --dport $i -j DROP','rule' => '8', 'active' => 'off'],
            ['comand' => 'done','rule' => '8', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -s 10.0.0.0/8 -i $WAN -j DROP','rule' => '9', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -s 127.0.0.0/8 -i $WAN -j DROP','rule' => '9', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -s 172.16.0.0/12 -i $WAN -j DROP','rule' => '9', 'active' => 'off'],
            ['comand' => 'iptables -A INPUT -s 192.168.1.0/16 -i $WAN -j DROP','rule' => '9', 'active' => 'off'],
            ['comand' => 'iptables -A FORWARD -p tcp --tcp-flags SYN,ACK, FIN, -m limit --limit 1/s -j ACCEPT','rule' => '10', 'active' => 'off'],
            ['comand' => 'iptables -t nat -A POSTROUTING -o $WAN -j MASQUERADE','rule' => '11', 'active' => 'off']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firewalls');
    }
}
