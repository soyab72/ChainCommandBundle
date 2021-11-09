# Console Order Command Chaining

Using symfony bundle created console command chaining here `app:order-create` command as main command and `app:order-confirm` as  chain command. While run command as mentioned in step 3 main & child console command will execute. First it will create order from main command then confirm order from child command. Find out more into from log file to check how sequence wise command executing.

**Follow below steps to set up project & check output**

**Step 1:** Clone code from a 
`git clone https://github.com/soyab72/ChainCommandBundle.git`

**Step 2:** Run command `composer install`

**Step 3:** Run main command `php bin/console app:order-create` check output 
```
New Order Created
Order Confirmed
```

**Step 4:** Run chin command directly to check error. 
`php bin/console app:order-confirm`

```
 app:order-confirm command is a member of app:order-create command chain and cannot be executed on its own.
```

**Step 5:** Run unit test `php ./vendor/bin/phpunit`

```
Testing 
...                                                                 3 / 3 (100%)

Time: 00:00.050, Memory: 12.00 MB

OK (3 tests, 4 assertions)

```
