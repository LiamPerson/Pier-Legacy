# Pier - Raspberry Pi Home Server
Made for use with Raspberry Pi 4 Model B (though should work on other devices)
<h2>Requirements:</h2>
<ul>
    <li>Apache/2.4.38 (Raspbian)</li>
    <li>PHP 7+ (made with 7.3.14-1~deb10u1)</li>
    <li>youtube-dl (latest stable)</li>
    <li>ffmpeg (latest stable)</li>
    <li>Allow apache & shell commands to access /var/www/html</li>
</ul>

<h2>Help</h2>
<ul>
<li>Install Apache2 <code>sudo apt update</code> <code>sudo apt install apache2 -y</code></li>
<li>Install PHP <code>sudo apt install php libapache2-mod-php -y</code></li>
<li> Install youtube-dl
<code>sudo apt-get install youtube-dl</code>
<code>sudo apt-get install python-pip</code>
<code>sudo pip install youtube-dl</code>
</li>

<li><a href="https://github.com/JolleJolles/pirecorder/wiki/Installing-ffmpeg-on-Raspberry-Pi-with-h264-support">Installing ffmpeg on Raspbian</a></li>
<li>Install MariaDB Server <code>sudo apt install mariadb-server php-mysql -y</code> DO NOT SET ROOT PASSWORD! IF YOU HAVE CHANGED ROOT PASSWORD MODIFY IN config/config.php (DB_USERNAME & DB_PASSWORD)</li>
    <li>Clone to /var/www/html <code>cd /var/www/html</code> <code>git clone https://github.com/YeloPartyHat/Pier.git</code></li>
    
</ul>
<strong>Apache2 hosts from /var/www/html/ on Raspbian</strong>


<h2>Troubleshooting</h2>
<ul>
<li>Make sure config file locations are correct.</li>
<li>Make sure username and password are set correctly in config.php</li>
</ul>

