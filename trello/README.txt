Open the terminal and navigate to the directory with all the files. Make sure mysql is installed.
Then use the command to run the sql file. Put the username after u and password after p.
For example, if name is the username and admin is password, then run the command,

mysql -uname -padmin < createtables.sql;

Open up connection.php and change username, password, and server to the one on your system.
Once the database is set up, navigate to index.php. In index.php, you will see empty tables and all the commands (Add Card, Add List, etc.). Once you add a card or a list, the new elements will automatically show up in the table.

I have also added a partial screenshot of what it should look like.

