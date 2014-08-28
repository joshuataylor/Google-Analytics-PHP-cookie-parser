Installation:

Clone this repository, and include autoload.php.  If you are using another 
autoloader, simply point it to the GoogleAnalytics namespace in the "src"
directory.

Usage:

The Google Analytics UTM Variables typycally available as cookies.  If you are tracking accross domains (using _getLinkerUrl()), these parameters will initially be available via the HTTP_REFERER query string.

This library is currently able to process the following cookies:

__utma - Expires 2 years after set/update.  Stores Domain Hash, Visitor ID and a series of timestamps.
__utmb - Expires 30 mins from set/update.  This is used to determine session expiration.
__utmc - Expires at the end of browser session.  Deprecated.
__utmv - Expires 2 years from set/update.  Stores Custom Variables.
__utmz - Expires 6 months from set/update.  Stores campaign attribution information.

```php
    <?php
    
    $tracker = new \GoogleAnalytics\CampaignTracking\Tracker($_COOKIE);
    
    echo $tracker->getCampaignMedium() . "\n";
    echo $tracker->getCampaignSource() . "\n";
```

Wish List:

1)  First and foremost, the regular expressions used in the "validate" methods 
need to be improved upon.

2)  I would like to implement ArrayAcces, Serializable and JsonSerializable. 
One thing that will have to be decided is how to handle the timestamps.  
All the timestamps are currently transformed into DateTime objects.  For 
ArrayAccess, we could return a string or the DateTime object.  For the 
serializing interfaces, we will certainly want a string, but a decision 
will have to be made as to what format (ie. UNIX Timestamp, ISO8601, etc).
So...
   2a)  Implement ArrayAccess for Tracker, CustomVar and Utm classes.
   2b)  Implement Serializable for Tracker, CustomVar and Utm classes.
   2c)  Implement JsonSerializable for Tracker, CustomVar and Utm classes.

3)  Implement some sort of toArray() functionality for the whole model.
