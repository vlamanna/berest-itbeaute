VAGRANTFILE_API_VERSION = "2"

box = "ubuntu/trusty64"
ip = "192.168.201.101"

rootpass = "123456"

$script = <<SCRIPT

dd if=/dev/zero of=/swapfile bs=1M count=1024
mkswap /swapfile
chmod 600 /swapfile
sudo swapon /swapfile
echo "/swapfile  none  swap  defaults  0  0" >> /etc/fstab

add-apt-repository ppa:ondrej/php5-5.6
apt-get update
apt-get -y install python-software-properties
apt-get update

apt-get -y install apache2
apt-get -y install php5
apt-get -y install redis-server
apt-get -y install php5-curl
apt-get -y install php5-mysql

debconf-set-selections <<< 'mysql-server mysql-server/root_password password #{rootpass}'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password #{rootpass}'
apt-get -y install mysql-server-5.6

mysql -uroot -p#{rootpass} -e "CREATE DATABASE berest;" 2>/dev/null
mysql -uroot -p#{rootpass} -e "CREATE USER 'root'@'%' IDENTIFIED BY '#{rootpass}';" 2>/dev/null
mysql -uroot -p#{rootpass} -e "CREATE USER 'root'@'%' IDENTIFIED BY '#{rootpass}';" 2>/dev/null
mysql -uroot -p#{rootpass} -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;" 2>/dev/null
mysql_tzinfo_to_sql /usr/share/zoneinfo | mysql -uroot -p#{rootpass} mysql 2>/dev/null

cp /vagrant_data/vagrant/api.conf /etc/apache2/sites-available/
a2dissite 000-default
a2ensite api
a2enmod rewrite
service apache2 restart
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = box

  config.vm.network "private_network", ip: ip

  config.vm.synced_folder ".", "/vagrant_data"

  config.vm.provision "shell", inline: $script
end
