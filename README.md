# 🚀 **AUTO-SPOT: Making Ham Radio Simple!** 📻

**Created by:** https://lu9dce.github.io/

**Copyright:** 2023 Eduardo Castillo  

**Contact:** castilloeduardo@outlook.com.ar  

**License:** https://creativecommons.org/licenses/by-nc-nd/4.0/

**I recommend ULTRON:** https://github.com/lu9dce/ultron

<br><img src="https://pbs.twimg.com/media/F5QS6tEXEAA9WhI?format=png&name=small" width="350" height="240">
<hr>

To run PHP in an optimized way, use the following commands:

To run it directly in the command line:

```bash
php -d opcache.enable_cli=1 -d opcache.jit_buffer_size=64M -d opcache.jit=1255 -d memory_limit=-1 newdx.php
```

For example, to run it in the background, you can use:

```bash
tmux new-session -d -s cluster 'cd /root/cluster && php -d opcache.enable_cli=1 -d opcache.jit_buffer_size=64M -d opcache.jit=1255 -d memory_limit=-1 newdx.php && tmux detach-client'
```

These commands will help you run your PHP script with optimizations either in the foreground or in the background using tmux.

Auto-Spot is your one-stop solution for online amateur radio logging. It's more than just a program; it's your gateway to seamless radio communication and a hassle-free QSO experience! 🌐

👉 [**Donate to Support Us!**](https://www.paypal.com/donate/?hosted_button_id=WHG8FQRMAPA3E)


## **Where Can Auto-Spot Run?**

Auto-Spot is versatile and can run on various platforms, including Linux, Windows, and more. As long as you have PHP installed with the required modules, you're good to go!

## **Why Choose AUTO-SPOT?**

✅ Registration effortlessly: Auto-Spot Simplifies the registration book loading process for radio enthusiasts. Say goodbye to manual inputs and hello to the simplified operation.

✅ Multiplatform support: With the self-point, you can load effortlessly on popular platforms such as Cluster, APRS, EQSL, Club Log, Log of Argentina, QRZ, HAMQTH and LOTW.

✅ QSL by email: sending QSL cards has never been easier. Auto-spot will send QSL cards by email, automatically determining whether to send them in Spanish or English.

✅ Flexible connection options: Connect your favorite software through UDP or TCP ports for perfect integration and operation.

✅ Fully automated: the self-point is responsible for heavy work for you. Enjoy automatic registration loads, leaving it more time for your passion: radio communication.

✅ Web -based statistics and configuration: Access your custom web board for statistics and configuration. It is easy to use and gives you complete control over your data.

✅ First security: your data safety is important. Auto-spot allows you to protect your configuration with a username and password, ensuring that your data remains safe and encrypted.

<img src="https://pbs.twimg.com/media/F5Tij_FWUAAWPrF?format=jpg" width="350" height="240">

## **System Requirements**

Auto-Spot requires PHP to operate. To install PHP on your system, follow these simple steps:

### **For Linux:**

1. **Open Terminal**: Press `Ctrl + Alt + T` to open a terminal window.

2. **Update Package List**: Run the following command to update the package list:

   ```bash
   sudo apt-get update
   ```

3. **Install PHP**: Install PHP and the required modules using the following command:

   ```bash
   sudo apt-get install php php-bz2 php-calendar php-ctype php-curl php-date php-dom php-exif php-fileinfo php-filter php-ftp php-gd php-gettext php-hash php-iconv php-intl php-json php-libxml php-mbstring php-openssl php-pcntl php-pcre php-pdo php-pdo_sqlite php-phar php-random php-readline php-reflection php-session php-simplexml php-sockets php-sodium php-spl php-sqlite3 php-standard php-tokenizer php-xml php-xmlreader php-xmlwriter php-xsl php-zip php-zend-opcache php-zlib
   ```

4. **Check PHP Version**: Verify that PHP is installed correctly by running:

   ```bash
   php -v
   ```

### **For Windows:**

1. **Download PHP**: Download the PHP 8.2 installer for Windows from the official PHP website (https://windows.php.net/downloads/releases/php-8.2.11-nts-Win32-vs16-x64.zip)


2. **Install PHP**: Extract the contents of the archive to "C:\php".

```
VC15 & VS16 More recent versions of PHP are built with VC15 or VS16 (Visual Studio 2017 or 2019 compiler respectively) and include improvements in performance and stability.

The VC15 and VS16 builds require to have the Visual C++ Redistributable for Visual Studio 2015-2019
```
- Visual C++ Redistributable [Download for x64 (64bit)](https://aka.ms/vs/16/release/VC_redist.x64.exe)
- Visual C++ Redistributable [Download for x86 (32bit)](https://aka.ms/vs/16/release/VC_redist.x86.exe)

3. add "C:\php" to the Windows PATH environment variable.

4. **Check PHP Version**: Open a Command Prompt and run:

   ```shell
   php -v
   ```

Auto-Spot can run on various platforms where PHP is supported. It's versatile and suitable for Linux and Windows systems.


Auto-Spot - Where simplicity meets the world of ham radio! 📡🌟
