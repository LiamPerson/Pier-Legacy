# Pier - Raspberry Pi Home Server
Made for use with Raspberry Pi 4 Model B (though should work on other devices)
<h4>Connect to your Pier server by going to it's IP address in the browser of your choice e.g. in Google Chrome, top bar <code>192.168.8.77/</code> or simply go to the URL: <code>raspberrypi/</code></h4>
<h2>Dependencies:</h2>
<ul>
    <li>Apache/2.4.38 (Raspbian)</li>
    <li>PHP 7+ (made with 7.3.14-1~deb10u1)</li>
    <li>youtube-dl (latest stable)</li>
    <li>ffmpeg (latest stable)</li>
    <li>Allow apache & shell commands to access /var/www/html</li>
</ul>

<h2>Installation (on Raspbian/Debian)</h2>
<ul>
    <li>Install Apache2 <code>sudo apt update</code> <code>sudo apt install apache2 -y</code></li>
    <li>Install PHP <code>sudo apt install php libapache2-mod-php -y</code></li>
    <li> Install youtube-dl
    <code>sudo apt-get install youtube-dl</code>
    <code>sudo apt-get install python-pip</code>
    <code>sudo pip install youtube-dl</code>
    </li>
    <li><a href="https://github.com/JolleJolles/pirecorder/wiki/Installing-ffmpeg-on-Raspberry-Pi-with-h264-support">Install ffmpeg on Raspbian</a> with guide,<a href="https://github.com/YeloPartyHat/Pier/blob/master/ffmpeg-commands.md"> or follow a command List</a></li>
    <li>Install MariaDB Server <code>sudo apt install mariadb-server php-mysql -y</code> </li>
    <li>Remove default files and clone contents of repository to to /var/www/html <code>cd /var/www/html</code> <code>sudo rm index.html</code> <code>sudo git clone https://github.com/YeloPartyHat/Pier.git .</code></li>
</ul>
    
<h4 id="htaccessSetup">Now you will need to enable URL override (for apache's .htaccess file)</h3>
<ul>
    <li><code>sudo nano /etc/apache2/apache2.conf</code> This will open up an editor. Scroll down until you see:
        <br>
        <pre>&#60;Directory /var/www/>
    Options Indexes FollowSymLinks
    AllowOverride None
    Require all granted
&#60;/Directory></pre>
        ...and change <code>AllowOverride None</code> to <code>AllowOverride All</code>
    </li>
    <li><code>sudo a2enmod rewrite</code></li>
    <li><code>sudo service apache2 restart</code></li>
</ul>
<strong>Apache2 hosts from /var/www/html/ on Raspbian</strong>
<p>You will need to make sure git is installed for the above installation. Installed by default but just in case: <code>sudo apt install git</code></p>

<h2>Troubleshooting</h2>
<ul>
    <li>Make sure config file locations are correct.</li>
    <li>Make sure username and password are set correctly in config.php</li>
    <li>Error 500? <a href="#htaccessSetup">Make sure you set up .htaccess correctly</a></li>
    <li>Can't connect to database? Make sure the config/config.php match your MariaDB settings. <strong>Default:</strong> <code>define("DB_USERNAME","root");</code>
    <code>define("DB_PASSWORD","");</code>
    </li>
    <li>Still can't connect to database? Make sure your user as <code>DB_USERNAME</code> and <code>DB_PASSWORD</code> are set up correctly... <a href="https://chartio.com/resources/tutorials/how-to-grant-all-privileges-on-a-database-in-mysql/">or try make a new user!</a>
    </li>
</ul>

If you want to mount external hard drive(s) to folders check out this guide https://www.htpcguides.com/properly-mount-usb-storage-raspberry-pi/ then create a symbolic link with the folder name to the folder in the mounted drive using <code>ln -s /var/www/html/stored/folder /mnt/storage/folder</code>

