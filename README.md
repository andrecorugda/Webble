# Webble Installation:

1. Open terminal and go to your preferred project location.

2. Create new folder inside selected directory and name that folder of your choice. (e.g "webble").
--[Windows]:  cd C:\xampp\htdocs\webble 

3. After you created a folder access the directory in the terminal and clone the webble project inside.
--[Windows]: git clone git@github.com:andrecorugda/Webble.git . (include the "dot")

4. After cloning is done, open your project folder in your code editor (e.g Visual Studio, PHP Storm, Sublime Text Editor).

5. Project contains app[Folder], index.php[File], .htaccess[File] and your default README.md[File] from Github.

6. .htaccess[File] - open and change "RewriteBase" based on you project structure
--[Example]: if your project don't live under a subfolder you can change the "RewriteBase Path" to /webble/ (name of the project should be enclosed in forward slashes).
--[Example]: if your project live under a subfolder you can change the "RewriteBase Path" to /subfolder/anothersubfolder/webble/ (name of the project should be enclosed in forward slashes).

7. Go to app[Folder] >> config[Folder] >> app.php[File] and do similar configuration as the previous step (this time you should ommit the forward slash at the end)
--[Example]: if your project don't live under a subfolder you can change the "RewriteBase Path" to /webble (this time you should ommit the forward slash at the end).
--[Example]: if your project live under a subfolder you can change the "RewriteBase Path" to /subfolder/anothersubfolder/webble (this time you should ommit the forward slash at the end).