<h1>Project Setup</h1>

<h2>1. Clone GitHub repo for this project locally</h2>
<code>git clone https://github.com/indranandjha1993/app2mobile-test.git</code>
<h2>2. Install Composer Dependencies</h2>
<code>composer install</code>
<h2>3. Install NPM Dependencies</h2>
<code>npm install</code>
<h2>4. Create a copy of your .env file</h2>
<code>cp .env.example .env</code>
<h2>5. Generate an app encryption key</h2>
<code>php artisan key:generate</code>

<h2>6. Create an empty database for our application</h2>
<p>I have used <b>app2mobile task</b> as name database, you can use as you want but it's require to get all configuration in <b>.env</b> file.</p>

<h2>7. Migrate the database</h2>
<code>php artisan migrate</code>

<h2>Project Map</h2>
<h3>For Web</h3>
<p>Open url where you have hosted the project and first you have to register yourself and after that you will be able to login and logout by that credential.</p>
<p>You can find login and register link on right side of screen.</p>
<h3>For API</h3>
<p>API endpoints:-</p>
<ol>
  <li>api/auth/register</li>
  <li>api/auth/login</li>
  <li>api/auth/logout</li>
  <li>api/auth/refresh</li>
  <li>api/auth/profile</li>
</ol>
<h4>Authorization header</h4>
<code>Authorization: Bearer eyJhbGciOiJIUzI1NiI...</code>
