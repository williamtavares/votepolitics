Let the internet decide.

Anybody can cast a vote and doesn't require you to register.

The 2016 Presidential Campaign has had many candidates but it is up to the voter to decide who the next president will be.

VotePolitics is a polling website made to let anyone cast a vote as well as keeping tracking of any candidate via Google News and their Twitter feed.

http://votepolitics.us

<b>------------- CONFIGURATION -------------</b><br>

- Generate the DB using the SQL commands provided (config/db_votepolitics.sql)
- Insert your own databse configuration into the (config/vp_dbconfig.inc)
- Create your own reCAPTCHA public and private keys at Google's reCAPTCHA website and insert the appropriate keys
  in the "vote.php", "js/myscript.js", and "index.php" files

  (Note: You will only input the private key in the vote.php file (once), keep this key private and safe)

* I had plans on logging vote activity to keep a history of vote activity but never got around to implementing that feature that is why the table "log_tbl" exists

After deploying the app to an apache server you should have something similar to the following:

http://votepolitics.us

<b>** This project was createad and last updated June 2015 </b><br>
<b>** (The code definitely needs to be cleaned up more, this was one of my first public projects that invovled external users so the codebase is not the best. I just wanted to share it in case anyone is interested)
</b><br><br>
Thanks :D
