# phomod
Hi, thanks for your intereset in PHOMOD.<br>
PHOMOD is an online freelance portal for photographers and models.<br>
Photographers and Models can be searched based on location, or PHOMOD can access user's device GPS coordinates and suggest photographers and models based on user's current location.<br>

<h1>PHOMOD SETUP</h1>
<b>Prerequisite</b>
<ul>
 <li>Local Server (XAMPP, WAMP, MAMP, LAMP, etc)</li>
 <li>Text Editor (Visual Studio Code, Sublime, Atom, etc)</li>
 <li>HTML, CSS, JS</li>
 <li>Familiarity with OOP PHP and PHP Data Objects (PDO) and some MySQL knowledge</li>
</ul>
<p>NB:// You should download, or clone <b>PHOMOD</b> into your <b>htdocs</b> or <b>www</b> folder of your local server (XAMPP, WAMP, etc)</p>


 <h2>DATABASE SETUP</h2>
 <ul>
 <li>Create a Database in phpmyadmin (XAMPP, or any other local server, or on a web host) and name the Database <b>phomod</b></li>
 <li>After creating the <b>phomod</b> Database, go to where you have your <b>PHOMOD</b> repo (it should be in the <b>htdocs</b> folder of XAMPP or <b>www</b> in other local servers), in the root directory, you'll find <b>phomod.sql</b> and import it to your database</li>
 </ul>


<h2>FEATURES OF PHOMOD</h2>
<ul>
<li><b>Sign up and Login feature</b></li>
<li><b>Google OAuth login</b></li>
<li><b>Ratings</b> : Photographers and Models can be rated from 1 - 5 stars</li>
<li>Find freelancers based on <b>GPS coordinates</b></li>
<li><b>Mobile Responsive</b></li>
</ul>
NB:// To be able to use Google OAuth, 
<ul>
 <li>You'll need to setup a developer account on https://www.developers.google.com.</li>
 <li>After setting up a developer account, navigate to https://console.developers.google.com/apis/credentials and click on <b>+CREATE CREDENTIALS</b> and select <b>OAuth client ID</b>, follow the steps to setup OAuth for PHOMOD, set localhost:3000 as your domain</li>
 <li>When you're done setting up your domain (localhost:3000), go to <b>index.php</b> of your <b>PHOMOD</b> folder, and in the <pre><b>head</b></pre> tag, look for this line <br>
  <pre><b>meta name="google-signin-client_id" content="PASTE YOUR CLIENT ID HERE"</b></pre></li>
 <li>Paste your <b>client ID</b> from your google developer account into the <pre><b>content</b></pre> attribute above and you'll be all set</li>
 <li>That's all you need to do to setup Google OAuth for PHOMOD, the heavy lifting have already been done, no need to create a new javascript file to get user profile and communicate with backend.</li>
<p><a href="https://developers.google.com/identity/protocols/oauth2">Read more about Google OAuth here</a></p>
<br>


<h2>ACCOUNT SETTINGS</h2>

<h3>Sign Up</h3>
<p>When a user signs up on PHOMOD, a verification code is sent to the user's email.</p>
<p>SMTP Settings for sending the verification code can be found at <b>PHOMOD / signup / sendver.php</b></p>

<h3>Reset Password</h3>
<p>For a user to reset his / her password, you'll need to send a verification code to the user's email (PHOMOD uses PHPMailer for sending mails)</p>
<p>SMTP settings for sending password reset code is located here, <b>PHOMOD / reset / reset.php</b></p>

<p>NB:// You'll need to setup an email server to send mails, you can setup a google SMTP server for this purpose, read on how to setup SMTP <a href ="https://www.hostinger.com/tutorials/how-to-use-free-google-smtp-server">here</a></p>
 
 Start PHOMOD from your command line by typing "php -S localhost:3000" (without quotes)
