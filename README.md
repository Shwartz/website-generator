# website-generator

### DEMO
http://demo.shvarcs.com/micro/index.html

### Aim
For simple "5-pagers" instead of WordPress use simple HTML site. Easy to add/remove pages, images, content. No DB needed. Once done - FTP to your server.

### Requirements
Super fast, gzip, minified, auto-builds

### Settings
Converted all web into relative paths, no needs for specific settings at moment

### Grunt
Open your Terminal (console) and CD to /app/
There are few you can use commands:

 - `$ grunt php:server`
    
 - `$ grunt dev`
    - Deletes all the content in `/dev/` directory and re-builds it from /source/ dir.
    Never update /dev/ as it will be deleted and re-build
    - Watcher for development environment, whatever you change in `/source/` is passed to `/dev/`
    - This will start server and open TAB `http://127.0.0.1:5000/`
 - `$ grunt dist`
    - Deletes all the content in `/dist/` , minify all files, adds into this folder. Ready to upload to your server
    - This command will start server and you can open TAB `http://127.0.0.1:5020/` and test if all looks good before
    sending to your server
    - Note: same like with `/dev/` directory, don't update `/dist/` directly as all your changes will be removed next time you do this task. Make all your changes only in `/source/` directory
 

### Output
clear HTML/CSS/JS,  all minified, using <a href="http://barbajs.org/">Barba.js</a> method to make seemless transition between pages

### Structure




